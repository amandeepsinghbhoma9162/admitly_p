<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agent\Student;
use App\Agent;
use App\Models\Agent\AppliedStudentFile;
use App\Models\StudentQualification;
use App\Models\StudentQualificationGap;
use App\Models\QualificationBoard;
use App\Models\StudentQuestionAnswers;
use Bitfumes\Multiauth\Model\Admin;
use App\Models\Payment;
use Bitfumes\Multiauth\Model\Role;
use App\Models\StudentEnglishTest;
use App\Models\Sop_pendency;
use App\Models\AllowCountryAgent;
use App\Models\StudentWorkExperiance;
use App\Models\ApplicationStatus;
use App\Models\PendancyAttachment;
use App\Models\Question;
use App\Models\Subject;
use App\Models\CourseLevel;
use App\Models\Loc\Country;
use App\Models\Loc\State;
use App\Models\Loc\City;
Use App\Helpers\ImageUpload;
use App\Models\Attachment;
use App\Models\StudentQualificationTotal;
use App\Models\PreviousQualification;
use App\Models\StudentAttachment;
use App\Models\Qualification;
use App\Models\QualificationGrade;
use App\Models\QualificationLevelGrade;
use App\Models\EnglishTest;
use App\Models\EnglishScore;
use App\Models\MathScore;
use App\Models\IletsScore;
use App\Models\CountryQuestion;
use App\Models\ApplicationDocument;
use App\Models\ApplicationStatusTimeline;
use App\Models\Notification;
use Illuminate\Support\Str;
use App\Models\Chat;
use Response;
use Validator;
use Session;
use Carbon;
use Auth;
use Mail;
use App;
use PDF;
use Storage;
use File;

class QuickShortlistingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($switchCountryId='null')
    { 
       
        $user =Auth::guard('agent')->user();
        Session::forget('document');
        Session::forget('studentID');
        Session::forget('hasFinanceDocument');
        Session::forget('openNext');
        Session::forget('student');
        if ($switchCountryId != 'null') {
            
        $students = Student::with(['previousQualifications','studentImage','appliedStudentFiles','country','pendeciesStudentFiles','countryAddress','grade10'=>function($g){
            $g->with(['totals','boards'])->get();
        },'grade12'=>function($g){
            $g->with(['totals','boards'])->get();
        }])->where('agent_id',$user['id'])->where('IsShortlisting','yes')->where('applingForCountry',base64_decode($switchCountryId))->orderBy('id','desc')->get();
        }else{
            $students = Student::with(['previousQualifications','studentImage','appliedStudentFiles','country','pendeciesStudentFiles','countryAddress','grade10'=>function($g){
            $g->with(['totals','boards'])->get();
        },'grade12'=>function($g){
            $g->with(['totals','boards'])->get();
        }])->where('agent_id',$user['id'])->where('IsShortlisting','yes')->orderBy('id','desc')->get();
        }


        return view('agent.student.Shortlistedstudents',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function create($id='null')
    {
        // if($id != 'null'){
        //     $id = $id;
        //     Session::forget('studentID');
        //     Session::put('studentID',$id);
        // //    $route = \Request::route()->getName();
        // //    dd($route);
        // }

        // dd(app('request')->create(app('url')->previous()->getName()));
        // @if(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'student.edit')
        //     Session::forget('studentID');
        // @endif
        $edit = Session::get('edit');
        if($edit == 'yes'){
            Session::forget('openNext');
            Session::forget('student');
            Session::forget('studentID');
            Session::forget('edit');
        }
        $id = Session::get('studentID');
        $englishTests = EnglishTest::get();
        $englishScores = EnglishScore::all();
        $mathScores = MathScore::all();
        $iletsScores = IletsScore::where('english_test','IELTS')->get();
        $boards = QualificationBoard::orderBy('name')->get();
        // $countries = Country::all();
        $qualificationPercentages = StudentQualificationTotal::where('type','percentage')->get();
        $qualificationDivisions = StudentQualificationTotal::where('type','division')->get();
        $qualificationGpas = StudentQualificationTotal::where('type','gpa')->get();
        $data = Student::with(['studentImage','passport','allDocuments'])->where('id',$id)->first();
      
            if($data['lock_status'] == 1){
                Session::forget('openNext');
                Session::forget('student');
                Session::forget('studentID');
                Session::forget('edit');
            }
            if($data['applingForCountry']){
    
            $qualifications = Qualification::where('country',$data['applingForCountry'])->orWhere('country',NULL)->get();
            if($data['applingForCountry'] == '38'){
    
            
                $qualifications = CourseLevel::get();
            }
    
            }else{
            $qualifications = [];
    
            }
            $states = State::where('country_id',$data['country_id'])->get();
            $cities = City::where('state_id',$data['state_id'])->get();
            $isEdit = 'no';
            $questions = CountryQuestion::with('question')->where('country_id',$data['applingForCountry'])->get();
            
            $studentQualifications = StudentQualification::with(['student','qualification','country','state','city','totals','documents'])->where('student_id',$id)->get();
            $studentEnglishTests = StudentEnglishTest::with(['student','englishTests','totalScores','documents'])->where('student_id',$id)->get();
            $studentWorkExperiances = StudentWorkExperiance::with('documents')->where('student_id',$id)->get();
            $studentQualificationGaps = StudentQualificationGap::with('documents')->where('student_id',$id)->get();
            $subjects = Subject::all();
    
            
            $countries = Country::where('applyFor',1)->get();
            $studentQuestionAnswers = StudentQuestionAnswers::with(['questions'=>function($query){
                $query->with(['question'])->get();
            }])->where('student_id',$id)->get();
            $PreviousQualifications = PreviousQualification::all();
            $agents = Agent::OrderBy('name')->get();
                     
                
            return view('admin.quickshortlisting.addStudent',compact('boards','englishScores','mathScores','qualificationGpas','qualificationDivisions','qualificationPercentages','qualifications','data','countries','englishTests','iletsScores','isEdit','studentQualifications','studentEnglishTests','studentWorkExperiances','studentQualificationGaps','states','cities','questions','studentQuestionAnswers','subjects','PreviousQualifications','agents'));
            //   
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $adminshortlisting = Student::create([

            'agent_id'=>$request->agent_id,
            'firstName'=>$request->name,
            'applingForCountry'=>$request->country,
            'applingForLevel'=>$request->level,

        ]);

        //  $this->validate($request,[
        // 'allDocuments.*' => 'required|max:2048'
        // ]);
        
         $studentId = $adminshortlisting->id;
        $hasAttachs = StudentAttachment::where('student_id',$studentId)->where('type','allDocuments')->get();
        if($hasAttachs){
            foreach($hasAttachs as $hasAttach){
                $image_path = $hasAttach['path'].'/'.$hasAttach['name']; 
                if(File::exists($image_path)) {
                        File::delete($image_path);
                }

                $hasAttach['path'] = str_replace('https://admitoffer.s3.ap-south-1.amazonaws.com/','', $hasAttach['path']);
              $delete = Storage::disk('s3')->delete($hasAttach['path'].'/'.$hasAttach['name']);
            }
        $hasAttachsd = StudentAttachment::where('student_id',$studentId)->where('type','allDocuments')->delete();
        }
        foreach($request->allDocuments as $key => $value){
            $file = $value;
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        
        $destinationPath = date('Y').'/'.date('M').'/uploads/student/allDocuments/'.$studentId;
        

        $path = $file->store($destinationPath,'s3');
             $basename = basename($path);
             $replacePath = '/'.$basename;
            $s3Path = Storage::disk('s3')->url($path);
            $srsPath = str_replace($replacePath,'', $s3Path);    
       $attachment = StudentAttachment::create([
            'name' => $basename,
            'path' => $srsPath,
            'type' => 'allDocuments',
            'student_id' => $studentId,
            ]);
        $attachment->save();    
        
        }
        // Session::flash('success','Documents Uploaded successfully;');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function convertPdf($id)
    {
        
        $allDocs = StudentAttachment::where('student_id',$id)->where('type','allDocuments')->get();

        $allDocuments = [];
        foreach ($allDocs as $key => $value) {
            if(Str::contains($value['name'], 'pdf')){

            }else{
            $allDocuments[] = $value;

            }
        }

        $pdf = App::make('dompdf.wrapper');
        $output = '';  
                 foreach($allDocuments as $document)
                 {
                  $output .='<img  width="100%" style="margin-bottom:20px;max-height:90%" src="'.$document['path'].'/'.$document['name'].'"><br>
                   ';
                  }
                  $output .= '';
                   $output;
        
        $pdf->loadHTML($output);
        return $pdf->stream();
    }
    public function convertPathPdf($id)
    {
    
        $chat = Chat::where('id',$id)->first();
        $pdf = App::make('dompdf.wrapper');
        $output = '';  
                 
                  $output .='<img  width="100%" style="margin-bottom:20px;max-height:90%" src="'.$chat['path'].'"><br>
                   ';
                  
                  $output .= '';
                   $output;
        
        $pdf->loadHTML($output);
        return $pdf->stream();
    }
    public function StudentShortlisting($id)
    {
    
        $Student = Student::where('id',$id)->first();
        if($Student['lock_status'] != 1){
        $allDocuments = StudentAttachment::where('student_id',$id)->where('type','allDocuments')->get();

        if(!$allDocuments){
            Session::flash('error','Provide Student Documents');
            return back();
        }
        $studentOnChange = Student::where('id',$id)->first();
       
            $Admins = Admin::where('country',$Student['applingForCountry'])->get();
            $studentQualifications = StudentQualification::with(['qualificationDocuments'])->where('student_id',$Student['id'])->get();



            $adminId = [];
            foreach ($Admins as $key => $admin) {
                if($admin->roles[0]['name'] == 'shortlisting'){

                $adminId[] = $admin['id'];
                }
            }

            $shortlistingAdmin = Admin::whereIn('id',$adminId)->inRandomOrder()->first();
            Student::where('id',$id)->update(['shortlisting_by' =>$shortlistingAdmin['id'],'shortlisting' =>1,'IsShortlisting' =>'yes','apply_for_shortlist_at' => Carbon\Carbon::now()->format('d-m-Y'),]);
        $Student = Student::where('id',$id)->first();
        
            Notification::create([
                'type' =>'admin',
                'link' =>route('studentfiles.show',base64_encode($Student['id'])),
                'agent_id' =>'',
                'application_id' =>'',
                'to' =>$shortlistingAdmin['id'],
                'student_id' => $id,
                'admin_role' => 'shortlisting',
                'message' =>'ShortListing : - A new student '.$Student['firstName'].' '.$Student['lastName'].' sent application for shortlisting at '.$Student['apply_for_shortlist_at'].'.',
                'application_status' =>'',
                'status' =>0,
                ]);
            $agent = Agent::where('status', 1)->where('id', $Student['agent_id'])->first();
            if($agent){

                Notification::create([
                'type' =>'admin',
                'link' =>route('studentfiles.show',base64_encode($Student['id'])),
                'agent_id' =>'',
                'from' =>$agent['id'],
                'to' =>$agent['account_manager'],
                'application_id' =>'',
                'student_id' => $id,
                'admin_role' => 'account manager',
                'message' =>'ShortListing : - A new student '.$Student['firstName'].' '.$Student['lastName'].' sent application for shortlisting at '.$Student['apply_for_shortlist_at'].'.',
                'application_status' =>'',
                'status' =>0,
                ]);
            }
            Session::flash('success','Application sent for shortlisting ,please keep a check on your notifications, we will update the selected programs on student profile');
        }else{
        Session::flash('error','Application already final submited');

        }
        return redirect()->route('student.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function addNewQuickShort()
    {
        Session::forget('openNext');
                Session::forget('student');
                Session::forget('studentID');
                Session::forget('edit');
        return redirect()->route('quick.shortlisting.create');
    }

    public function edit($id)
    {
        //
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
