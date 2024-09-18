<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agent\AppliedStudentFile;
use App\Models\ApplicationStatus;
use App\Models\Agent\Student;
use App\Models\TeamProcessor;
use App\Models\ApplicationDocument;
use App\Models\PendancyAttachment;
use App\Models\Sop_pendency;
use App\Models\Notification;
use App\Models\ApplicationStatusTimeline;
use App\Models\College;
use App\Models\Course;
use App\Models\Intake;
use App\Models\MergeIntake;
use Bitfumes\Multiauth\Model\Role;
use App\Http\Helpers\Notify;
use App\Agent;
use Validator;
use Session;
use Carbon;
use Auth;
use Mail;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($stchCountry_id = NULL)
    {
                
        $stchCountry_id = base64_decode($stchCountry_id);
        ini_set('memory_limit', '-1');
        $user = auth('admin')->user()->roles()->pluck('name');
        $preProcess = auth('admin')->user();
        // dd($user[0]);
        if($user[0] == 'preprocess'){

            $allApplyStudents = AppliedStudentFile::with('college')->where('preProcessBy_id',(string)$preProcess['id'])->get();
                
            $getStudent = [];
            foreach($allApplyStudents as $allApplyStudent){
                $getStudent[] = $allApplyStudent['student_id'];
            }
            
            $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent'])->whereIn('id',$getStudent)->where('lock_status','1')->orderBy('id','DESC')->paginate(100);
        }elseif($user[0] == 'process'){
            $teamProcessors = TeamProcessor::where('process_id',(string)$preProcess['id'])->get();
            $allProcessApplication = [];
            foreach($teamProcessors as $teamProcessor){
                $allProcessApplication[] = $teamProcessor['application_id'];
            }

            $allApplyStudents = AppliedStudentFile::with('college')->whereIn('id',$allProcessApplication)->get();
                
            $getStudent = [];
            foreach($allApplyStudents as $allApplyStudent){
                $getStudent[] = $allApplyStudent['student_id'];
            }
            
            $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent'])->whereIn('id',$getStudent)->where('lock_status',1)->orderBy('id','DESC')->paginate(100);
        }elseif($user[0] == 'account manager'){
               $agents =  Agent::where('account_manager',$preProcess['id'])->pluck('id')->toArray();
               $getAppliedStudentFiles = AppliedStudentFile::with(['student','course','country'])->where('lock_status',1)->whereIn('agent_id',$agents)->orderBy('id','DESC')->paginate(100);
                
                $appliedStudentFiles = $getAppliedStudentFiles;

           }else{
            if($stchCountry_id != NULL){
            $getAppliedStudentFiles = AppliedStudentFile::with(['student','course','country'])->where('lock_status',1)->where('country_id',$stchCountry_id)->paginate(100);
            }else{

            $getAppliedStudentFiles = AppliedStudentFile::with(['student','course','country'])->where('lock_status',1)->paginate(100);
            }
            
                $appliedStudentFiles = $getAppliedStudentFiles;
        }
        
        return view('admin.applications.list',compact('appliedStudentFiles'));
    }
    public function pendingApplications()
    {
        $user = auth('admin')->user()->roles()->pluck('name');
        $preProcess = auth('admin')->user();
        // dd($user[0]);
        if($user[0] == 'preprocess'){

            $allApplyStudents = AppliedStudentFile::with('college')->where('preProcessBy_id',(string)$preProcess['id'])->where('file_status','1')->get();
                
            $getStudent = [];
            foreach($allApplyStudents as $allApplyStudent){
                $getStudent[] = $allApplyStudent['student_id'];
            }
            
            $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent'])->whereIn('id',$getStudent)->where('lock_status','1')->orderBy('id','DESC')->get();
        }elseif($user[0] == 'process'){
            $teamProcessors = TeamProcessor::where('process_id',(string)$preProcess['id'])->get();
            $allProcessApplication = [];
            foreach($teamProcessors as $teamProcessor){
                $allProcessApplication[] = $teamProcessor['application_id'];
            }

            $allApplyStudents = AppliedStudentFile::with('college')->whereIn('id',$allProcessApplication)->where('file_status','1')->get();
                
            $getStudent = [];
            foreach($allApplyStudents as $allApplyStudent){
                $getStudent[] = $allApplyStudent['student_id'];
            }
            
            $appliedStudentFiles = Student::with(['appliedStudentFiles,function($q){}','country','agent'])->whereIn('id',$getStudent)->where('lock_status',1)->orderBy('id','DESC')->get();
        }else{
            $appliedStudentFiles = AppliedStudentFile::with(['student','course','country'])->where('file_status','1')->get();
        }
        $appliedStudentFiles = $this->getPendingApplications($appliedStudentFiles);        
        return view('admin.applications.pendinglist',compact('appliedStudentFiles'));
    }

    public function getPendingApplications($applications)
    {
        $lastFiveDays =  Carbon\Carbon::now()->subDays(5);
        $resultApplications = [];
        foreach ($applications as $key => $value) {
            if($value['file_status_'] != 10 && $value['file_status_'] != 11 && $value['file_status_'] != 12){
            if($value['updated_at'] < $lastFiveDays){
                $resultApplications[] = $value; 
            }
            }
        }
        
        return $resultApplications;
    }
    public function todayAppltToUni()
    {
        $todaySentToUni =  ApplicationStatusTimeline::with('application')->where('status_id',2)->whereDate('status_date',Carbon\Carbon::now())->get();
            
        $appliedStudentFiles =  $todaySentToUni;

        return view('admin.applications.todayApplylist',compact('appliedStudentFiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function statusApplications($id,$stchCountry_id = NULL)
    {

        $id = base64_decode($id);
        $stchCountry_id = base64_decode($stchCountry_id);

        if($stchCountry_id != NULL){
        
            $applys = AppliedStudentFile::with(['applicationStatus','college','student'=>function($qual){
                $qual->with(['qualificationLevel'])->get();
            },'course'=>function($q){
                $q->with(['intakes','course_levels','college'])->get();
            },'pendencies','offerLettr'])->where('file_status',$id)->where('country_id',$stchCountry_id)->get();
        }else{
            if($id == 1){$cadStatus = 15; }elseif($id == 2){$cadStatus = 16; }elseif($id == 3){$cadStatus = 17; }elseif($id == 4){$cadStatus = 19; }elseif($id == 5){$cadStatus = 18; }elseif($id == 10){$cadStatus = 20; }elseif($id == 8){$cadStatus = 21; }elseif($id == 13){$cadStatus = 22; }elseif($id == 14){$cadStatus = 23; }elseif($id == 12){$cadStatus = 21; }elseif($id == 9){$cadStatus = 9; }
            $applys = AppliedStudentFile::with(['applicationStatus','college','student'=>function($qual){
                $qual->with(['qualificationLevel'])->get();
            },'course'=>function($q){
                $q->with(['intakes','course_levels','college'])->get();
            },'pendencies','offerLettr'])->where('file_status',$id)->orWhere('file_status',$cadStatus)->get();
        }
            

        $applications = [];
        foreach($applys as $application){
            if($application){
                if($application->student){
                    if($application->student['lock_status'] == '1'){
                        $applications[] = $application;
                    }
                }
            }
        }
        
        
        return view('admin.applications.statusList',compact('applications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function updateApplicationStatus(Request $request)
    {
        
        AppliedStudentFile::where('id',$request->applicationId)->update([
            'file_status' => $request->status,
            ]);
       

        $hasStatus = ApplicationStatusTimeline::where('application_id',$request->applicationId)->where('status_id',$request->status)->first();
        if(!$hasStatus){
            ApplicationStatusTimeline::create([
                'application_id' =>$request->applicationId,
                'status_id' =>$request->status,
                'status_date' => date('Y-m-d H:i:s'),
                ]);
                    
        }
        $applicationSts = ApplicationStatus::where('id',$request->status)->first();
        $application = AppliedStudentFile::with('college')->where('id',$request->applicationId)->first();
        $student = Student::where('id',$application['student_id'])->first();
                $admin = Auth::guard('admin')->user();
                $role = Role::where('id',$admin['id'])->first();
        if($role == '4'){

            Notification::create([
                'type' =>'admin',
                'user' =>$admin['id'],
                'link' =>route('application.show',base64_encode($request->applicationId)),
                'agent_id' =>$application['agent_id'],
                'student_id' =>$application['student_id'],
                'application_id' =>$request->applicationId,
                'message' =>'Application of '.$student['firstName'].' '.$student['lastName'].' for '.$application->course['name'].' in '.$application->course->college['name'].' status updated '.$applicationSts['name'],
                'application_status' =>'',
                'status' =>0,
                ]);

        }
            $allApplications = AppliedStudentFile::with('college')->where('student_id',$student['id'])->get();
            $applicationStatusTimelines = ApplicationStatusTimeline::with(['status','application'])->where('application_id',$request->applicationId)->get();
            $agent = Agent::where('id',$application['agent_id'])->first()->toArray();
            $data['agent'] = $agent;
            $data['student'] = $student;
            $data['application'] = $application;
            $data['allApplications'] = $allApplications;
            $data['timelines'] = $applicationStatusTimelines;
            $data['appStatus'] = $applicationSts;
            $mail =  Mail::send('emails.updateStatus',['data' => $data], function($message) use ($data,$application,$student,$applicationSts) {
                $message->to($data['agent']['email']);
                $message->subject('Application of '.$student['firstName'].' '.$student['lastName'].' for '.$application->course['name'].' in '.$application->course->college['name'].' status updated '.$applicationSts['name']);
                $message->from('himanshu@admitoffer.com','ADMITLY');

                $agentAM = Agent::where('id',$application['agent_id'])->first();
                $am = $agentAM->accountManager['mobile'];
                $numbers = [$data['agent']['mobileno'],$am];
                $text = "*".ucfirst($data["agent"]["name"])." |* - Application of ".$student["firstName"]." ".$student["lastName"]." for ".$application->course["name"]." in ".$application->course->college["name"]." status updated ".$applicationSts["name"].". Click here to track student's updates. ".route('student.track.View',base64_encode($application['id']));
                // $messagess = Notify::whatsappnotif($numbers,$text);

            });
        Notification::create([
            'type' =>'agent',
            'link' =>route('student.application.View',base64_encode($request->applicationId)),
            'agent_id' =>$application['agent_id'],
            'student_id' =>$application['student_id'],
            'application_id' =>$request->applicationId,
            'message' =>'Application of '.$student['firstName'].' '.$student['lastName'].' for '.$application->course['name'].' in '.$application->course->college['name'].' status updated  '.$applicationSts['name'],
            'application_status' =>'',
            'status' =>0,
            ]);
        
        Session::flash('success','Application status Updated');
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
        
        $id = base64_decode($id);
        $studentCourseApplyFors= AppliedStudentFile::with(['course'=>function($q){
            $q->with('college');
        },'student','country'])->where('id',$id)->first();
        $student = Student::with(['studentImage','studentDocument','GraduationDocument','passport','country','countryAddress','qualificationLevel'])->where('id',$studentCourseApplyFors['student_id'])->first();
        $applicationStatus = ApplicationStatus::get();
        $casDocument = ApplicationDocument::where('application_id',$id)->where('type','casDoc')->first();
        $visaDocument = ApplicationDocument::where('application_id',$id)->where('type','visa')->first();
        $applicationDocument = ApplicationDocument::where('application_id',$id)->where('type','offerletter')->first();
        $applicationLOAOfferDocument = ApplicationDocument::where('application_id',$id)->where('type','loaOfferLetter')->first();
        $applicationCASDocument = ApplicationDocument::where('application_id',$id)->where('type','clearCasDocument')->first();
        $applicationFee = ApplicationDocument::with('applicationFee')->where('application_id',$id)->where('type','tutionFee')->first();
        $clgSignedDoc = ApplicationDocument::where('application_id',$id)->where('type','clgSignedDoc')->first();
        $sopDoc = Sop_pendency::where('application_id',$id)->first();
        $pendancyAttachments = PendancyAttachment::with('qualification','applicationCourse')->where('student_id',$student['id'])->where('application_id',$id)->get();
        $applicationStatusTimelines = ApplicationStatusTimeline::with(['status','application'])->where('application_id',$id)->get();
           $colleges =  College::get();
           $mergeIntakes =  MergeIntake::get();
           $intakes =  Intake::get();
        return view('admin.applications.view',compact('clgSignedDoc','mergeIntakes','intakes','colleges','sopDoc','applicationStatusTimelines','applicationCASDocument','pendancyAttachments','visaDocument','casDocument','applicationFee','studentCourseApplyFors','student','applicationStatus','applicationDocument','applicationLOAOfferDocument'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function getCourses($intake_id,$institute_id)
    {
        $courses = Course::where('college_id',$institute_id)->where('merge_intake_id',$intake_id)->get();
        return $courses;
    }
    public function UpdateChangeCourses(Request $request)
    {
        $validator =  $this->validate($request,
        [        
            'course_id' => 'required',
            ]
        );

        $applyStudentUpdate = AppliedStudentFile::where('id',(int)$request->application_id)->update(['course_id'=>$request->course_id,'file_status'=>'1','college_id'=>$request->institute]);
        Session::flash('success','Program Update');
        return back();
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
