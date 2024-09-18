<?php

namespace App\Http\Controllers;
use App\Models\University;
use App\Models\Agent\AppliedStudentFile;
use App\Models\ApplicationStatus;
use App\Models\Intake;
use Illuminate\Http\Request;
use App\Models\Agent\Student;
use App\Agent;
use App\Models\Loc\Country;
use App\Models\College;
use App\Models\Commission;
use Bitfumes\Multiauth\Model\Admin;
use Auth;
use DB;
use Input;
use Carbon;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function totalConversions()
    {
        $user =Auth::guard('agent')->user();
       
        $students = Student::with(['studentImage','appliedStudentFiles','country','pendeciesStudentFiles','countryAddress','grade10'=>function($g){
            $g->with(['totals'])->get();
        },'grade12'=>function($g){
            $g->with(['totals'])->get();
        }])->where('agent_id',$user['id'])->orderBy('id','desc')->get();
        return view('agent.reports.totalConversions',compact('students'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function commission()
    {
        $user =Auth::guard('agent')->user();
       
        $students = Student::with(['studentImage','appliedStudentFiles','country','pendeciesStudentFiles','countryAddress','grade10'=>function($g){
            $g->with(['totals'])->get();
        },'grade12'=>function($g){
            $g->with(['totals'])->get();
        }])->where('agent_id',$user['id'])->orderBy('id','desc')->get();
        return view('agent.reports.commission',compact('students'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function universityReport(Request $request)
    {
        $user =Auth::guard('agent')->user();
        $universities = AppliedStudentFile::with(['college'=>function($q){
            $q->with('university')->get();
        }])->where('agent_id',(int)$user['id'])->groupBy('college_id')->select('college_id', DB::raw('count(*) as total'))->get();
        if ($request->isMethod('post')) {
            $fromDate = new Carbon\Carbon($request->fromDate);
            $toDate = new Carbon\Carbon($request->toDate);
            $applications = AppliedStudentFile::with(['college'=>function($q){
                $q->with('university')->get();
            }])->where('agent_id',(int)$user['id'])->groupBy('college_id')->select('college_id', DB::raw('count(*) as total'))->whereRaw('DATE(applied_at) >= ?', [$fromDate->format('Y-m-d')])->whereRaw('DATE(applied_at) <= ?', [$toDate->format('Y-m-d')])->get();
            // dd($applications);
            $universities = $applications;
            // foreach($applications as $application){
                // if($application['created_at'] >= $request['fromDate'] || $application['created_at'] <= $request['toDate'] ){
                //     $universities[] = $application;
                // }
            // }
        }
         
        return view('agent.reports.universityReport',compact('universities'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function locationReport(Request $request)
    {
        $user =Auth::guard('agent')->user();
        $countries = Country::all();
        $locations = AppliedStudentFile::with(['college'])->where('agent_id',(int)$user['id'])->groupBy('country_id')->select('country_id', DB::raw('count(*) as total'))->get();
        if ($request->isMethod('post')) {
            $fromDate = new Carbon\Carbon($request->fromDate);
            $toDate = new Carbon\Carbon($request->toDate);
            $applications = AppliedStudentFile::with(['college'])->where('country_id',$request->location)->where('agent_id',(int)$user['id'])->groupBy('country_id')->select('country_id', DB::raw('count(*) as total'))->whereRaw('DATE(applied_at) >= ?', [$fromDate->format('Y-m-d')])->whereRaw('DATE(applied_at) <= ?', [$toDate->format('Y-m-d')])->get();
            $locations = $applications;
            
        }
        return view('agent.reports.location',compact('locations','countries'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function adminTotalReport(Request $request)
    {
       $reqData = $request->all();
       $requestData = '';
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 2500);
        $countries = Country::where('applyFor',1)->get();
        $intakes = Intake::all();
        $Universities = University::all();
        $Admins = Admin::all();
        $agents = Agent::all();
        $adminId = [];
            foreach ($Admins as $key => $admin) {
                if($admin->roles[0]['id'] == 5){
                $adminId[] = $admin['id'];
                }
            }
        $accountManagersList = Admin::whereIn('id',$adminId)->pluck('id','name');
        $students = Student::where('lock_status',2)->orderBy('id','DESC')->paginate(0);
        $totalStudents = 0;
         $searchData =  \Session::get('searchData');
        if($request->isMethod('post') || $request->page) {
            $page = $request->page;
                if($searchData){
                    if(array_key_exists('page',$request->all())){
                        $request->request->add($searchData);
                    }
                    $request->request->add(['page'=>$page]);
                }
            $requestData = $request->all();
            $requestData['page'] = '0';
            \Session::put('searchData',$requestData);
         // dd($request->all());
            $getAllStudents = Student::where('lock_status',1)->where('shortlisting','0');
            $totalStudents = $getAllStudents;
            $totalStudents = $totalStudents->count();
            if($request->country) {
                $getAllStudents = $getAllStudents->where('applingForCountry',$request->country);
            }
            if($request->fromDate) {
                if($request->toDate) {
                    $fromDate = new Carbon\Carbon($request->fromDate);
                    $toDate = new Carbon\Carbon($request->toDate);
                     $getAllStudentsAll = $getAllStudents;
                     $hasStdId = [];
                    foreach ($getAllStudentsAll->get() as $stdVal) {
                        if($stdVal['applied_at']){
                            $time = strtotime($stdVal['applied_at']);
                            $newformat = date('d-m-Y',$time);
                            if($newformat >= $fromDate->format('d-m-Y')){
                                if($newformat <= $toDate->format('d-m-Y')){
                                    $hasStdId[] = (int)$stdVal['id'];
                                }
                            }
                        }
                    }
                    $getAllStudents = $getAllStudents->whereIn('id',$hasStdId);
                }
            }
            if($request->intake) {
                $intakeApplications = AppliedStudentFile::where('lock_status',1)->where('intake_id',$request->intake)->get();
                $intakeApplicationsArray = [];
                $mergeStdId = [];
                foreach ($intakeApplications as $inStdItem) {
                    if(!in_array($inStdItem['student_id'], $mergeStdId)){
                        $mergeStdId[] = (int)$inStdItem['student_id'];
                        $intakeApplicationsArray[] = (int)$inStdItem['student_id'];
                    }   
                }
                $getAllStudents = $getAllStudents->whereIn('id',$intakeApplicationsArray);
            }
            if($request->year) {
                $yearApplications = AppliedStudentFile::where('lock_status',1)->where('application_year',$request->year)->get();
                $yearApplicationsArray = [];
                $mergeStdIdyear = [];
                foreach ($yearApplications as $yearStdItem) {
                    if(!in_array($yearStdItem['student_id'], $mergeStdIdyear)){
                        $mergeStdIdyear[] = (int)$yearStdItem['student_id'];
                        $yearApplicationsArray[] = (int)$yearStdItem['student_id'];
                    }   
                }
                 $getAllStudents = $getAllStudents->whereIn('id',$yearApplicationsArray);
            }
            if($request->account_manager) {
                $agents = Agent::where('account_manager',$request->account_manager)->pluck('id');
                $getAllStudents = $getAllStudents->whereIn('agent_id',$agents->toArray());
            }
            if($request->agent){
                $agents = Agent::where('id', $request->agent)->pluck('id');
                $getAllStudents = $getAllStudents->where('agent_id',$agents->toArray());
                   
            }
            $students = $getAllStudents->where('lock_status',1)->orderBy('id','DESC')->paginate(20);
    }
    return view('agent.reports.total',compact('students','countries','intakes','Universities','totalStudents','accountManagersList','agents'))->with('data',$requestData);
    }

    public function TotalReport(Request $request)
    {
        $agentUser = Auth::guard('agent')->user();
        $admin = Auth::guard('admin')->user();
        $countries = Country::where('applyFor',1)->get();
        $intakes = Intake::all();
        $Universities = University::all();
        if($admin){

        $allApplications = AppliedStudentFile::with(['college'])->get();
        }else{
        $allApplications = AppliedStudentFile::with(['college'])->where('agent_id',(int)$agentUser['id'])->get();

        }
        $applications = [];
        foreach($allApplications as $application){
            $applications[] = $application;
        }
        $applicationStatus = ApplicationStatus::all();
        $total = '';
        $name = 'All Applicatons';
        if ($request->isMethod('post')) {
        
            if($admin){
            $allApplications = AppliedStudentFile::with(['college','course'])->get();

            }else{
            $allApplications = AppliedStudentFile::with(['college','course'])->where('agent_id',(int)$agentUser['id'])->get();

            }

            if ($request->fromDate) {
                $fromDate = new Carbon\Carbon($request->fromDate);
                $toDate = new Carbon\Carbon($request->toDate);
                if($admin){
                $allApplications = AppliedStudentFile::with(['college'])->whereRaw('DATE(applied_at) >= ?', [$fromDate->format('Y-m-d')])->whereRaw('DATE(applied_at) <= ?', [$toDate->format('Y-m-d')])->get();
                }else{

                 $allApplications = AppliedStudentFile::with(['college'])->where('agent_id',(int)$agentUser['id'])->whereRaw('DATE(applied_at) >= ?', [$fromDate->format('Y-m-d')])->whereRaw('DATE(applied_at) <= ?', [$toDate->format('Y-m-d')])->get();   

                }

                $applications = [];
                foreach($allApplications as $application){
                        $applications[] = $application;
                }
                $name ='Applied At';

            }
            if ($request->intake) {
                $Sintakes = Intake::where('id',$request->intake)->first();
                $applications = [];
                foreach($allApplications as $application){
                    if ($request->intake == $application->course['intake']) {
                        $applications[] = $application;
                    }
                }
                $name = $Sintakes['name'];
                
            }
            if ($request->country) {
                $country = Country::where('id',$request->country)->first();
                $applications = [];
                
                foreach($allApplications as $application){
                    if ($request->country == $application['country_id']) {
                        if ($request->intake) {
                            if ($request->intake == $application->course['intake']) {
                                
                                $applications[] = $application;
                            }
                        }else{
                            $applications[] = $application;
                        }
                    }
                }
                $name = $country['name'];
            }
            if($request->agent) {
                dd('aa');
            }
            if ($request->university) {
                $university = University::where('id',$request->university)->first();
                $applications = [];
                foreach($allApplications as $application){
                    if ($application->college) {
                        if ($request->university == $application->college['university_id']) {
                            $applications[] = $application;
                        }
                    }
                }
                $name = $university['name'];
            }
            if ($request->status) {
                $allApplicationStatus = ApplicationStatus::where('id',$request->status)->first();
                $applications = [];
                foreach($allApplications as $application){
                    if ($request->status == $application['file_status']) {
                        $applications[] = $application;
                    }
                }
                $name = $allApplicationStatus['name'];
            }
            if ($request->report == 'Total Applications') {
                if($admin){
                $applications = AppliedStudentFile::with(['college'])->get();

                }else{
                $applications = AppliedStudentFile::with(['college'])->where('agent_id',(int)$agentUser['id'])->get();

                }
            }else if($request->report == 'Total Offers'){
                if($admin){
                    $applications = AppliedStudentFile::with(['college'])->where('file_status',3)->Orwhere('file_status',4)->get();
                }else{

                $applications = AppliedStudentFile::with(['college'])->where('agent_id',(int)$agentUser['id'])->where('file_status',3)->Orwhere('file_status',4)->get();
                }
            }
        }
        $students = [];
        foreach($applications as $application){
                if(!in_array($application['student_id'],$students)){
                    $students[] = $application['student_id'];
                }

        }
        $offers = [];
        foreach($applications as $application){
                if($application['file_status'] == 3 || $application['file_status'] == 4){
                    $offers[] = $application['file_status'];
                    // if(!in_array($application['student_id'],$offers)){
                    // }
                }

        }
        $total = sizeof($applications);
        $students  = sizeof($students);
        $offers = sizeof($offers);

        return view('agent.reports.total',compact('students','offers','name','total','applications','countries','intakes','Universities','applicationStatus'))->with('data',$request->all());
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
    public function comissionStructure($id)
    {   $id = base64_decode($id);
        dd($id);
        $commission = Commission::where('country_id',$id)->first();
        return view('agent.comission.structure',compact('commission'));
    }
    public function allUkUniversities()
    {
        $requirements = Commission::where('id',2)->first();
        
        return view('agent.reports.universityStructure',compact('requirements'));
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
