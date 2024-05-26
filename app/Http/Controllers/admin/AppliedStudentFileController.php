<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agent\AppliedStudentFile;
use App\Models\StudentQualification;
use App\Models\QualificationGrade;
use App\Models\StudentEnglishTest;
use App\Models\StudentWorkExperiance;
use App\Models\StudentQualificationGap;
use App\Models\StudentQuestionAnswers;
use App\Models\PendancyAttachment;
use App\Models\StudentAttachment;
use App\Models\Agent\Student;
use App\Models\AllowCountryAgent;
use App\Models\Qualification;
use App\Models\EnglishTest;
use App\Models\EnglishScore;
use App\Models\CourseLevel;
use App\Models\MathScore;
use App\Models\IletsScore;
use App\Models\Loc\Country;
use App\Models\StudentQualificationTotal;
use App\Models\Loc\State;
use App\Models\Loc\City;
use App\Models\PreviousQualification;
use App\Models\QualificationBoard;
use App\Models\CountryQuestion;
use App\Models\Subject;
Use App\Helpers\ImageUpload;
use App\Models\Attachment;
use App\Models\Intake;
use App\Models\TeamPreProcess;
use App\Models\Notification;
use App\Models\TeamProcessor;
use App\Models\College;
use App\Models\Chat;
use App\Models\Inquiry;
use App\Models\ApplicationStatus;
use Bitfumes\Multiauth\Model\Role;
use App\Agent;
use Validator;
use Session;
use Carbon;
use Auth;

class AppliedStudentFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($stchCountry_id = NULL)
    {
        if($stchCountry_id != NULL){
            
        $stchCountry_id = base64_decode($stchCountry_id);
        }
        
        $isMatchPreProcess = '';
        
        $user = auth('admin')->user()->roles()->pluck('name');
        $preProcess = auth('admin')->user();
        // dd($user[0]);
        if($user[0] == 'super'){
            // dd($stchCountry_id);
        }
        
        if($user[0] == 'preprocess'){
            $allApplyStudents = AppliedStudentFile::with('college')->where('preProcessBy_id',(string)$preProcess['id'])->get();
                
            $getStudent = [];
            foreach($allApplyStudents as $allApplyStudent){
                $getStudent[] = $allApplyStudent['student_id'];
            }



            $appliedStudentFiles = Student::select("id","agent_id","student_unique_id","firstName","middleName","lastName","mobileNo","email","applingForCountry","applingForLevel","previousQualification","country_id","nationality","comment","IsShortlisting","applied_at","apply_for_shortlist_at","shortlist_compleate_at")->with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->whereIn('id',$getStudent)->where('shortlisting','0')->where('lock_status',1)->orderBy('id','DESC')->paginate(50);
            
            $isMatchPreProcess = [];
            foreach($appliedStudentFiles as $appliedStudentFile){
                foreach($appliedStudentFile->appliedStudentFiles as $value){
                    if((int)$value['preProcessBy_id'] == (int)$preProcess['id']){
                       $isMatchPreProcess[] = $appliedStudentFile['id'];
                    }
                }
            }
        }elseif($user[0] == 'process'){
            $teamProcessors = TeamProcessor::where('process_id',(string)$preProcess['id'])->get();
            $allProcessApplication = [];
            foreach($teamProcessors as $teamProcessor){
                $allProcessApplication[] = $teamProcessor['application_id'];
            }

            $allApplyStudents = AppliedStudentFile::with('college')->whereIn('id',$allProcessApplication)->orderBy('id','DESC')->paginate(50);
                
            $getStudent = [];
            foreach($allApplyStudents as $allApplyStudent){
                $getStudent[] = $allApplyStudent['student_id'];
            }
            
            $appliedStudentFiles = Student::select("id","agent_id","student_unique_id","firstName","middleName","lastName","mobileNo","email","applingForCountry","applingForLevel","previousQualification","country_id","nationality","comment","IsShortlisting","applied_at","apply_for_shortlist_at","shortlist_compleate_at")->with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->whereIn('id',$getStudent)->where('shortlisting','0')->where('lock_status',1)->orderBy('id','DESC')->paginate(50);
        }elseif($user[0] == 'account manager'){
               $agents =  Agent::where('account_manager',$preProcess['id'])->pluck('id')->toArray();

            $appliedStudentFiles = Student::select("id","agent_id","student_unique_id","firstName","middleName","lastName","mobileNo","email","applingForCountry","applingForLevel","previousQualification","country_id","nationality","comment","IsShortlisting","applied_at","apply_for_shortlist_at","shortlist_compleate_at")->with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('lock_status',1)->where('shortlisting','0')->whereIn('agent_id',$agents)->orderBy('id','DESC')->paginate(50);

        }else{
            if($stchCountry_id != NULL){

            $appliedStudentFiles = Student::select("id","agent_id","student_unique_id","firstName","middleName","lastName","mobileNo","email","applingForCountry","applingForLevel","previousQualification","country_id","nationality","comment","IsShortlisting","applied_at","apply_for_shortlist_at","shortlist_compleate_at")->with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('shortlisting','0')->where('lock_status','1')->where('applingForCountry',$stchCountry_id)->orderBy('id','DESC')->paginate(50);
            }else{
            $appliedStudentFiles = Student::select("id","agent_id","student_unique_id","firstName","middleName","lastName","mobileNo","email","applingForCountry","applingForLevel","previousQualification","country_id","nationality","comment","IsShortlisting","applied_at","apply_for_shortlist_at","shortlist_compleate_at")->with(['appliedStudentFiles' => function($sfiles) {
        $sfiles->select('id','student_id','agent_id');
    },'country' => function($cntry) {
        $cntry->select('id','path','image_name');
    },'agent' => function($agnt) {
        $agnt->select('id','name','company_name','mobileno','email');
    },'appliedStudentFilesByAdmin'=> function($adminApplictn) {
        $adminApplictn->select('id');
    }])->where('shortlisting','0')->where('lock_status',1)->orderBy('id','DESC')->paginate(50);
            // dd($appliedStudentFiles->take(10));
            }
            // $appliedStudentFiles = $appliedStudentFiles->take(10);
            // dd($appliedStudentFiles);
        }
        // $appliedStudentFiles = AppliedStudentFile::where('lock_status',1)->get();
         // $appliedStudentFiles = $appliedStudentFiles->chunk(300);
         // $appliedStudentFiles->toArray(300);
        
        
        return view('admin.appliedStudentFiles.list',compact('appliedStudentFiles','isMatchPreProcess'));
    }
    public function unlockStudent($id){
        $id = base64_decode($id);
        dd($id);
        Student::where('id',$id)->update([
            'lock_status'=>0,
            
        ]);

        $applications = AppliedStudentFile::where('student_id',$id)->get();
        foreach ($applications as $key => $value) {
            AppliedStudentFile::where('id',$value['id'])->update(['lock_status'=>'0']);    
        }
        return back();
    }
    public function changeIntake(Request $request){
            AppliedStudentFile::where('id',$request->application_id)->update(['change_intake'=>$request->change_intake_id]);    
        Session::flash('success','Application Intake Updated');
        return back();
    }
    public function pendenciesApplications()
    {
        
        $user = auth('admin')->user()->roles()->pluck('name');
        $preProcess = auth('admin')->user();
        // dd($user[0]);
        
        if($user[0] == 'preprocess'){
            $allApplyStudents = AppliedStudentFile::with('college')->where('preProcessBy_id',(string)$preProcess['id'])->get();
                
            $getStudent = [];
            foreach($allApplyStudents as $allApplyStudent){
                $getStudent[] = $allApplyStudent['student_id'];
            }
            
            $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->whereIn('id',$getStudent)->where('shortlisting','0')->where('lock_status',1)->orderBy('id','DESC')->paginate(50);
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
            
            $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->whereIn('id',$getStudent)->where('shortlisting','0')->where('lock_status',1)->orderBy('id','DESC')->paginate(50);
        }elseif($user[0] == 'account manager'){
               $agents =  Agent::where('account_manager',$preProcess['id'])->pluck('id')->toArray();

            $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('lock_status',1)->whereIn('agent_id',$agents)->orderBy('id','DESC')->paginate(50);

        }else{
            $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('shortlisting','0')->where('lock_status',1)->orderBy('id','DESC')->paginate(50);

        }
        // $appliedStudentFiles = AppliedStudentFile::where('lock_status',1)->get();
    
        return view('admin.appliedStudentFiles.pendencieslist',compact('appliedStudentFiles'));
    }
    public function clearPendenciesApplications($id)
    {
        $id = base64_decode($id);
    
        $pendancy = PendancyAttachment::where('id',$id)->update(['status'=>1]);

        Session::flash('success','Application pendancy is cleared');
        
        return back();
    }
    public function todayApplication()
    {
        $user = auth('admin')->user()->roles()->pluck('name');
        $preProcess = auth('admin')->user();
        // dd($user[0]);
        $today = Carbon\Carbon::now()->format('d-m-Y');
        $isMatchPreProcess = '';
        if($user[0] == 'preprocess'){
            $allApplyStudents = AppliedStudentFile::with('college')->where('preProcessBy_id',(string)$preProcess['id'])->get();
                
            $getStudent = [];
            foreach($allApplyStudents as $allApplyStudent){
                $getStudent[] = $allApplyStudent['student_id'];
            }
            
            $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->whereIn('id',$getStudent)->where('lock_status',1)->where('applied_at',$today)->orderBy('id','DESC')->paginate(50);
            $isMatchPreProcess = [];
            foreach($appliedStudentFiles as $appliedStudentFile){
                foreach($appliedStudentFile->appliedStudentFiles as $value){
                    if((int)$value['preProcessBy_id'] == (int)$preProcess['id']){
                       $isMatchPreProcess[] = $appliedStudentFile['id'];
                    }
                }
            }
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
            
            $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->whereIn('id',$getStudent)->where('lock_status',1)->where('applied_at',$today)->orderBy('id','DESC')->paginate(50);
        }elseif($user[0] == 'account manager'){
               $agents =  Agent::where('account_manager',$preProcess['id'])->pluck('id')->toArray();

            $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('lock_status',1)->whereIn('agent_id',$agents)->where('applied_at',$today)->orderBy('id','DESC')->paginate(50);

        }else{
            $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('lock_status',1)->where('applied_at',$today)->orderBy('id','DESC')->paginate(50);

        }
        // $appliedStudentFiles = AppliedStudentFile::where('lock_status',1)->get();
    
        return view('admin.appliedStudentFiles.list',compact('appliedStudentFiles','isMatchPreProcess'));
    }
     public function TotalShortlist()
    {
        
        $user = auth('admin')->user();
        if($user->roles[0]['name'] == 'shortlisting'){
        $getAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('applingForCountry',$user['country'])->where('IsShortlisting','yes')->orderBy('id','DESC')->paginate(50);
        }elseif($user->roles[0]['name'] == 'account manager'){
               $agents =  Agent::where('account_manager',$user['id'])->pluck('id')->toArray();
               $getAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->whereIn('agent_id',$agents)->where('IsShortlisting','yes')->orderBy('id','DESC')->paginate(50);

        }else{
         $getAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('IsShortlisting','yes')->orderBy('id','DESC')->paginate(50);

        }

     $appliedStudentFiles = $getAppliedStudentFiles;
    
        return view('admin.appliedStudentFiles.shortliststudent',compact('appliedStudentFiles'));
    }
    public function ShortlistedNotconverted()
    {
        $user = auth('admin')->user();
        if($user->roles[0]['name'] == 'shortlisting'){
        $getAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('applingForCountry',$user['country'])->where('IsShortlisting','yes')->where('lock_status','!=',1)->orderBy('id','DESC')->paginate(50);
        }else{
         $getAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('IsShortlisting','yes')->orderBy('id','DESC')->where('lock_status','!=',1)->paginate(50);

        }

     $appliedStudentFiles = $getAppliedStudentFiles;
    
        return view('admin.appliedStudentFiles.notConvertedShortlisted',compact('appliedStudentFiles'));
    }
    public function Shortlist()
    {
        
        $user = auth('admin')->user();
        if($user->roles[0]['name'] == 'shortlisting'){

        $getAppliedStudentFiles = Student::has('appliedStudentFiles','==',0)->with(['country','agent','appliedStudentFilesByAdmin'])->where('applingForCountry',$user['country'])->where('student_status',NULL)->where('shortlisting','1')->orderBy('id','DESC')->paginate(50);
        }elseif($user->roles[0]['name'] == 'account manager'){
               $agents =  Agent::where('account_manager',$user['id'])->pluck('id')->toArray();
               
               $getAppliedStudentFiles = Student::has('appliedStudentFiles','==',0)->with(['country','agent','appliedStudentFilesByAdmin'])->whereIn('agent_id',$agents)->where('student_status',NULL)->where('shortlisting','1')->orderBy('id','DESC')->paginate(50);

        }else{
            $getAppliedStudentFiles = Student::has('appliedStudentFiles','==',0)->with(['country','agent','appliedStudentFilesByAdmin'])->where('student_status',NULL)->where('shortlisting','1')->orderBy('id','DESC')->paginate(50);
        }


        $appliedStudentFiles = $getAppliedStudentFiles;

        
    
        return view('admin.appliedStudentFiles.shortliststudent',compact('appliedStudentFiles'));
    }
     public function TodayShortlist()
    {
        
        $user = auth('admin')->user();
        
        if($user->roles[0]['name'] == 'shortlisting'){
        $getAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('applingForCountry',$user['country'])->where('IsShortlisting','yes')->where('apply_for_shortlist_at',Carbon\Carbon::now()->format('d-m-Y'))->paginate(50);
        }elseif($user->roles[0]['name'] == 'account manager'){
               $agents =  Agent::where('account_manager',$user['id'])->pluck('id')->toArray();
               

               $getAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->whereIn('agent_id',$agents)->where('IsShortlisting','yes')->where('apply_for_shortlist_at',Carbon\Carbon::now()->format('d-m-Y'))->paginate(50);

        }else{

        $getAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('IsShortlisting','yes')->where('apply_for_shortlist_at',Carbon\Carbon::now()->format('d-m-Y'))->paginate(50);
        }

        $appliedStudentFiles = $getAppliedStudentFiles;

       
    
        return view('admin.appliedStudentFiles.shortliststudent',compact('appliedStudentFiles'));
    }
    public function pendingFinalSubmit($switchId = NULL)
    {
        if($switchId != NULL){
            $switchId = base64_decode($switchId);
        }
        $user = auth('admin')->user()->roles()->pluck('name');
        $preProcess = auth('admin')->user();
        // dd($user[0]);
        if($user[0] == 'preprocess'){
            $allApplyStudents = AppliedStudentFile::with('college')->where('preProcessBy_id',(string)$preProcess['id'])->get();
                
            $getStudent = [];
            foreach($allApplyStudents as $allApplyStudent){
                $getStudent[] = $allApplyStudent['student_id'];
            }
            
            $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent'])->whereIn('id',$getStudent)->where('lock_status',0)->get();
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
            
            $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent'])->whereIn('id',$getStudent)->where('lock_status',0)->get();
        }elseif($user[0] == 'account manager'){
                $ACAgents = Agent::where('status', 1)->where('account_manager', $preProcess['id'])->pluck('id');

            $allApplyStudents = AppliedStudentFile::with('college')->whereIn('agent_id', $ACAgents)->get();
                  
                    $students = [];
            foreach ($allApplyStudents as $key => $value) {
                if($value->student['lock_status'] == 0){
                    $students[] = (int)$value['student_id'];
                }
            
            }
            if($switchId != NULL){

            $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent'])->whereIn('id',$students)->where('applingForCountry',$switchId)->get();
            }else{

            $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent'])->whereIn('id',$students)->get();
            }    

        }else{
            $allApplyStudents = AppliedStudentFile::with('college')->get();
                  
                    $students = [];
            foreach ($allApplyStudents as $key => $value) {
                if($value->student['lock_status'] == 0){
                    $students[] = (int)$value['student_id'];
                }
            
            }
            if($switchId != NULL){

            $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent'])->whereIn('id',$students)->where('applingForCountry',$switchId)->get();
            }else{

            $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent'])->whereIn('id',$students)->get();
            }    

        }
        // $appliedStudentFiles = AppliedStudentFile::where('lock_status',1)->get();
        return view('admin.appliedStudentFiles.pendingFinalSubmitlist',compact('appliedStudentFiles'));
    }
    public function addMoreProgram($id)
    {

        $id = base64_decode($id);
       
        Session::put('studentID',$id);
        $id = Session::get('studentID');

        $qualifications = Qualification::get();
        $englishTests = EnglishTest::get();
        $englishScores = EnglishScore::all();
        $iletsScores = IletsScore::get();
        $mathScores = MathScore::all();
        $countries = Country::all();
        $qualificationPercentages = StudentQualificationTotal::where('type','percentage')->get();
        $qualificationDivisions = StudentQualificationTotal::where('type','division')->get();
        $qualificationGpas = StudentQualificationTotal::where('type','gpa')->get();
        $data = Student::with(['studentImage','passport','lor','moi','sop'])->where('id',$id)->first();
        
        $states = State::where('country_id',$data['country_id'])->get();
        $cities = City::where('state_id',$data['state_id'])->get();
        if($data['applingForCountry'] && $data['applingForLevel'] && $data['status'] && $data['title'] && $data['dateOfBirth'] && $data['email'] && $data['firstName'] && $data['lastName'] && $data['mobileNo'] && $data['maritalStatus'] && $data['gender'] && $data['englishScore']){

            Session::put('openNext','openNextSession');
        }
        $isEdit = 'yes';
        Session::put('edit','yes');
        Session::put('isUpdate','no');
        $questions = CountryQuestion::with('question')->where('country_id',$data['applingForCountry'])->get();
        
        $studentQualifications = StudentQualification::with(['student','qualification','country','state','city','totals','documents','boards'])->where('student_id',$id)->get();
        $studentEnglishTests = StudentEnglishTest::with(['student','englishTests','totalScores','documents'])->where('student_id',$id)->get();
        $studentWorkExperiances = StudentWorkExperiance::with('documents')->where('student_id',$id)->get();
        $studentQualificationGaps = StudentQualificationGap::with('documents')->where('student_id',$id)->get();
        $subjects = Subject::all();
        $studentQuestionAnswers = StudentQuestionAnswers::with(['questions'=>function($query){
            $query->with(['question'])->get();
        }])->where('student_id',$id)->get();
        $PreviousQualifications = PreviousQualification::all();
        $boards = QualificationBoard::orderBy('name')->get();
         $student = Student::with(['studentImage','appliedStudentFiles'])->where('id',$id)->first();
          Session::put('Fcategory',$student['category']);
        Session::put('FstudentId',$student['id']);
        Session::put('student',$student['id']);
        Session::put('FcountryId',$student['applingForCountry']);
        Session::put('FstudentName',$student['firstName']);
        Session::put('FapplingForLevel',$student['applingForLevel']);   
        Session::put('student',$student);
        return redirect()->route('search.index',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appliedStudentFiles.addNewFile');
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
            'title' => 'required|max:255',
            'qualification' => 'required',
            'student' => 'required',
            'country_id' => 'required',
            'college_id' => 'required',
            'subject_id' => 'required',
            'course_id' => 'required',
            ]
        );
        $applyStudent = AppliedStudentFile::create([
            'title' => $request->title,
            'description' => $request->description,
            'student_id' => $request->student,
            'country_id' => $request->country_id,
            'qualification' => $request->qualification,
            'college_id' => $request->college_id,
            'subject_id' => $request->subject_id,
            'course_id' => $request->course_id,
            
            ]);
        Session::flash('success','New File Request Submitted');
        return back()->withInput($request->all());
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
        // dd($id);
        $user = auth('admin')->user()->roles()->pluck('name');
        $preProcess = auth('admin')->user();
        
        $student = Student::with(['studentImage','pdfallDocuments','studentDocument','GraduationDocument','passport','country','countryAddress','qualificationLevel'])->where('id',$id)->first();
        $studentLor = StudentAttachment::where('student_id',$id)->where('type','lor')->first();
        $studentMoi = StudentAttachment::where('student_id',$id)->where('type','moi')->first();
        $studentSop = StudentAttachment::where('student_id',$id)->where('type','sop')->first();
        $studentQualifications = StudentQualification::with(['student','qualification','country','state','city','totals','documents','qualificationDocuments','boards'])->where('student_id',$id)->get();
        $qualificationGrades = QualificationGrade::get();
        $studentEnglishTests = StudentEnglishTest::with(['student','englishTests','totalScores','documents','englishTestDocuments'])->where('student_id',$id)->get();
        $studentWorkExperiances = StudentWorkExperiance::with('documents')->where('student_id',$id)->get();
        $studentQualificationGaps = StudentQualificationGap::with(['documents','gapDocument'])->where('student_id',$id)->get();
        $paymentscreenshot = StudentAttachment::where('type',$id)->where('attachment_name','paidAmountScreenshot')->first();
        if($user[0] == 'preprocess'){
            $studentCourseApplyFors= AppliedStudentFile::with(['course'=>function($q){
                $q->with('college');
            },'student','country','applicationStatus','university','country'])->where('preProcessBy_id',(string)$preProcess['id'])->where('student_id',$id)->get();
            
            $teamPreProcess = TeamPreProcess::with('admins')->where('preProcess_id',(string)$preProcess['id'])->get();
        }elseif($user[0] == 'process'){
            
            $teamProcessors = TeamProcessor::where('student_id',$id)->where('process_id',(string)$preProcess['id'])->get();
            $allProcessApplication = [];
            foreach($teamProcessors as $teamProcessor){
                $allProcessApplication[] = (int)$teamProcessor['application_id'];
            }
            
            $studentCourseApplyFors= AppliedStudentFile::with(['course'=>function($q){
                $q->with('college');
            },'student','country','applicationStatus','university','country'])->whereIn('id',$allProcessApplication)->get();
            
            $teamPreProcess = [];
            
            
        }else{
            $teamPreProcess = TeamPreProcess::with('admins')->get();
            $studentCourseApplyFors= AppliedStudentFile::with(['course'=>function($q){
                $q->with('college');
            },'student','country','applicationStatus','university','country'])->where('student_id',$id)->get();
        }
        
        $studentQuestionAnswers = StudentQuestionAnswers::with(['questions'=>function($query){
            $query->with(['question'])->get();
        }])->where('student_id',$id)->get();
        $pendancyAttachments = PendancyAttachment::with('qualification','applicationCourse')->where('student_id',$id)->where('application_id',null)->where('type','!=','other')->where('type','!=','otherAdminDoc')->where('type','!=','sopDocument')->get();
        $otherAttachments = PendancyAttachment::with('applicationCourse')->where('student_id',$id)->where('application_id',null)->where('type','other')->where('type','!=','sopDocument')->get();
        $otherAdminDocAttachments = PendancyAttachment::with('applicationCourse')->where('student_id',$id)->where('application_id',null)->where('type','otherAdminDoc')->where('type','!=','sopDocument')->get();
        
        return view('admin.appliedStudentFiles.viewStudentFile',compact('studentLor','studentMoi','studentSop','student','studentQualifications','studentEnglishTests','studentWorkExperiances','studentQualificationGaps','studentCourseApplyFors','studentQuestionAnswers','qualificationGrades','pendancyAttachments','teamPreProcess','otherAttachments','otherAdminDocAttachments','paymentscreenshot'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = base64_decode($id);
        Session::put('studentID',$id);
        $id = Session::get('studentID');
        $data = Student::with(['StudentEnglishTestScore','studentImage','passport','lor','moi','sop'])->where('id',$id)->first();
        $englishScores = EnglishScore::all();
        $iletsScores = IletsScore::where('english_test','IELTS')->where('country',$data['applingForCountry'])->get();
        $mathScores = MathScore::all();
        $countries = Country::all();
        $qualificationPercentages = StudentQualificationTotal::where('type','percentage')->get();
        $qualificationDivisions = StudentQualificationTotal::where('type','division')->get();
        $qualificationGpas = StudentQualificationTotal::where('type','gpa')->get();
        
        if($data['applingForCountry']){

        $qualifications = Qualification::where('country',$data['applingForCountry'])->orWhere('country',NULL)->get();
        if($data['applingForCountry'] == '38'){
        
            $qualifications = CourseLevel::get();
            
        }
        $englishTests = EnglishTest::where('country_id',$data['applingForCountry'])->get();
        }else{
        $qualifications = [];
        $englishTests = [];

        }
        $states = State::where('country_id',$data['country_id'])->get();
        $cities = City::where('state_id',$data['state_id'])->get();
        if($data['applingForCountry'] && $data['applingForLevel'] && $data['status'] && $data['title'] && $data['dateOfBirth'] && $data['email'] && $data['firstName'] && $data['lastName'] && $data['mobileNo'] && $data['maritalStatus'] && $data['gender']){
            if ($data['applingForCountry'] == 230) {
                if ($data['englishScore']) {
                
                     Session::put('openNext','openNextSession');
                }
            }else{
                     Session::put('openNext','openNextSession');

            }
        }
        $isEdit = 'yes';
        Session::put('edit','yes');
        $student = STudent::where('id',$id)->first();
        $questions = CountryQuestion::with('question')->where('country_id',$data['applingForCountry'])->get();
        
        $studentQualifications = StudentQualification::with(['student','qualification','country','state','city','totals','documents','boards'])->where('student_id',$id)->get();
        $studentEnglishTests = StudentEnglishTest::with(['student','englishTests','totalScores','documents','ieltstotalScores'])->where('student_id',$id)->first();
        $studentWorkExperiances = StudentWorkExperiance::with('documents')->where('student_id',$id)->get();
        $studentQualificationGaps = StudentQualificationGap::with('documents')->where('student_id',$id)->get();
        $subjects = Subject::all();
        $studentQuestionAnswers = StudentQuestionAnswers::with(['questions'=>function($query){
            $query->with(['question'])->get();
        }])->where('student_id',$id)->get();
        $agentAllowCountry = AllowCountryAgent::where('agent_id',$student['agent_id'])->pluck('country_id')->toArray();
        $PreviousQualifications = PreviousQualification::all();
        $boards = QualificationBoard::orderBy('name')->get();
    
        return view('admin.appliedStudentFiles.editStudent',compact('student','boards','mathScores','englishScores','qualificationGpas','qualificationDivisions','agentAllowCountry','qualificationPercentages','qualifications','data','countries','englishTests','iletsScores','isEdit','studentQualifications','studentEnglishTests','studentWorkExperiances','studentQualificationGaps','states','cities','questions','studentQuestionAnswers','subjects','PreviousQualifications'));
    }
    /**
     * Show the form for updateAcceptStatus the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAcceptStatus($id)
    {

        $applyStudent = StudentAttachment::where('id',$id)->update(['status'=>'1']);
        $document = StudentAttachment::where('id',$id)->first();
        $Student = Student::where('id',$document['student_id'])->first();
        Notification::create([
            'type' =>'status student document accepted',
            'link' =>route('student.show',base64_encode($Student['id'])),
            'agent_id' =>$Student['agent_id'],
            'application_id' =>'',
            'message' =>$document['type'].' Document of Student '.$Student['firstName'].' is accepted',
            'application_status' =>'',
            'status' =>0,
            ]);
            $numbers = [$Student['agent']['mobileno']];
                
            $text = $document['type'].' Document of Student '.$Student['firstName'].' is accepted';
                
            $messagess = Notify::whatsappnotif($numbers,$text);
    
        return back();
    }
    public function updateStudentComment(Request $request)
    {
        
        $applyStudent = Student::where('id',$request->studentId)->update(['comment'=>$request->comment]);
        
        Session::flash('success','comment added');
        return back();
    }
    public function updateRejectStatus($id)
    {
        $applyStudent = StudentAttachment::where('id',$id)->update(['status'=>'2']);
        
        $document = StudentAttachment::where('id',$id)->first();
        $Student = Student::where('id',$document['student_id'])->first();
        Notification::create([
            'type' =>'status student document rejected',
            'link' =>route('student.show',base64_encode($Student['id'])),
            'agent_id' =>$Student['agent_id'],
            'application_id' =>'',
            'message' =>$document['type'].' Document of Student '.$Student['firstName'].' is rejected',
            'application_status' =>'',
            'status' =>0,
            ]);
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
        
       $student = Student::where('id',$id)->update([
                'applingForLevel' => $request->apply_qualification_level,
                // 'dateOfBirth' => $request->dateOfBirth,
                'email' => $request->email,
                'firstName' => $request->firstName,
                'middleName' => $request->middleName,
                'lastName' => $request->lastName,
                'mobileNo' => $request->mobile,
                // 'previousQualification' => $request->previousQualification,
                // 'phoneNo' => $request->phone,
                'maritalStatus' => $request->maritalStatus,
                'gender' => $request->gender,

                ]);

       if($request->ieltsScorID){
        StudentEnglishTest::where('id',$request->ieltsScorID)->update([
                                                                        'totalScore' => $request->ilets_score,
                                                                    ]);

       }
            
            Session::flash('success','Details Updated');
            return back();  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AppliedStudentFile::where('id',$id)->delete();
        Session::flash('success','File deleted');
        return back();
    }
    public function getApplications()
    {
        $agents = Agent::get();
        $intakes = Intake::get();
        $colleges = College::get();
        $applicationStatus = ApplicationStatus::get();
        $user = auth('admin')->user()->roles()->pluck('name');
        $preProcess = auth('admin')->user();
        // dd($user[0]);
        if($user[0] == 'preprocess'){
            $appliedStudentFiles = AppliedStudentFile::with(['course'=>function($q){
                $q->with(['college','intakes']);
            },'student','country','applicationStatus','agent'])->where('preProcessBy_id',(string)$preProcess['id'])->get();
                
            // $getStudent = [];
            // foreach($allApplyStudents as $allApplyStudent){
            //     $getStudent[] = $allApplyStudent['student_id'];
            // }
            
            // $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent'])->whereIn('id',$getStudent)->where('lock_status',1)->orderBy('id','DESC')->get();
        }elseif($user[0] == 'process'){
            $teamProcessors = TeamProcessor::where('process_id',(string)$preProcess['id'])->get();
            $allProcessApplication = [];
            foreach($teamProcessors as $teamProcessor){
                $allProcessApplication[] = $teamProcessor['application_id'];
            }

            $appliedStudentFiles = AppliedStudentFile::with(['course'=>function($q){
                $q->with(['college','intakes']);
            },'student','country','applicationStatus','agent'])->whereIn('id',$allProcessApplication)->get();
                
            // $getStudent = [];
            // foreach($allApplyStudents as $allApplyStudent){
            //     $getStudent[] = $allApplyStudent['student_id'];
            // }
            
            // $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent'])->whereIn('id',$getStudent)->where('lock_status',1)->orderBy('id','DESC')->get();
        }else{
        $appliedStudentFiles = AppliedStudentFile::with(['course'=>function($q){
            $q->with(['college','intakes']);
        },'student','country','applicationStatus','agent'])->get();
        }
        return  ['appliedStudentFiles'=>$appliedStudentFiles,'agents'=>$agents,'intakes'=>$intakes,'colleges'=>$colleges,'applicationStatus'=>$applicationStatus];
    }
     public function getpendingApplications()
    {
        $agents = Agent::get();
        $intakes = Intake::get();
        $colleges = College::get();
        $applicationStatus = ApplicationStatus::get();
        $user = auth('admin')->user()->roles()->pluck('name');
        $preProcess = auth('admin')->user();
        // dd($user[0]);
        if($user[0] == 'preprocess'){
            $appliedStudentFiles = AppliedStudentFile::with(['course'=>function($q){
                $q->with(['college','intakes']);
            },'student','country','applicationStatus','agent'])->where('preProcessBy_id',(string)$preProcess['id'])->where('file_status','1')->get();
                
            // $getStudent = [];
            // foreach($allApplyStudents as $allApplyStudent){
            //     $getStudent[] = $allApplyStudent['student_id'];
            // }
            
            // $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent'])->whereIn('id',$getStudent)->where('lock_status',1)->orderBy('id','DESC')->get();
        }elseif($user[0] == 'process'){
            $teamProcessors = TeamProcessor::where('process_id',(string)$preProcess['id'])->get();
            $allProcessApplication = [];
            foreach($teamProcessors as $teamProcessor){
                $allProcessApplication[] = $teamProcessor['application_id'];
            }

            $appliedStudentFiles = AppliedStudentFile::with(['course'=>function($q){
                $q->with(['college','intakes']);
            },'student','country','applicationStatus','agent'])->whereIn('id',$allProcessApplication)->where('file_status','1')->get();
                
            $getStudent = [];
            foreach($allApplyStudents as $allApplyStudent){
                $getStudent[] = $allApplyStudent['student_id'];
            }
            
            // $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent'])->whereIn('id',$getStudent)->where('lock_status',1)->orderBy('id','DESC')->get();
        }else{
        $appliedStudentFiles = AppliedStudentFile::with(['course'=>function($q){
            $q->with(['college','intakes']);
        },'student','country','applicationStatus','agent'])->where('file_status','1')->get();
        }
        return  ['appliedStudentFiles'=>$appliedStudentFiles,'agents'=>$agents,'intakes'=>$intakes,'colleges'=>$colleges,'applicationStatus'=>$applicationStatus];
    }

     public function studentsearch(Request $request,$text)
    {
        $user = auth('admin')->user()->roles()->pluck('name');
        $text = strtolower($text);
        if($user[0] == 'account manager'){
            $agents =  Agent::where('account_manager',auth('admin')->user()->id)->pluck('id')->toArray();
            $students = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->whereIn('agent_id',$agents);
            $students->where('firstName','LIKE','%'.$text.'%')->orWhere('email','LIKE','%'.$text.'%')->orWhere('student_unique_id','LIKE','%'.$text.'%');
            $files = $students;
        }elseif($user[0] == 'shortlisting'){
            $adminUser = auth('admin')->user();
            $students = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('IsShortlisting','yes');
            $students->where('firstName','LIKE','%'.$text.'%')->orWhere('email','LIKE','%'.$text.'%')->orWhere('student_unique_id','LIKE','%'.$text.'%');
            $files = $students->where('applingForCountry',$adminUser['country']);
        }else{
            $students = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('id','!=', NULL);
            $students->where('firstName','LIKE','%'.$text.'%')->orWhere('email','LIKE','%'.$text.'%')->orWhere('student_unique_id','LIKE','%'.$text.'%');
            $files = $students;
        }
            $files = $files->orderBy('id','DESC')->paginate(20);
        return view('admin.applications.searchlist', compact('files'));

    }

    public function TodayShortlisted()
    {
        $today = Carbon\Carbon::now()->format('d-m-Y');
        $admin = Auth::guard('admin')->user();
        if($admin->roles[0]['name'] == 'shortlisting')
        {
            $getShortTDAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('IsShortlisting','yes')->where('applingForCountry',$admin['country'])->where('apply_for_shortlist_at', $today)->get();
        }else{
            $getShortTDAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('IsShortlisting','yes')->where('apply_for_shortlist_at', $today)->get();
        }
        if ($admin->roles[0]['name'] == 'account manager')
        {
            $ACAgents = Agent::where('status', 1)->where('account_manager', $admin['id'])->pluck('id');

            $getShortTDAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->whereIn('agent_id', $ACAgents)->where('IsShortlisting','yes')->where('apply_for_shortlist_at', $today)->get();
        }
        $todayTotalShortlisted = $this->getTodayShortlisted($getShortTDAppliedStudentFiles);
        if(sizeof($todayTotalShortlisted) > 0){
            $appliedStudentCollection = collect($todayTotalShortlisted);
            $appliedStudentPluck = $appliedStudentCollection->pluck('id');
        }else{
            $appliedStudentPluck = collect();
        }
        $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->whereIn('id',$appliedStudentPluck->toArray())->paginate(50);
        return view('admin.appliedStudentFiles.shortliststudent',compact('appliedStudentFiles'));
    }
    public function getTodayShortlisted($getTodayShortlisted)
    {
        
        $appliedStudentFiles = [];
        foreach($getTodayShortlisted as $key => $value) {
            $date = Carbon\Carbon::now()->format('d-m-Y');
            if($value['IsShortlisting'] == 'yes' && $value['shortlist_compleate_at'] == $date){
                    $appliedStudentFiles[] = $value;
            }
        }
        
        return $appliedStudentFiles;
    }

     public function allDocsshow($id)
    {
        $id = base64_decode($id);
        // dd($id);
        $user = auth('admin')->user()->roles()->pluck('name');
        $preProcess = auth('admin')->user();
        
        $messages = Chat::where('student_id',$id)->where('path','!=', NULL)->get();

        $hasAttachs = StudentAttachment::where('student_id',$id)->where('type','allDocuments')->get();
        $student = Student::with(['studentImage','pdfallDocuments','studentDocument','GraduationDocument','passport','country','countryAddress','qualificationLevel'])->where('id',$id)->first();
        $studentLor = StudentAttachment::where('student_id',$id)->where('type','lor')->first();
        $studentMoi = StudentAttachment::where('student_id',$id)->where('type','moi')->first();
        $studentSop = StudentAttachment::where('student_id',$id)->where('type','sop')->first();
        $studentQualifications = StudentQualification::with(['student','qualification','country','state','city','totals','documents','qualificationDocuments','boards'])->where('student_id',$id)->get();
        $qualificationGrades = QualificationGrade::get();
        $studentEnglishTests = StudentEnglishTest::with(['student','englishTests','totalScores','documents','englishTestDocuments'])->where('student_id',$id)->get();
        $studentWorkExperiances = StudentWorkExperiance::with('documents')->where('student_id',$id)->get();
        $studentQualificationGaps = StudentQualificationGap::with(['documents','gapDocument'])->where('student_id',$id)->get();
        $paymentscreenshot = StudentAttachment::where('type',$id)->where('attachment_name','paidAmountScreenshot')->first();
        if($user[0] == 'preprocess'){
            $studentCourseApplyFors= AppliedStudentFile::with(['course'=>function($q){
                $q->with('college');
            },'student','country','applicationStatus','university','country'])->where('preProcessBy_id',(string)$preProcess['id'])->where('student_id',$id)->get();
            
            $teamPreProcess = TeamPreProcess::with('admins')->where('preProcess_id',(string)$preProcess['id'])->get();
        }elseif($user[0] == 'process'){
            
            $teamProcessors = TeamProcessor::where('student_id',$id)->where('process_id',(string)$preProcess['id'])->get();
            $allProcessApplication = [];
            foreach($teamProcessors as $teamProcessor){
                $allProcessApplication[] = (int)$teamProcessor['application_id'];
            }
            
            $studentCourseApplyFors= AppliedStudentFile::with(['course'=>function($q){
                $q->with('college');
            },'student','country','applicationStatus','university','country'])->whereIn('id',$allProcessApplication)->get();
            
            $teamPreProcess = [];
            
            
        }else{
            $teamPreProcess = TeamPreProcess::with('admins')->get();
            $studentCourseApplyFors= AppliedStudentFile::with(['course'=>function($q){
                $q->with('college');
            },'student','country','applicationStatus','university','country'])->where('student_id',$id)->get();
        }
        
        $studentQuestionAnswers = StudentQuestionAnswers::with(['questions'=>function($query){
            $query->with(['question'])->get();
        }])->where('student_id',$id)->get();
        $pendancyAttachments = PendancyAttachment::with('qualification','applicationCourse')->where('student_id',$id)->where('application_id',null)->where('type','!=','other')->where('type','!=','otherAdminDoc')->where('type','!=','sopDocument')->get();
        $otherAttachments = PendancyAttachment::with('applicationCourse')->where('student_id',$id)->where('application_id',null)->where('type','other')->where('type','!=','sopDocument')->get();
        $otherAdminDocAttachments = PendancyAttachment::with('applicationCourse')->where('student_id',$id)->where('application_id',null)->where('type','otherAdminDoc')->where('type','!=','sopDocument')->get();
        
        return view('admin.appliedStudentFiles.allDocsStudentFile',compact('studentLor','studentMoi','studentSop','student','studentQualifications','studentEnglishTests','studentWorkExperiances','studentQualificationGaps','studentCourseApplyFors','studentQuestionAnswers','qualificationGrades','pendancyAttachments','teamPreProcess','otherAttachments','otherAdminDocAttachments','paymentscreenshot','messages','hasAttachs'));
    }
    public function studentinquirylist()
        {
            $students = Inquiry::orderBy('id','DESC')->get();

            return view('admin.appliedStudentFiles.studentinquirylist',compact('students'));
        }

}
