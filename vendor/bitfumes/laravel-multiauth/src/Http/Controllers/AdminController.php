<?php
namespace Bitfumes\Multiauth\Http\Controllers;

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

    public function index()
    {
        
        $admin = Auth::guard('admin')->user();
        $role = Role::where('id', $admin['id'])->first();
  
        if ($admin->roles[0]['name'] == 'account manager')
        {
            $ACAgents = Agent::where('status', 1)->where('account_manager', $admin['id'])->pluck('id');
            $studentFiles = AppliedStudentFile::whereIn('agent_id',$ACAgents)->get();
            $students = Student::where('lock_status', 1)->whereIn('agent_id',$ACAgents)->get();

            $ACAgents = Agent::where('status', 1)->where('account_manager', $admin['id'])->pluck('id');
             
       
          
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
            , 'country', 'applicationStatus', 'agent'])->whereIn('agent_id',$ACAgents)
                ->get();   


        }else{

            $studentFiles = AppliedStudentFile::all();
            $students = Student::where('lock_status', 1)->get();

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
                    ->get();        
        }
        
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
            ->get();

              
         $todayApplied =  Student::where('lock_status',1)->where('applied_at',$today)->get();
         $todaySentToUni =  ApplicationStatusTimeline::where('status_id',2)->whereDate('status_date',Carbon\Carbon::now())->get();
            
        $agents = Agent::get();
        $newRegAgents = Agent::whereDate('created_at',Carbon\Carbon::today())->get();
        $activeAgents = Agent::where('status', 1)->get();
        $deActiveAgents = Agent::where('status', 0)->get();
        $activeAgentsLogs = Agent::where('status', 1)->whereDate('last_login','>=',Carbon\Carbon::now()->subDays(7))->get();
        $InactiveAgentsLogs = Agent::whereDate('last_login','<',Carbon\Carbon::now()->subDays(7))->get();
        $InactiveAgentsNull = Agent::where('last_login',NULL)->get();
        
        $universities = University::with(['country'])->get();

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
            ->get();

       
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
            $getShortAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('applingForCountry',$admin['country'])->where('student_status',NULL)->where('shortlisting','1')->get();
        $getShortTDAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('IsShortlisting','yes')->where('applingForCountry',$admin['country'])->where('apply_for_shortlist_at', $today)->get();

        $totalStudentForShortlist = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('applingForCountry',$admin['country'])->where('IsShortlisting','yes')->get();
        }else{

            $isShortListing = 'no';
            $getShortAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('student_status',NULL)->where('shortlisting','1')->get();
        $getShortTDAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('IsShortlisting','yes')->where('apply_for_shortlist_at', $today)->get();
        $totalStudentForShortlist = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->where('IsShortlisting','yes')->get();
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
        
        if ($admin->roles[0]['name'] == 'account manager')
        {
            
            $ACAgents = Agent::where('status', 1)->where('account_manager', $admin['id'])->pluck('id');
            $agents = Agent::whereIn('id', $ACAgents)->get();
            $activeAgents = Agent::where('status', 1)->whereIn('id', $ACAgents)->get();
            $deActiveAgents = Agent::where('status', 0)->whereIn('id', $ACAgents)->get();
            $activeAgentsLogs = Agent::where('status', 1)->whereDate('last_login','>',Carbon\Carbon::now()->subDays(7))->whereIn('id', $ACAgents)->get();
            $InactiveAgentsLogs = Agent::whereDate('last_login','<',Carbon\Carbon::now()->subDays(7))->whereIn('id',$ACAgents)->get();
            $InactiveAgentsNull = Agent::where('last_login',NULL)->get();
    
            $totalApplications = AppliedStudentFile::whereIn('agent_id', $ACAgents)->get();
            $getNewApplications = AppliedStudentFile::where('file_status', 1)->whereIn('agent_id', $ACAgents)->get();

            $getApplicationsSenttoUni = AppliedStudentFile::where('file_status', 2)->whereIn('agent_id', $ACAgents)->get();

            $totalAllApplicationsArray = AppliedStudentFile::whereIn('agent_id', $ACAgents)->pluck('id');
            $getShortAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->whereIn('agent_id', $ACAgents)->where('student_status',NULL)->where('shortlisting','1')->get();
            $getShortTDAppliedStudentFiles = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->whereIn('agent_id', $ACAgents)->where('IsShortlisting','yes')->where('apply_for_shortlist_at', $today)->get();
            $totalStudentForShortlist = Student::with(['appliedStudentFiles','country','agent','appliedStudentFilesByAdmin'])->whereIn('agent_id', $ACAgents)->where('IsShortlisting','yes')->get();
        }
            
            $pendingShortlistStudent = $this->getShortlistingStudents($getShortAppliedStudentFiles);
            $todayTotalShortlistStudent = $this->getTodayShortlistingStudents($getShortTDAppliedStudentFiles);
            $todayTotalShortlisted = $this->getTodayShortlisted($getShortTDAppliedStudentFiles);
            $newApplications = $this->getNewApplicationsLockedFiles($getNewApplications);
            $applicationsSentToUni = $this->getNewApplicationsLockedFiles($getApplicationsSenttoUni);

            $months = ['January'=>0,'February'=>0,'March'=>0,'April'=>0,'May'=>0,'June'=>0,'July'=>0,'August'=>0,'September'=>0,'October'=>0,'November'=>0,'December'=>0];
            $lineGraph['Cad'] = $months;
            $lineGraph['Aus'] = $months;
            $lineGraph['Uk'] = $months;

            $data['Cad'] = Student::select(
                DB::raw("(COUNT(*)) as count"), 
                DB::raw("MONTHNAME(created_at) as month_name"))->whereYear('created_at', date('Y'))->where('lock_status', 1)->where('applingForCountry',38)->groupBy('month_name')->pluck('count','month_name')->toArray();

            $data['Uk'] = Student::select(
                DB::raw("(COUNT(*)) as count"), 
                DB::raw("MONTHNAME(created_at) as month_name"))->whereYear('created_at', date('Y'))->where('lock_status', 1)->where('applingForCountry',230)->groupBy('month_name')->pluck('count','month_name')->toArray();
            $data['Aus'] = Student::select(
                DB::raw("(COUNT(*)) as count"), 
                DB::raw("MONTHNAME(created_at) as month_name"))->whereYear('created_at', date('Y'))->where('lock_status', 1)->where('applingForCountry',13)->groupBy('month_name')->pluck('count','month_name')->toArray();
            $lineGraph['Cad'] = $this->getValuesofMonths($data['Cad'],$months);
            $lineGraph['Aus'] = $this->getValuesofMonths($data['Aus'],$months);
            $lineGraph['Uk'] = $this->getValuesofMonths($data['Uk'],$months);

            $dataShortList['Cad'] = Student::select(
                DB::raw("(COUNT(*)) as count"), 
                DB::raw("MONTHNAME(created_at) as month_name"))->whereYear('created_at', date('Y'))->where('IsShortlisting','yes')->where('applingForCountry',38)->groupBy('month_name')->pluck('count','month_name')->toArray();

            $dataShortList['Uk'] = Student::select(
                DB::raw("(COUNT(*)) as count"), 
                DB::raw("MONTHNAME(created_at) as month_name"))->whereYear('created_at', date('Y'))->where('IsShortlisting','yes')->where('applingForCountry',230)->groupBy('month_name')->pluck('count','month_name')->toArray();
            $dataShortList['Aus'] = Student::select(
                DB::raw("(COUNT(*)) as count"), 
                DB::raw("MONTHNAME(created_at) as month_name"))->whereYear('created_at', date('Y'))->where('IsShortlisting','yes')->where('applingForCountry',13)->groupBy('month_name')->pluck('count','month_name')->toArray();

            // shortlisting graph data
            $lineGraphShortlist['Cad'] = $this->getValuesofMonths($dataShortList['Cad'],$months);
            $lineGraphShortlist['Aus'] = $this->getValuesofMonths($dataShortList['Aus'],$months);
            $lineGraphShortlist['Uk'] = $this->getValuesofMonths($dataShortList['Uk'],$months);
        if ($admin['email'] == 'tech@admitly.com')
        {
            return view('multiauth::admin.home1', compact('students','lineGraph','lineGraphShortlist','todaySentToUni','newRegAgents','activeAgentsLogs','InactiveAgentsLogs','InactiveAgentsNull' ,'applicationsUnconditioOfferUpload', 'casIssued', 'applicationsconditioOfferUpload', 'isPreprocess','pendingShortlistStudent','todayTotalShortlistStudent','totalStudentForShortlist','isProcess','isShortListing', 'totalApplications', 'processedApplications', 'visaApproved', 'newApplications','applicationsSentToUni','provideCAS','notEligible','ttpaid','paidForAnother','visaDisApproved', 'rejectedApplications', 'fileds', 'studentFiles', 'notSubmittedFiles', 'submittedFiles', 'todayApplied', 'agents', 'deActiveAgents', 'activeAgents', 'activeFiles', 'universities', 'agentApplications','todayTotalShortlisted'));
        }
        return view('multiauth::admin.home', compact('students','lineGraph','lineGraphShortlist','todaySentToUni','newRegAgents','activeAgentsLogs','InactiveAgentsLogs','InactiveAgentsNull' ,'applicationsUnconditioOfferUpload', 'casIssued', 'applicationsconditioOfferUpload', 'isPreprocess','pendingShortlistStudent','todayTotalShortlistStudent','totalStudentForShortlist','isProcess','isShortListing', 'totalApplications', 'processedApplications', 'visaApproved', 'newApplications','applicationsSentToUni','provideCAS','notEligible','ttpaid','paidForAnother','visaDisApproved', 'rejectedApplications', 'fileds', 'studentFiles', 'notSubmittedFiles', 'submittedFiles', 'todayApplied', 'agents', 'deActiveAgents', 'activeAgents', 'activeFiles', 'universities', 'agentApplications','todayTotalShortlisted'));
    }
    
    public function getValuesofMonths($data,$months)
    {
        $countryArray = [];
        foreach($months as $key => $value) {
            if (array_key_exists($key, $data)) {
                $countryArray[] = $data[$key];
            }else{
                $countryArray[] = $value;
            }
        }
        
        return $countryArray;
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

