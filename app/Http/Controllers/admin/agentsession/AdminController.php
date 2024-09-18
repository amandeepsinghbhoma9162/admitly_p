<?php
namespace App\Http\Controllers\admin\agentsession;

use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Http\Request;
use App\Agent;
use Illuminate\Routing\Controller;
use App\Models\Agent\Student;
use App\Models\Agent\AppliedStudentFile;
use App\Models\StudentQualification;
use App\Models\StudentQualificationGap;
use App\Models\ApplicationStatusTimeline;
use App\Models\StudentQuestionAnswers;
use App\Models\StudentEnglishTest;
use App\Models\StudentWorkExperiance;
use App\Models\Course;
use App\Models\College;
use App\Models\PendancyAttachment;
use App\Models\ProgramTitle;
use App\Models\Question;
use App\Models\Loc\Country;
use App\Models\Loc\State;
use App\Models\Loc\City;
Use App\Helpers\ImageUpload;
use App\Models\Attachment;
use App\Models\StudentQualificationTotal;
use App\Models\StudentAttachment;
use App\Models\Qualification;
use App\Models\QualificationGrade;
use App\Models\EnglishTest;
use App\Models\Notification;
use App\Models\IletsScore;
use App\Models\CountryQuestion;
use App\Models\ApplicationDocument;
use App\Models\Announcement;
use App\Models\University;
use Khill\Lavacharts\Lavacharts;
use Bitfumes\Multiauth\Model\Role;
use Response;
use Validator;
use Session;
use Carbon;
use Auth;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth:admin');
        // $this->middleware('role:super', ['only'=>'show']);
        
    }

    public function index($id)
    {
        $id = base64_decode($id);
        $admin = Auth::guard('admin')->user();
        $role = Role::where('id', $admin['id'])->first();
        $agent = Agent::where('id', $id)->first();
        $city = City::where('id',$agent['city_id'])->first();
        $studentFiles = Student::where('agent_id', $id)->get();
        $students = Student::where('lock_status', 1)->where('agent_id', $id)->get();
        $studentshort = Student::where('IsShortlisting', 'yes')->where('agent_id', $id)->get();
        $appliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('agent_id', $id)->orderBy('id','DESC')->paginate(50);
        $notifications = Notification::where('agent_id',$agent['id'])->where('type','!=','status Chat')->orderBy('id','DESC')->get()->take(10);
        // dd($studentlists);
        $pendstudentshort = Student::where('IsShortlisting', 'yes')->where('agent_id', $id)->where('shortlist_compleate_at', NULL)->get();
        $sallfiles = AppliedStudentFile::with(['student' => function ($img)
                {
                    $img->with(['studentImage'])
                        ->get();
                }
                , 'course' => function ($q)
                {
                    $q->with(['college' => function ($uni)
                    {
                        $uni->with(['university'])
                            ->get();
                    }
                    ])
                        ->first();
                }
                , 'country', 'applicationStatus', 'agent'])
                    ->where('agent_id',$id)->get();        
        
        $today = Carbon\Carbon::now()->format('d-m-Y');

        $submittedFiles = [];
        $notSubmittedFiles = [];
        $todayApplied = [];
        foreach ($sallfiles as $file)
        {
              if($file->student['lock_status'] == 1){
                    
                        if($file['file_status'] >= 1){
                            $submittedFiles[] = $file->student['id'];
                        }
                    
                }else{
                    
                    if($file->student['file_status'] == 0){
                        if(!in_array($file['student_id'],$notSubmittedFiles)){
                            if($file->student){
                                if($file->student['id']){
                                    $notSubmittedFiles[] = $file->student['id'];
                                }
                            }

                        }
                    }
                }


            if ($file->student['lock_status'] == 1)
            {
                if ($file->student['applied_at'] == $today)
                {
                    if (!in_array($file['student_id'], $todayApplied))
                    {
                        $todayApplied[] = $file['student_id'];

                    }
                }
            }

        }
        $activeFiles = AppliedStudentFile::where('file_status', '>', 1)->where('file_status', '<', 10)
            ->where('agent_id',$id)->get();

              
         $todayApplied =  Student::where('lock_status',1)->where('agent_id',$id)->where('applied_at',$today)->get();
         $todaySentToUni =  ApplicationStatusTimeline::where('status_id',2)->whereDate('status_date',Carbon\Carbon::now())->get();

        $fileds = AppliedStudentFile::with(['college' => function ($uni)
        {
            $uni->with(['university'])
                ->get();
        }
        , 'country', 'applicationStatus', 'agent'])
            ->select('college_id', DB::raw('count(*) as total'))
            ->groupBy('college_id')
            ->orderBy('total', 'desc')
            ->get();

        $agentApplications = AppliedStudentFile::with(['college' => function ($uni)
        {
            $uni->with(['university'])
                ->get();
        }
        , 'country', 'applicationStatus', 'agent'])
            ->select('agent_id', DB::raw('count(*) as total'))
            ->groupBy('agent_id')
            ->orderBy('total', 'desc')
            ->where('agent_id',$id)->get();

       
         if ($admin->roles[0]['id'] == 3)
        {
            $isPreprocess = 'yes';
        }
        else
        {
            $isPreprocess = 'no';

        }


        if($admin->roles[0]['name'] == 'process')
        {
            $isProcess = 'yes';
        }else{

            $isProcess = 'no';
        }
        if($admin->roles[0]['name'] == 'shortlisting')
        {
            
            $isShortListing = 'yes';
            $getShortAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('applingForCountry',$admin['country'])->where('student_status',NULL)->where('agent_id',$id)->where('shortlisting','1')->get();
        $getShortTDAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('IsShortlisting','yes')->where('applingForCountry',$admin['country'])->where('agent_id',$id)->where('apply_for_shortlist_at', $today)->get();

        $totalStudentForShortlist = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('applingForCountry',$admin['country'])->where('agent_id',$id)->where('IsShortlisting','yes')->get();
        }else{

            $isShortListing = 'no';
            $getShortAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('student_status',NULL)->where('agent_id',$id)->where('shortlisting','1')->get();
        $getShortTDAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('IsShortlisting','yes')->where('agent_id',$id)->where('apply_for_shortlist_at', $today)->get();
        $totalStudentForShortlist = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('agent_id',$id)->where('IsShortlisting','yes')->get();
        }

        $totalApplications = AppliedStudentFile::get();
        $getNewApplications = AppliedStudentFile::where('file_status', 1)->get();
        $getApplicationsSenttoUni = AppliedStudentFile::where('file_status', 2)->get();
        $applicationsconditioOfferUpload = AppliedStudentFile::where('file_status', 3)->get();
        $applicationsUnconditioOfferUpload = AppliedStudentFile::where('file_status', 4)->get();
       
        $ttpaid = AppliedStudentFile::where('file_status', 5)->get();
        $visaApproved = AppliedStudentFile::where('file_status', 10)->get();
        $provideCAS = AppliedStudentFile::where('file_status', 8)->get();
        $notEligible = AppliedStudentFile::where('file_status', 13)->get();
        $paidForAnother = AppliedStudentFile::where('file_status', 14)->get();
        $visaDisApproved = AppliedStudentFile::where('file_status', 11)->get();
        $rejectedApplications = AppliedStudentFile::where('file_status', 12)->get();
        $processedApplications = AppliedStudentFile::where('file_status', '>', 9)->get();
        $casIssued = AppliedStudentFile::where('file_status', 9)->get();

        // Account Manager
        
            $pendingShortlistStudent = $this->getShortlistingStudents($getShortAppliedStudentFiles);
            $todayTotalShortlistStudent = $this->getTodayShortlistingStudents($getShortTDAppliedStudentFiles);
            $todayTotalShortlisted = $this->getTodayShortlisted($getShortTDAppliedStudentFiles);
            $newApplications = $this->getNewApplicationsLockedFiles($getNewApplications);
            $applicationsSentToUni = $this->getNewApplicationsLockedFiles($getApplicationsSenttoUni);

        return view('multiauth::admin.agentsession.home', compact('students','todaySentToUni','applicationsUnconditioOfferUpload', 'casIssued', 'applicationsconditioOfferUpload', 'isPreprocess','pendingShortlistStudent','todayTotalShortlistStudent','totalStudentForShortlist','isProcess','isShortListing', 'totalApplications', 'processedApplications', 'visaApproved', 'newApplications','applicationsSentToUni','provideCAS','notEligible','ttpaid','paidForAnother','visaDisApproved', 'rejectedApplications', 'fileds', 'studentFiles', 'notSubmittedFiles', 'submittedFiles', 'todayApplied', 'agent', 'activeFiles', 'agentApplications','todayTotalShortlisted','studentshort','pendstudentshort','appliedStudentFiles','city','notifications'));
    }
   
    public function getNewApplicationsLockedFiles($getNewApplications)
    {
        $NewApplications = [];
        foreach($getNewApplications as $key => $value) {
            if ($value->student['lock_status'] == 1) {
                $NewApplications[] = $value;
            }
        }
        
        return $NewApplications;
    }
    public function getShortlistingStudents($getShortAppliedStudentFiles)
    {
        


        $appliedStudentFiles = [];

        foreach($getShortAppliedStudentFiles as $key => $value) {
            if($value->appliedStudentFiles->count() == 0){
            $appliedStudentFiles[] = $value;
            }
        }
        
        return $appliedStudentFiles;
    }
    public function getTodayShortlistingStudents($getShortTDAppliedStudentFiles)
    {
        


        $appliedStudentFiles = [];

        foreach($getShortTDAppliedStudentFiles as $key => $value) {
            if($value['IsShortlisting'] == 'yes'){
            $appliedStudentFiles[] = $value;
            }
        }
        
        return $appliedStudentFiles;
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

    public function show()
    {
        $admins = Admin::where('id', '!=', auth()->id())
            ->get();
        return view('multiauth::admin.show', compact('admins'));
    }

    public function showChangePasswordForm()
    {
        return view('multiauth::admin.passwords.change');
    }

    public function changePassword(Request $request)
    {
        $data = $request->validate(['oldPassword' => 'required', 'password' => 'required|confirmed', ]);
        auth()
            ->user()
            ->update(['password' => bcrypt($data['password']) ]);

        return redirect(route('admin.home'))->with('message', 'Your password is changed successfully');
    }

}

