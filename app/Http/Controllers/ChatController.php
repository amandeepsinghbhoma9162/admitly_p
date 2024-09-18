<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Agent\AppliedStudentFile;
use App\Agent;
use App\Models\Notification;
use App\Models\Agent\Student;
Use App\Helpers\ImageUpload;
use App\Http\Helpers\Notify;
use App\Models\Attachment;
use Mail;
use Validator;
use Session;
use Auth;
use App;
use Carbon;
use Storage;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.chat.add');
    }

    public function ChatimgOpen($id)
    {
        $pdf = App::make('dompdf.wrapper');
        $chat = Chat::with('admins')->where('id',$id)->first();
        $path = pathinfo($chat['path'], PATHINFO_EXTENSION);
        if($path == "docx"){
            return redirect($chat['path']);
        }
        $pdf->loadHTML('<img src="'.$chat['path'].'" width="100%">');
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id = base64_decode($id);
        
        if(Auth::guard('agent')->check()){
            $agent = Auth::guard('agent')->user();
            $messages = Chat::with('admins')->where('application_id',NULL)->where('student_id',NULL)->where('agent_id',$agent['id'])->get();
           
         }elseif(Auth::guard('admin')->check()){
            $admin = Auth::guard('admin')->user();
            $agent = Agent::where('id',$id)->first();
            $messages = Chat::with('admins')->where('agent_id',$id)->where('application_id',NULL)->where('student_id',NULL)->get();

        }


        return view('chat.live',compact('messages','id','agent'));
    }
    public function createAgent()
    {
        
        
        if(Auth::guard('agent')->check()){
            $agent = Auth::guard('agent')->user();
            $messages = Chat::with('admins')->where('application_id',NULL)->where('student_id',NULL)->where('agent_id',$agent['id'])->get();
           
         }elseif(Auth::guard('admin')->check()){
            $admin = Auth::guard('admin')->user();
            $messages = Chat::with('admins')->where('application_id',NULL)->where('student_id',NULL)->where('admin_id',$admin['id'])->get();

        }


        return view('chat.agentLive',compact('messages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  $this->validate($request,
            [
                'message' => 'required|min:2',
            ]
        );
        if($request->application_id != 'yes'){
            if(Auth::guard('agent')->check()){
                $agentId = Auth::guard('agent')->user()->id;
                $agent = Auth::guard('agent')->user();
                $chat = Chat::with('admins')->create([
                    'application_id'=>$request->application_id,  
                    'message'=>$request->message,  
                    'type'=>'agent',  
                    'agent_id'=>$agentId,  
                ]);

                $application = AppliedStudentFile::where('id',$request->application_id)->first();
                Notification::create([
                    'type' =>'admin',
                    'link' =>route('chat.show',base64_encode($application['id'])),
                    'agent_id' =>'',
                    'application_id' =>$application['id'],
                    'message' => $agent['name'].' sent message '. $request->message.' on ' .$application->course['name'].' of ' .$application->student['firstName'].' ' .$application->student['lastName'].' Application',
                    'application_status' =>'chat',
                    'status' =>0,
                    ]);
                
            }elseif(Auth::guard('admin')->check()){
               $adminID = Auth::guard('admin')->user()->id;
               $application = AppliedStudentFile::where('id',$request->application_id)->first();
                $chat = Chat::with('admins')->create([
                            'application_id'=>$request->application_id,  
                            'message'=>$request->message,  
                            'type'=>'admin',  
                            'admin_id'=>$adminID,  
                            'agent_id'=>$application['agent_id'],  
                        ]);

                Notification::create([
                    'type' =>'status Chat',
                    'link' =>route('chat.show',base64_encode($application['id'])),
                    'agent_id' =>$application['agent_id'],
                    'application_id' =>$application['id'],
                    'message' => 'Dear '.$application->agent['name'].' sent message '.$request->message.' on ' .$application->student['firstName'].' ' .$application->student['lastName'].' Application by ADMITLY team',
                    'application_status' =>'',
                    'status' =>0,
                    ]);
            
            }
        }else{

            if(Auth::guard('agent')->check()){
                $agentId = Auth::guard('agent')->user()->id;
                $agent = Auth::guard('agent')->user();
                $chat = Chat::with('admins')->create([
                    'application_id'=>NULL,  
                    'message'=>$request->message,  
                    'type'=>'agent',  
                    'agent_id'=>$agentId,  
                    'admin_id'=>'5',  
                ]);

                Notification::create([
                    'type' =>'admin',
                    'link' =>route('chat.create',base64_encode($agentId)),
                    'agent_id' =>'',
                    'application_id' =>NULL,
                    'message' => $agent['name'].' sent message : '. $request->message.' ',
                    'application_status' =>'chat',
                    'status' =>0,
                    ]);
                
            }elseif(Auth::guard('admin')->check()){
               $adminID = Auth::guard('admin')->user()->id;
                $agent = Agent::where('id',$request->agent_id)->first();
                $chat = Chat::with('admins')->create([
                            'application_id'=>NULL,  
                            'message'=>$request->message,  
                            'type'=>'admin',  
                            'admin_id'=>$adminID,  
                            'agent_id'=>$request->agent_id,  
                        ]);

                Notification::create([
                    'type' =>'status Chat',
                    'link' =>route('chat.create.agent'),
                    'agent_id' =>$request->agent_id,
                    'application_id' =>'',
                    'message' => 'Dear '.$agent['name'].' ADMITLY team sent message '. $request->message,
                    'application_status' =>'chat',
                    'status' =>0,
                    ]);
            
            }

        }
    
        return response()->json([ 'status' => 'success' , 'message' => 'message saved' ,'data' => $chat] , 200);
    }
    public function StudentChatstore(Request $request)
    {
        
        if($request->student_id  != 'yes'){
            if(Auth::guard('agent')->check()){
                $agent = Auth::guard('agent')->user();
                $agentId = Auth::guard('agent')->user()->id;
                $student = Student::where('id',$request->student_id)->first();
                $applications = AppliedStudentFile::groupBy('preProcessBy_id')->where('student_id',$request->student_id)->pluck('preProcessBy_id')->toArray();
                if($student['lock_status'] == '1'){
                    $admin_role = 'preprocess';
                }else{
                    $admin_role = 'shortlisting';
                }
                $from = $agentId;
                if($request->chatImg){
                    $file = $request->chatImg;
                    $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $destinationPath = date('Y').'/'.date('M').'/uploads/student/studentChat/'.$request->student_id.'/'; 
                    $file->move($destinationPath, $fileName);    
                    $chat = Chat::with('admins')->create([
                        'student_id'=>$request->student_id,  
                        'message'=>$request->message,  
                        'type'=>'studentChat',  
                        'from'=>$agentId,  
                        'to'=>'admin',  
                        'admin_role'=>'admin',  
                        'path'=>$destinationPath.''.$fileName,  
                    ]);
                }else{
                    $chat = Chat::with('admins')->create([
                        'student_id'=>$request->student_id,  
                        'message'=>$request->message,  
                        'type'=>'studentChat',  
                        'from'=>$agentId,  
                        'to'=>'admin',  
                        'admin_role'=>'admin',  
                    ]);
                }
                if($student['lock_status'] == '1'){ 
                    foreach ($applications as $key => $application) {  
                    Notification::create([
                        'type' =>'admin',
                        'link' =>route('admin.student.chat',base64_encode($student['id'])),
                        'agent_id' =>'',
                        'from' =>$from,
                        'to' =>$application,
                        'student_id' =>$student['id'],
                        'admin_role'=>$admin_role,  
                        'message' => $agent['name'].' sent message '. $request->message.' on ' .$student['firstName'].''. $student['lastName'].' Student',
                        'application_status' =>'chat',
                        'status' =>0,
                        ]);
                    }
                }else{
                    Notification::create([
                        'type' =>'admin',
                        'link' =>route('admin.student.chat',base64_encode($student['id'])),
                        'agent_id' =>'',
                        'from' =>$from,
                        'to' =>$student['shortlisting_by'],
                        'student_id' =>$student['id'],
                        'admin_role'=>$admin_role,  
                        'message' => $agent['name'].' sent message '. $request->message.' on ' .$student['firstName'].''. $student['lastName'].' Student',
                        'application_status' =>'chat',
                        'status' =>0,
                        ]);
                }
                // $numbers = [$agent->accountManager['mobile']];
                // $text = ucfirst($agent['name']).'| Team sent message '. $request->message.' on ' .$student['firstName'].''. $student['lastName'].' Student. Click here and reply '.route('admin.student.chat',base64_encode($student['id']));
                // $messagess = Notify::whatsappnotif($numbers,$text);
            }elseif(Auth::guard('admin')->check()){
               $admin = Auth::guard('admin')->user();
               $adminID = Auth::guard('admin')->user()->id;
               $student = Student::where('id',$request->student_id)->first();
               if($request->chatImg){
                    $file = $request->chatImg;
                    $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $destinationPath = date('Y').'/'.date('M').'/uploads/student/studentChat/'.$request->student_id.'/'; 
                    $file->move($destinationPath, $fileName);    
                    $chat = Chat::with('admins')->create([
                        'student_id'=>$request->student_id,  
                        'message'=>$request->message,
                        'admin_id'=>$adminID,  
                        'agent_id'=>$student['agent_id'],  
                        'type'=>'studentChat',  
                        'from'=>'admin',  
                        'to'=>$student['agent_id'],  
                        'admin_role'=>'agent',  
                        'path'=>$destinationPath.''.$fileName,  
                    ]);
                }else{
                    $chat = Chat::with('admins')->create([
                            'student_id'=>$request->student_id,  
                            'message'=>$request->message,  
                            'admin_id'=>$adminID,  
                            'agent_id'=>$student['agent_id'],  
                            'type'=>'studentChat',  
                            'from'=>'admin',  
                            'to'=> $student['agent_id'],  
                            'admin_role'=> 'agent',  
                        ]);
                }
                Notification::create([
                    'type' =>'status Chat',
                    'link' =>route('agent.student.chat.show',base64_encode($student['id'])),
                    'agent_id' =>$student['agent_id'],
                    'student_id' =>$student['id'],
                    'message' =>'Admitly team Sent message '. $request->message.' on ' .$student['firstName'].''.$student['lastName'].' student',
                    'application_status' =>'',
                    'status' =>0,
                    ]);
                    $agent = Agent::where('id',$student['agent_id'])->first();
                    $numbers = [$agent['mobileno']];
                    $text = ucfirst($agent['name']).' Admitly team sent message '. $request->message.' on ' .$student['firstName'].''. $student['lastName'].' Student. Click here and reply '.route('agent.student.chat.show',base64_encode($student['id']));
                    $messagess = Notify::whatsappnotif($numbers,$text);
                    if($request->hasDocument == 'yes'){
                        $data['text'] = $text;
                        $data['path'] = $chat['path'];
                        $data['agent'] = $agent;
                        $data['student'] = $student;
                        $mail = Mail::send('emails.chatEmail',['data' => $data], function($message) use ($data) {
                        $message->to($data['agent']['email']);
                        $message->subject('Admitly team attached an Image.');
                        $message->from('himanshu@admitoffer.com','ADMITLY');
                        });
                    }
            }
        }
    
        return response()->json([ 'status' => 'success' , 'message' => 'message saved' ,'data' => $chat] , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = base64_decode($id);
        $application = AppliedStudentFile::where('id',$id)->first();
        $messages = Chat::with('admins')->where('application_id',$id)->get();
        // if(Auth::guard('agent')->check()){
        //     return view('agent.chat.view',compact('messages','application'));
            
        // }elseif(Auth::guard('admin')->check()){

        // }
        return view('chat.view',compact('messages','application'));
    }
    public function studentChat($id)
    {
        $id = base64_decode($id);
    
        $messages = Chat::with('admins')->where('student_id',$id)->get();
        // if(Auth::guard('agent')->check()){
        //     return view('agent.chat.view',compact('messages','application'));
            
        // }elseif(Auth::guard('admin')->check()){

        // }
        return view('chat.view',compact('messages'));
    }
    public function AdminStudentChat($id)
    {
        $id = base64_decode($id);
   
        $messages = Chat::with('admins')->where('student_id',$id)->get();
        $student = Student::where('id',$id)->first();
        $agent = Agent::where('id',$student['agent_id'])->first();
        Notification::where('student_id',$id)->where('application_status','chat')->where('application_id',NULL)->update(['status' => 1]);
        
        return view('chat.adminStudentChat',compact('messages','student','agent'));
    }
     public function AgentStudentChat($id)
    {
        $id = base64_decode($id);
   
        $messages = Chat::with('admins')->where('student_id',$id)->get();
        $student = Student::where('id',$id)->first();
        $agent = Agent::where('id',$student['agent_id'])->first();
        Notification::where('student_id',$id)->where('type','status Chat')->where('application_id',NULL)->update(['status' => 1]);

        return view('chat.agentStudentChat',compact('messages','student','agent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($application_id,$agent_id = NULL)
    {
        
        

            if($application_id != 'yes'){
                $chat = Chat::with('admins')->where('application_id',$application_id)->get();
            }else{

                if(Auth::guard('agent')->check()){
                   $agent = Auth::guard('agent')->user();

                $chat = Chat::with('admins')->where('application_id',NULL)->where('student_id',NULL)->where('agent_id',$agent['id'])->get();
                }else {
                   $admin = Auth::guard('admin')->user();
                

                    $chat = Chat::with('admins')->where('application_id',NULL)->where('student_id',NULL)->where('agent_id',$agent_id)->get();
                   

                }

            }
        
        return response()->json([ 'status' => 'success' , 'message' => 'All message' ,'data' => $chat] , 200);
    }
    public function Studentedit($student_id,$student)
    {
        
        

            if($student != 'yes'){
                $chat = Chat::with('admins')->where('student_id',$student_id)->get();
            }else{

                if(Auth::guard('agent')->check()){
                   $agent = Auth::guard('agent')->user();

                $chat = Chat::with('admins')->where('student_id',$student_id)->get();
                }else {
                   $admin = Auth::guard('admin')->user();
                

                    $chat = Chat::with('admins')->where('student_id',$student_id)->get();
                   

                }

            }
        
        return response()->json([ 'status' => 'success' , 'message' => 'All message' ,'data' => $chat] , 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
