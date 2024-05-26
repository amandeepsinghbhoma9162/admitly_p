<?php

namespace App\Http\Controllers\Agent;
use App\Models\Agent\AppliedStudentFile;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\Agent\Student;
use App\Models\University;
use App\Models\PendancyAttachment;
use App\Models\Announcement;
use Khill\Lavacharts\Lavacharts;
use App\Models\Course;
use App\Models\Notification;
use App\Models\Loc\Country;
use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Helpers\Notify;
use App\Models\Attachment;
use Auth;
use DB;
use App;
use Carbon;
use App\Agent;
use Session;

class HomeController extends Controller
{

    protected $redirectTo = '/agent/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('agent.auth:agent');
    }
 public function StudentDropSession()
    {
// dd('hello');
        Session::forget('document');
        Session::forget('studentID');
        Session::forget('hasFinanceDocument');
        Session::forget('openNext');
        Session::forget('student');
        return redirect()->route('student.create');
    }
    public function QuickShortDropSession()
    {
// dd('hello');
        Session::forget('document');
        Session::forget('studentID');
        Session::forget('hasFinanceDocument');
        Session::forget('openNext');
        Session::forget('student');
        return redirect()->route('quick.shortlisting.create');
    }
    public function ping($id)
    {
        if(Auth::guard('agent')->user()->id == base64_decode($id)){
            $agent = Agent::with('accountManager')->where('id',Auth::guard('agent')->user()->id)->first();
            $number = ['91'.$agent->accountManager['mobile']];
            $texts = '*'.ucfirst($agent->accountManager['name']).' |* - Please check agent *'.ucfirst(Auth::guard('agent')->user()->name).' |* ( *'.ucfirst(Auth::guard('agent')->user()->company_name).' )* want to contact you. Please call him  asap. +'.Auth::guard('agent')->user()->mobileno;
            $messages = Notify::whatsappnotif($number,$texts);
            return ['status'=>'true'];
        }
            return ['status'=>'false'];
    }
    /**
     * Show the Agent dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index($switchCountryId = 230) {
        
        if($switchCountryId != 230){
            $switchCountryId = base64_decode($switchCountryId);
        }

        $allowCountry = Country::where('applyFor','1')->get();
        $switchCountry = Country::where('id',$switchCountryId)->first();
        $user =Auth::guard('agent')->user();
        $agent =Agent::with('accountManager')->where('id',$user['id'])->first();
        
       
        
        $applications = AppliedStudentFile::where('agent_id',$user['id'])->where('country_id',$switchCountryId)->get();

        $students = Student::where('agent_id',(string)$user['id'])->where('applingForCountry',$switchCountryId)->get();

        $studentPend = [];
        foreach($students as $student){
            $studentPend[] = $student['id'];
        }
        $pendancy = PendancyAttachment::with(['student','qualification'])->whereIn('student_id',$studentPend)->where('status',0)->get();

        $fileds = AppliedStudentFile::with(['college'=>function($uni){
                $uni->with(['attachment'])->get();
        },'country','applicationStatus','agent'])->where('country_id',$switchCountryId)->where('agent_id',$user['id'])->select('college_id', DB::raw('count(*) as total'))
        ->groupBy('college_id')->orderBy('total', 'desc')->get()->take(7);
                
            $announcements = Announcement::where('status','0')->get();
            $conversion = AppliedStudentFile::where('agent_id',$user['id'])->where('country_id',$switchCountryId)->where('file_status',3)->get();
            $activeApplication = AppliedStudentFile::where('agent_id',$user['id'])->where('country_id',$switchCountryId)->where('file_status','>',1)->where('file_status','<',10)->get();
            $totalApplication = AppliedStudentFile::where('agent_id',$user['id'])->where('country_id',$switchCountryId)->get();
            $notifications = Notification::where('agent_id',$user['id'])->get()->take(6);

            $students = Student::where('agent_id',$user['id'])->where('applingForCountry',$switchCountryId)->get();
            $studentsIdArray = Student::where('lock_status',1)->where('agent_id',$user['id'])->where('applingForCountry',$switchCountryId)->pluck('id');

             $today = Carbon\Carbon::now()->format('d-m-Y');

        //submission or not applis        
                $sallfiles = AppliedStudentFile::with(['student'=>function($img){
                    $img->with(['studentImage'])->get();
                },'course'=>function($q){
                    $q->with(['college'=>function($uni){
                        $uni->with(['university'])->get();
                    }])->first();
                },'country','applicationStatus','agent'])->where('agent_id',$user['id'])->get();
                $submittedFiles = [];
                $notSubmittedFiles = [];
                $todayApplied = [];
                foreach($sallfiles as $file ){
                    if($file->student){
                    if($file->student['lock_status'] == 1){
                        
                            if($file['file_status'] >= 1){
                                if($file['country_id'] == $switchCountryId){
                                    $submittedFiles[] = $file->student['id'];
                                }
                            }
                        
                    }else{
                        
                        if(!in_array($file['student_id'], $notSubmittedFiles)){
                            $notSubmittedFiles[] = $file->student['id'];
                        }
                    }

                     if($file->student['lock_status'] == 1){
                         if($file['country_id'] == $switchCountryId){
                            if($file->student['applied_at'] == $today){
                                if(!in_array($file['student_id'], $todayApplied)){
                                    $todayApplied[] = $file['student_id'];
                                    
                                }
                            }
                        }
                    }
                    }


                }
                $files = $students->take(10);         
                $activeFiles = AppliedStudentFile::where('file_status','>',1)->where('file_status','<',10)->where('agent_id',$user['id'])->get();
                $ttpaid = AppliedStudentFile::where('file_status',5)->where('agent_id',$user['id'])->get();
                 
                 $applicationsUnconditioOfferUpload = AppliedStudentFile::where('file_status',4)->where('agent_id',$user['id'])->get();
                 $applicationsconditioOfferUpload = AppliedStudentFile::where('file_status',3)->where('agent_id',$user['id'])->get();
                 
                 $visaDisApproved = AppliedStudentFile::where('file_status',11)->where('agent_id',$user['id'])->get();
                  $visaApproved = AppliedStudentFile::where('file_status',10)->where('agent_id',$user['id'])->get();
                  $rejectedApplications = AppliedStudentFile::where('file_status',12)->where('agent_id',$user['id'])->get();

                  //canada 
                  if($switchCountry['id'] == '38'){
                    $applicationsUnconditioOfferUpload = AppliedStudentFile::where('file_status',17)->where('agent_id',$user['id'])->get();
                    $ttpaid = AppliedStudentFile::where('file_status',18)->where('agent_id',$user['id'])->get();
                 $applicationsconditioOfferUpload = AppliedStudentFile::where('file_status',19)->where('agent_id',$user['id'])->get(); 
                  $visaApproved = AppliedStudentFile::where('file_status',20)->where('agent_id',$user['id'])->get();
                  $rejectedApplications = AppliedStudentFile::where('file_status',22)->where('agent_id',$user['id'])->get();
                  $conversion = AppliedStudentFile::where('agent_id',$user['id'])->where('country_id',$switchCountryId)->where('file_status',17)->get();

                  $activeApplication = AppliedStudentFile::where('agent_id',$user['id'])->where('country_id',$switchCountryId)->where('file_status','>',15)->where('file_status','<',20)->get();

                  }
            $notSubmittedFiles = Student::where('lock_status',0)->where('agent_id',$user['id'])->get();

          $months = ['January'=>0,'February'=>0,'March'=>0,'April'=>0,'May'=>0,'June'=>0,'July'=>0,'August'=>0,'September'=>0,'October'=>0,'November'=>0,'December'=>0];
            $lineGraph = $months;

            $data = Student::select(
                DB::raw("(COUNT(*)) as count"), 
                DB::raw("MONTHNAME(created_at) as month_name"))->whereYear('created_at', date('Y'))->where('lock_status', 1)->where('applingForCountry',$switchCountryId)->where('agent_id',$user['id'])->groupBy('month_name')->pluck('count','month_name')->toArray();
            $lineGraph = $this->getValuesofMonths($data,$months);

            $dataShortList = Student::select(
                DB::raw("(COUNT(*)) as count"), 
                DB::raw("MONTHNAME(created_at) as month_name"))->whereYear('created_at', date('Y'))->where('IsShortlisting','yes')->where('applingForCountry',$switchCountryId)->where('agent_id',$user['id'])->groupBy('month_name')->pluck('count','month_name')->toArray();


            // shortlisting graph data
            $lineGraphShortlist = $this->getValuesofMonths($dataShortList,$months);

    // $chart1->options['chart_title']
        return view('agent.home',compact('students','lineGraph','lineGraphShortlist','visaDisApproved','visaApproved','rejectedApplications','notSubmittedFiles','submittedFiles','todayApplied','ttpaid','activeFiles','applicationsUnconditioOfferUpload','applicationsconditioOfferUpload','notifications','totalApplication','activeApplication','conversion','announcements','fileds','files','pendancy','agent','switchCountry','allowCountry'));
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
    public function getAgentGraph() {

            $topUniversity = University::select('id as y','name as label')->orderBy('id','DESC')->get()->take(5);
            // $topUniversityArray = [];
           
            // foreach ($topUniversity as $key => $value) {
            //     $aryKey = $key+1;
            //     $topUniversityArray[$aryKey]['x'] = $value['name'];
            //     $topUniversityArray[$aryKey]['y'] = 10;
            // }
           
            return $topUniversity;
    }
    public function profile() {
        $agent =Auth::guard('agent')->user();
           
            return  view('agent.profile.profile',compact('agent'));
    }

    
    public function whitelabel() {
        $agent =Auth::guard('agent')->user();
        $attachment = Attachment::where('attachment_id', $agent['id'])->where('type', 'agentdomainlogo')->first();
           // dd($attachments);
            return  view('agent.whitelabel.whitelabel',compact('agent', 'attachment'));
    }

    public function createPdf($id)
    {
        
        $id = base64_decode($id);
        $pdf = App::make('dompdf.wrapper');
        $agent = Agent::where('id',$id)->first();
        
        $pdf->loadHTML('<h1 style="text-align:center;background:#e77817;color:white;">Admitly Contract</h1>
            <h4 ><strong>Name: </strong><span style="text-transform:uppercase;">'.$agent['name'].'</span></h4>
            <h5><strong>Email: </strong>'.$agent['email'].'</h5>
            <h5><strong>Phone: </strong>'.$agent['mobileno'].'</h5>
            <h5><strong>Country: </strong>'.$agent->country['name'].'</h5>
            <h5><strong>State: </strong>'.$agent->state['name'].'</h5>
            <h5><strong>City: </strong>'.$agent->city['name'].'</h5>
            <h5><strong>Address: </strong>'.$agent['address'].'</h5>
            <h5><strong>IP Address: </strong>'.$agent['ip_address'].'</h5>
            <h5><strong>Created at: </strong>'.$agent['created_at']->format('d/m/Y').'</h5>

            ');
        return $pdf->stream();
    }

    public function mediaGallery($id){
        
        $id = base64_decode($id);
        $images = Media::where('type','1')->where('country_id',$id)->orderByDesc('created_at')->get();
        $portfoliaos = Media::where('type','2')->where('country_id',$id)->get();
        return view('agent.media.gallery',compact('images','portfoliaos'));
    }



   
}