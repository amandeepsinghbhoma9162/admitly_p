<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TeamReport;
use App\Models\Agent\Student;
use App\Agent;
use Carbon;
use Session;

class TeamReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $todayDate =  Carbon\Carbon::now()->format('d-m-Y');
        $todayData = '';
        $accountManagers = '';
        $preprocessors = '';
        $processors = '';
        $shortlistings = '';
        $totalDataReports = '';

        if($user->roles[0]['id'] == 1){

            $teamReports = TeamReport::orderBy('id','DESC')->get();
            $accountManagers = TeamReport::where('type','account manager')->orderBy('id','DESC')->get();
            $preprocessors = TeamReport::where('type','preprocess')->orderBy('id','DESC')->get();
            $processors = TeamReport::where('type','process')->orderBy('id','DESC')->get();
            $shortlistings = TeamReport::where('type','shortlisting')->orderBy('id','DESC')->get();
            $totalDataReports = TeamReport::with('teamreportId')->selectRaw("SUM(calls) as total_calls,date")->selectRaw("SUM(received_applications) as total_received_applications,date")->selectRaw("SUM(emails) as total_emails,date")->selectRaw("SUM(canada_applications) as total_canada_applications,date")->selectRaw("SUM(uk_applications) as total_uk_applications,date")->selectRaw("SUM(aus_applications) as total_aus_applications,date")->selectRaw("SUM(canada_payments) as total_canada_payments,date")->selectRaw("SUM(uk_payments) as total_uk_payments,date")->selectRaw("SUM(aus_payments) as total_aus_payments,date")->selectRaw("SUM(canada_offers) as total_canada_offers,date")->selectRaw("SUM(uk_offers) as total_uk_offers,date")->selectRaw("SUM(aus_offers) as total_aus_offers,date")->selectRaw("SUM(pending_applications) as total_pending_applications,date")->groupBy('date')->get();
    
        }else{
            $teamReports = TeamReport::where('admin_id',$user['id'])->orderBy('id','DESC')->get();
            $todayData = TeamReport::where('admin_id',$user['id'])->where('date',$todayDate)->first();

        
        }

        return view('admin.teamReport.index',compact('teamReports','totalDataReports','todayData','accountManagers','processors','preprocessors','shortlistings'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $todayDate =  Carbon\Carbon::now()->format('d-m-Y');
        $todayData = TeamReport::where('admin_id',$user['id'])->where('date',$todayDate)->first();
        if($user){
            if($todayData){
                
                TeamReport::where('admin_id',$user['id'])->where('date',$todayDate)->update([
                                                "calls" => $request->calls,
                                                "emails" => $request->emails,
                                                "canada_applications" => $request->canada_applications,
                                                "uk_applications" => $request->uk_applications,
                                                "aus_applications" => $request->aus_applications,
                                                "germany_applications" => $request->germany_applications,
                                                "canada_payments" => $request->canada_payments,
                                                "uk_payments" => $request->uk_payments,
                                                "aus_payments" => $request->aus_payments,
                                                "germany_payments" => $request->germany_payments,
                                                "canada_offers" => $request->canada_offers,
                                                "uk_offers" => $request->uk_offers,
                                                "aus_offers" => $request->aus_offers,
                                                "germany_offers" => $request->germany_offers,
                                                "pending_applications" => $request->pending_applications,
                                                "received_applications" => $request->received_applications,
                                                "remarks" => $request->remarks,

                                                            ]);
                Session::flash('success','Report updated');
            }else{
               $request['name'] = $user['name'];
                $request['admin_id'] = $user['id'];
                $request['date'] = $todayDate;
                $request['email'] = $user['email'];
                $request['type'] = $user->roles[0]['name'];
                TeamReport::create($request->all());
                Session::flash('success','Report submit'); 
            }
        }
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

    public function adminlist(){

        $users = auth()->user()->get();
        // dd($users);

        return view('admin.adminteam.list',compact('users'));
    }

    public function adminteamview($id){

        $today = Carbon\Carbon::now()->format('d-m-Y');
        $user = auth()->user()->where('id',$id)->first();
        $agents = Agent::where('account_manager', $id)->pluck('id');
        $student = Student::whereIn('agent_id',$agents)->get();
        $appliedStudentFiles = Student::whereIn('id',$agents)->where('lock_status',1)->where('applied_at',$today)->get();
        // dd($student);

    // dd($user);
        return view('admin.adminteam.profile', compact('user','agents','student','appliedStudentFiles'));
    }
}
