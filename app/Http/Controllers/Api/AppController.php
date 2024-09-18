<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agent\Student;
use App\Models\StudentAttachment;
use App\Models\AllowCountryAgent;
use App\Models\Loc\Country;
use App\Agent;
use Bitfumes\Multiauth\Model\Admin;
use Bitfumes\Multiauth\Model\Role;
use Hash;
use DB;
use Storage;
use File;
use Auth;
use Session;
use JWTAuth;

class AppController extends Controller
{
    public function index($id)
    {
        $students = Student::where("agent_id", $id)
            ->where("lock_status", 1)
            ->get();
        return response()->json($students);
    }
    public function login(Request $request)
    {
        $input = $request->only("email", "password");
        $token = null;
        $user = Auth::guard("agent")->attempt($input);
        if ($user) {
            $token = Auth::guard("agent")->user()->remember_token;
            $agent = Agent::where("email", $request->email)->first();
            $agentAllowCountry = AllowCountryAgent::where('agent_id',$agent['id'])->pluck('country_id')->toArray();
            $countries = Country::whereIn('id',$agentAllowCountry)->pluck('id','name')->toArray();

            return response()->json([
                "status" => true,
                "agent" => $agent,
                "token" => $token,
                "countries" => $countries,
                "message" => "login Sucessfully",
            ]);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Invalid Email or Password",
            ]);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();
        return $request->all();
        $token = $request->bearerToken();
        if($token){
            $student = Student::create([
                "agent_id" => $data["agent_id"],
                "firstName" => $data["student_name"],
                "country_id" => $data["country_id"],
                "applingForLevel" => $data["course_level"],
            ]);
            $studentId = $student['id'];
            $base64Images = $data["images"];
            foreach ($base64Images as $base64Image) {
                $file = base64_decode($base64Image);
                $fileName =
                    md5($file->getClientOriginalName() . time()) .
                    "." .
                    $file->getClientOriginalExtension();
                $destinationPath =
                    date("Y") .
                    "/" .
                    date("M") .
                    "/uploads/student/allDocuments/" .
                    $studentId;
                $file->move($destinationPath, $fileName);

                $attachment = StudentAttachment::create([
                    "name" => $fileName,
                    "path" => $destinationPath,
                    "type" => "allDocuments",
                    "student_id" => $studentId,
                ]);
                $attachment->save();
            }
                return response()->json([
                "status" => 1,
                "data" => $student,
                "message" => "Request Submitted Sucessfully.",
            ]);
           
        }
        return response()->json([
                "status" => 1,
                "data" => '$student',
                "message" => "not valid token",
            ]);
    }
    // reporting
    public function agentList($id)
    {
        $id = base64_decode($id);
        $am = Admin::where("email",$id)->first();
        if($id != "Himanshu@admitly.ai"){
            if($am != null){
                $agents['total'] = Agent::where("account_manager",$am['id'])->get();
                $agents['status'] = Agent::where("account_manager",$am['id'])->get()->groupBy('status');
                $amAgentsIds = Agent::where("account_manager",$am['id'])->pluck('id')->toarray();
                $agents['applications'] = Student::whereIn("agent_id",$amAgentsIds)->get()->groupBy('agent_id');

            }else{
                $agents['total'] = collect();
                $agents['status'] = collect();
                $agents['applications'] = collect();
            }
        }else{
            $agents['total'] = Agent::get();
            $agents['status'] = Agent::get()->groupBy('status');
            $amAgentsIds = Agent::pluck('id')->toarray();
            $agents['applications'] = Student::get()->groupBy('agent_id');
        }
       
        return response()->json($agents);
    }
    public function AmUpdate()
    {
        $roles = DB::table('admin_role')->where('role_id',5)->pluck('admin_id')->toArray();
        $ams = Admin::whereIn('id',$roles)->select('id','name','email','password as hsp')->get();
        return response()->json($ams);
    }
}
