<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Bitfumes\Multiauth\Http\Requests\AdminRequest;
use Bitfumes\Multiauth\Model\Admin;
use App\Models\Commission;
use App\Models\AllowCountryAgent;
use App\Models\Admitofferevent;
use App\Models\Inquiry;
use App\Helpers\Notify;
use App\Agent;
use Session;
use Storage;
use Auth;
use Mail;

class AdmitOfferController extends Controller
{
    public function fileUpload(Request $request)
    {   
        // $path = $request->file('file')->store('myfile','s3');
        // $img = Storage::disk('s3')->url($path);
        // Storage::disk('s3')->setVisibility($path,'public');
        // $filename = basename($path);
       // $img = Storage::disk('s3')->response('myfile/' . $filename);
                
        return view('admitoffer.gallery',compact('img'));

    }
   
    public function index()
    {   
        // $numbers = ['919915034645','917986048544'];
        // $text = 'hello its dummy text';

        // $messagess = Notify::whatsappnotif($numbers,$text);
        return view('admitoffer.index');
    }
    public function aboutus()
    {
        
        return view('admitoffer.about');
    }
    public function eventhome()
    {
        
        return view('admitoffer.events');
    }
    public function recognition()
    {
        
        return view('admitoffer.recognition');
    }
    public function pressreleases()
    {
        
        return view('admitoffer.press-releases');
    }
    public function forrecruiters()
    {
        
        return view('admitoffer.for-recruiters');
    }
    public function forinstituties()
    {
        
        return view('admitoffer.for-instituties');
    }
    public function forstudents()
    {
        
        return view('admitoffer.for-students');
    }
    public function pricing()
    {
        
        return view('admitoffer.pricing');
    }
    public function blog()
    {
        
        return view('admitoffer.blog');
    }
    public function careers()
    {
        
        return view('admitoffer.careers');
    }
    public function disclaimer()
    {
        
        return view('admitoffer.disclaimer');
    }
    public function empoweringstudentfutures()
    {
        
        return view('admitoffer.empowering-student-futures');
    }
    public function shapingthefutureofglobaleducation()
    {
        
        return view('admitoffer.shaping-the-future-of-global-education');
    }
    public function revolutionizinginternationalstudentrecruitment()
    {
        
        return view('admitoffer.revolutionizing-international-student-recruitment');
    }
    public function myteam()
    {
        return view('admitoffer.team-admitly');
    }



     public function privacyPolicy()
    {
        
        return view('admitoffer.privacy-policy');
    }
     public function refundPolicy()
    {
        // $agents = Agent::get();
        // foreach ($agents as $key => $value) {
        //     AllowCountryAgent::Create([
        //                                 'agent_id'=>$value['id'],
        //                                 'country_id'=>38,
        //     ]);
        // }
        
        return view('admitoffer.refund-policy');
    }
     public function termsandconditions()
    {
        
        return view('admitoffer.termsandconditions');
    }
    public function solution()
    {
        
        return view('admitoffer.solutions');
    }
    public function gallery()
    {
        
        return view('admitoffer.gallery');
    }
    public function contactus()
    {
        
        return view('admitoffer.contact');
    }
      public function webinars()
    {
        
        return view('admitoffer.webinars');
    }
      public function Investors()
    {
        
        return view('admitoffer.Investors');
    }
      public function canadalaunch()
    {
        
        return view('admitoffer.canadalaunch');
    }
    //   public function checkUid($id)
    // {
    //     return 'hiii';

    //     $id = str_ireplace("FoX", $id);
    //     $agent = Agent::where('id',$id)->first();
        
    //     return response(['status'=>'true','message'=>'id']);
    // }
      public function event()
    {
    // return redirect()->route('home');
        return view('event.index');
    }
    public function eventPost(Request $request)
    {

        $validator =  $this->validate($request,
        [
            // 'agent_uid' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'city' => 'required|max:255',
            'organization' => 'required|max:255',
            
        ]);

        // $id = strtoupper($request->agent_uid);
        // $uid = explode("AO",$id);
        
        // if(sizeof($uid) != 2 ){
        //             Session::flash('dangers', 'Something went wrong'); 
        //         return back()->withErrors($validator)->withInput($request->all());

        // }
          $agent =  Agent::where('email',$request->email)->where('status','1')->first();
            
if($agent){
    $agentID = $agent['id'];
}else{
    $agentID = '';

}
                $hasId = Admitofferevent::where('email',$request->email)->where('event_type','3')->first();
                if($hasId){
                    Session::flash('dangers', 'Registration already exist'); 
                return back()->withErrors($validator)->withInput($request->all());
                }
                Admitofferevent::create([
                    'agent_id'=>$agentID,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'firstname'=>$request->firstname,
                    'lastname'=>$request->lastname,
                    'city'=>$request->city,
                    'organization'=>$request->organization,
                    // 'accountManager'=>$request->accountManager,
                    'event_type'=>'4',
                ]);
                
                $sendTo = 'contact@admitoffer.com';

                $subject = 'New message from CANADA & UK MEET form';

                $emailText = "You have new message from contact form <br> ============================= <br> ";
                    $data = $request->all();
                $mail =  Mail::send('emails.eventEmail',['data' => $data], function($message) use ($data) {
                        $message->to('contact@admitoffer.com');
                        $message->subject('New message from CANADA & UK MEET form '.$data['firstname'].'');
                        $message->from($data['email']);
                    });
                $toEmail = $request->email;
                    $data = $request->all();
                $mail =  Mail::send('emails.eventEmailToagent',['data' => $data], function($message) use ($data,$toEmail) {
                        $message->to($toEmail);
                        $message->subject('Confirmed message from CANADA & UK MEET by Admit Offer');
                        
                    });


                Session::flash('success', 'Contact form successfully submitted. Thank you, We will get back to you soon!'); 
                return back()->withErrors($validator);
            
        return back()->withErrors($validator)->withInput($request->all());
    }

     public function pdfView(Request $request){
        $data =  $request->all();

        return  view('pdf.view',compact('data'));
    }
    public function getpdfView(Request $request){
        
        return redirect()->route('student.index');
    } 
    public function lock($id){
        $id = base64_decode($id);
        return view('pagelock.view',compact('id'));
    }
    public function unlock(Request $request){
        $agent =Auth::guard('agent')->user();
            $countryID =  Session::get('commissionStructureCountryId');
        if($request->password == $agent['pagelock'] ){
            $id = base64_decode($countryID);
             $commission = Commission::where('country_id',$id)->first();
        return view('agent.comission.structure',compact('commission'));
        }

        return back()->withErrors(['Password not match']);
    }
    public function changePassword(){

        return view('pagelock.changepassword');
    }
    public function changePasswordUpdate(Request $request){
        
         $agent =Auth::guard('agent')->user();
        if($request->oldpassword == $agent['pagelock'] ){
            if($request->newpassword == $request->confirmpassword ){
                Agent::where('id',$agent['id'])->update(['pagelock'=> $request->newpassword]);
            Session::flash('success','New Password Updated');

            return back();
            }else{

            return back()->withErrors(['confirm password not matched
                ']);
            }

            
        }else{
            return back()->withErrors(['correct old password']);
        }
    }

    public function student()
    {
        
        return view('admitoffer.student');
    }

    public function studentpost(Request $request)
    {

        $validator =  $this->validate($request,
        [
            
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'country' => 'required|max:255',
            'ielts' => 'required|max:255',
            
        ]);


        Inquiry::create([

                    'name'=>$request->name,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'reffer_by'=>$request->reffer_by,
                    'ielts'=>$request->ielts,
                    'country'=>$request->country,
                    // 'accountManager'=>$request->accountManager,
                ]);
        // dd($request->all());
        Session::flash('success', 'Contact form successfully submitted. Thank you, We will get back to you soon!'); 

        return back();
    }

    public function passwordupdate(Request $request,$id)
    {
        $this->validate($request, [
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
            ]);
        
     $user =  Admin::find($id);
        $user->password =  bcrypt($request->new_password);
        $user->save();
        
        return redirect(route('admin.show'))->with('message', "Details are successfully updated");
    }
}