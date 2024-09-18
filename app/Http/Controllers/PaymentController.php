<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Agent\StudentController;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Agent\Student;
use App\Models\Loc\Country;
Use App\Http\Helpers\ImageUpload;
use App\Models\Agent\AppliedStudentFile;
use App\Models\StudentAttachment;
use App\Models\StudentQuestionAnswers;
use App\Models\StudentApplicationsPayment;
use App\Models\Notification;
use Redirect,Response,Session;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
	protected $StudentController;
    public function __construct(StudentController $StudentController)
    {
        $this->StudentController = $StudentController;
    }
     public function index($student_id,$amount)
	 {
	 	$student_id = base64_decode($student_id);
	 	$amount = (int)base64_decode($amount);
	 	$sessionStudent_id = Session::get('paymentstudent_id');
	 	$sessionamount = Session::get('amount');
	 	if($student_id == $sessionStudent_id && $amount == $sessionamount){
	 		$student = Student::where('id',$student_id)->first();
	 		$country = Country::where('id',$student['applingForCountry'])->first();
	 		$allApplications = AppliedStudentFile::with('college')->where('isChecked','yes')->where('student_id',$student_id)->get();
	 	$order = Payment::where( 'student_id', $student_id)->first();
	 	$screenshot = StudentAttachment::where('type',$student_id)->where('attachment_name','paidAmountScreenshot')->first();

	 	 return view('payment.paytmindex',compact('order','student_id','amount','country','allApplications','screenshot'));
	 	}else{

	 		Session::flash('success','Payment not matched');
	 		return back();
	 	}
	 }
	 public function indexOnline($student_id,$amount)
	 {
	 	$student_id = base64_decode($student_id);
	 	$amount = (int)base64_decode($amount);
	 	$sessionStudent_id = Session::get('paymentstudent_id');
	 	$sessionamount = Session::get('amount');
	 		$allApplicationsget = AppliedStudentFile::with('college')->where('isChecked','yes')->where('student_id',$student_id)->get();

			$hasCardCollegeId = [];
            $totalAppFee = 0;
	 		foreach($allApplicationsget as $key=> $studentCourseApplyFor) {
            		if($studentCourseApplyFor['isChecked'] == 'yes'){
            				if($studentCourseApplyFor->college['isCardRequired'] == 'yes'){
             				   if(!in_array($studentCourseApplyFor->college['id'],$hasCardCollegeId)){
                    
                				    $hasCardCollegeId[] = $studentCourseApplyFor->college['id'];
                  				    (int)$totalAppFee += (int)$studentCourseApplyFor->college['application_fee'];
                   
              					}
            				}
           			}
            }



	 	if($student_id == $sessionStudent_id && $amount == $sessionamount && $totalAppFee == $sessionamount){
	 		$student = Student::where('id',$student_id)->first();
	 		$country = Country::where('id',$student['applingForCountry'])->first();
	 		$allApplications = AppliedStudentFile::with('college')->where('student_id',$student_id)->get();
	 	$order = Payment::where('student_id',$student_id)->first();
	 	$screenshot = StudentAttachment::where('type',$student_id)->where('attachment_name','paidAmountScreenshot')->first();
// dd($student_id,$amount,$sessionStudent_id,$sessionamount);
	 	
	 	 return view('payment.index',compact('order','student_id','amount','country','allApplications','screenshot'));
	 	}else{

	 		Session::flash('error','Payment not matched with selected programs');
	 		return back();
	 	}
	 }
	  public function invoice($student_id,$amount)
	 {
	 	$student_id = base64_decode($student_id);
	 	$amount = (int)base64_decode($amount);
	 	$sessionStudent_id = Session::get('paymentstudent_id');
	 	$sessionamount = Session::get('amount');
	 		$student = Student::where('id',$student_id)->first();
	 	
	 	if($student['applicationFee_status'] == 'paid' || $student['applicationFee_status'] == 'approved'){
	 		$country = Country::where('id',$student['applingForCountry'])->first();
	 		$allApplications = AppliedStudentFile::with('college')->where('isChecked','yes')->where('student_id',$student_id)->get();
	 	$order = Payment::where('student_id',$student_id)->first();
	 	$screenshot = StudentAttachment::where('type',$student_id)->where('attachment_name','paidAmountScreenshot')->first();

	 	 return view('payment.invoice',compact('student','order','student_id','amount','country','allApplications','screenshot'));
	 	}else{

	 		return back();
	 	}
	 }
	 

	 public function store(Request $request)
    {
    	$student_id = base64_decode($request->std);
    	
    	Payment::where('student_id',$student_id)->delete();
    	$totalAmount = base64_decode($request->cid);
    	$sessionStudent_id = Session::get('paymentstudent_id');
	 	$sessionamount = Session::get('amount');
    	$getCountryStudent = Student::where('id',$student_id)->first();
    	$country = Country::where('id',$getCountryStudent['applingForCountry'])->first();
	 	if($student_id != $sessionStudent_id && $totalAmount != $sessionamount){
	 		Session::flash('error','something went wrong');
	 		return back();
	 	}	
    	
    	$order_id = uniqid();
    	$order = Payment::create([
    	'order_id' => $order_id,
    	'status' => 'pending',
    	'student_id' => $student_id,
	    'amount' => (int)$totalAmount*(int)$country['currency'],
	    'transaction_id' => '',
	    ]);


	

	    $data_for_request = $this->handlePaytmRequest( $order_id, $order->amount );


	    $paytm_txn_url = 'https://securegw.paytm.in/theia/processTransaction';
	    $paramList = $data_for_request['paramList'];
	    $checkSum = $data_for_request['checkSum'];

	    return view( 'payment.paytm-merchant-form', compact( 'paytm_txn_url', 'paramList', 'checkSum' ) );
    }

	public function handlePaytmRequest( $order_id, $amount ) {
		// Load all functions of encdec_paytm.php and config-paytm.php
		$this->getAllEncdecFunc();
		$this->getConfigPaytmSettings();

		$checkSum = "";
		$paramList = array();

		// Create an array having all required parameters for creating checksum.
		$paramList["MID"] = 'HLSZxA62579552851283';
		$paramList["ORDER_ID"] = $order_id;
		$paramList["CUST_ID"] = $order_id;
		$paramList["INDUSTRY_TYPE_ID"] = 'Retail';
		$paramList["CHANNEL_ID"] = 'WEB';
		$paramList["TXN_AMOUNT"] = 1;
		$paramList["WEBSITE"] = 'DEFAULT';
		$paramList["CALLBACK_URL"] = route('mypayment.callback');
		$paytm_merchant_key = '8C!KdsMe2f#!m1nW
';

		//Here checksum string will return by getChecksumFromArray() function.
		$checkSum = getChecksumFromArray( $paramList, $paytm_merchant_key );

		return array(
			'checkSum' => $checkSum,
			'paramList' => $paramList
		);
	}


		public function screentShotUpload(Request $request) {
		$student_id = base64_decode($request->student_id);
		StudentAttachment::where('type',$student_id)->where('attachment_name','paidAmountScreenshot')->delete();
		$totalAmount = base64_decode($request->cid);
			$studentSaveDocument = ImageUpload::uploadStudentDocuments($request->screenshot,'paidAmountScreenshot',$student_id,$comment=Null);
			$getCountryStudent = Student::where('id',$student_id)->first();
    	$country = Country::where('id',$getCountryStudent['applingForCountry'])->first();
			$order_id = uniqid();
	    	$order = Payment::create([
	    	'order_id' => $order_id,
	    	'status' => 'complete',
	    	'student_id' => $student_id,
		    'amount' => (int)$totalAmount*(int)$country['currency'],
		    'transaction_id' => '',
		    ]);

		    $student = Student::where('id',$student_id)->update(['applicationFee_status'=>'paid','application_total_fee'=>$totalAmount,'application_fee_paid_amount'=>$totalAmount]);
			return redirect()->route('student.show',base64_encode($student_id));	
		}

		 public function razorPayCapture($razorpaytransaction_id ,$amount){

			 $api = new Api("rzp_live_vp4YnZnCZL2cnB", "Qbt6RFKvC9lOd48lluWun7Xy");

			$payment = $api->payment->fetch($razorpaytransaction_id);
			
			return $payment->capture(array('amount' => $payment['amount'], 'currency' => 'INR'));
		 }

		 public function razorPaySuccess(Request $request){

			 $data = [
			           'user_id' => '1',
			           'student_id' => $request->student_id,
			           'payment_id' => $request->razorpay_payment_id,
			           'amount' => $request->totalAmount,
			        ];
			 $getId = Payment::insertGetId($data);
			 $sessionamount = Session::get('amount');
			 $student = Student::where('id',$request->student_id)->update(['applicationFee_status'=>'paid','application_total_fee'=>$sessionamount,'application_fee_paid_amount'=>$request->totalAmount]);
			 $allApplications = AppliedStudentFile::with('college')->where('isChecked','yes')->where('student_id',$request->student_id)->get();
			 foreach($allApplications as $key => $allApplication){

			 	AppliedStudentFile::where('id',$allApplication['id'])->update(['paid_applications_fee'=>$allApplication->college['application_fee']]);

			 	$hasPaid = StudentApplicationsPayment::where('student_id',$request->student_id)->where('college_id',$allApplication->college['id'])->first();
			 	if(!$hasPaid){

			 		$studentApplicationsPayment = StudentApplicationsPayment::create(['student_id'=>$request->student_id,'college_name'=>$allApplication->college['name'],'college_id'=>$allApplication->college['id'],'amount'=>$allApplication->college['application_fee']]);
			 	}
			 }

		$capt = $this->razorPayCapture($request->razorpay_payment_id,$request->totalAmount);
	 	


			 $arr = array('msg' => 'Payment successfully credited', 'status' => true,'student_id' => $request->student_id);
			 return Response()->json($arr);    
		}


	public function RazorThankYou($id)
		 {
		 	$student_id = base64_decode($id);
		 	$id = $id;

		  	$applications = StudentApplicationsPayment::where('student_id',$student_id)->get();


			$order = Payment::where('student_id',$student_id )->first();
			
			$order->status = 'complete';
			$order->transaction_id = $order['payment_id'];
			$order->save();
			
		 return view('payment.thankyou',compact('id','applications'));
		 }



		public function apcheck($id) {
		$student_id = base64_decode($id);
		
		$studentUP = Student::where('id',$student_id)->update(['applicationFee_status'=>'approved']);
		$studentao_status = Payment::where('id',$student_id)->update(['ao_status'=>'approved']);
		$student = Student::where('id',$student_id)->first();
		
		Notification::create([
            'type' =>'status student document accepted',
            'link' =>route('student.show',base64_encode($student['id'])),
            'agent_id' =>$student['agent_id'],
            'application_id' =>'',
            'message' =>'Payment of student '.$student['firstName'].' is accepted by ADMIT OFFER team',
            'application_status' =>'',
            'status' =>0,
            ]);
		Session::flash('success','Payment status updated');
			return back();	
		}
		public function apchecked($id) {
		$student_id = base64_decode($id);
		
		$studentUP = Student::where('id',$student_id)->update(['applicationFee_status'=>'decline']);
		$studentao_status = Payment::where('id',$student_id)->update(['ao_status'=>'decline']);
		$student = Student::where('id',$student_id)->first();
		Notification::create([
            'type' =>'status student document accepted',
            'link' =>route('student.show',base64_encode($student['id'])),
            'agent_id' =>$student['agent_id'],
            'application_id' =>'',
            'message' =>'Payment of student '.$student['firstName'].' is declined by ADMIT OFFER team',
            'application_status' =>'',
            'status' =>0,
            ]);
		Session::flash('success','Payment declined');
		 return back();	
		}


	/**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

	
	public function paytmCallback( Request $request ) { 
		
		$order_id = $request['ORDERID'];
		if ( 'TXN_SUCCESS' === $request['STATUS'] ) {
			$sessionStudent_id = Session::get('paymentstudent_id');
	 		$sessionamount = Session::get('amount');
			$sessionamount = Session::get('amount');	
			$student_id = Payment::where('order_id',$order_id)->pluck('student_id');
			 $student = Student::where('id',$student_id)->update(['applicationFee_status'=>'paid','application_total_fee'=>$sessionamount,'application_fee_paid_amount'=>$request['TXNAMOUNT']]);
			 $allApplications = AppliedStudentFile::with('college')->where('student_id',$student_id)->get();
			foreach($allApplications as $key => $allApplication){
			 	AppliedStudentFile::where('id',$allApplication['id'])->update(['paid_applications_fee'=>$allApplication->college['application_fee']]);
			 
			 	$hasPaid = StudentApplicationsPayment::where('student_id',$student_id)->where('college_id',$allApplication->college['id'])->first();
			 	if(!$hasPaid){

			 		$studentApplicationsPayment = StudentApplicationsPayment::create(['student_id'=>$student_id,'college_name'=>$allApplication->college['name'],'college_id'=>$allApplication->college['id'],'amount'=>$allApplication->college['application_fee']]);
			 	}
			}


			$transaction_id = $request['TXNID'];
			$order = Payment::where( 'order_id', $order_id )->first();
			$order->status = 'complete';
			$order->transaction_id = $transaction_id;
			$order->save();
			$status = 'complete';
			$student = Student::where('id',$student_id)->first();
	 		$country = Country::where('id',$student['applingForCountry'])->first();
	 		$amount = $request['TXNAMOUNT'];
	 		$response = $this->StudentController->completeApplication($student_id);
	 	 return view('payment.paytmindex',compact('order','student_id','amount','country','allApplications'));
			

		} else if( 'TXN_FAILURE' === $request['STATUS'] ){
			return view( 'payment.payment-failed' );
		}
	}


    public function adminPaymentsList(){
    	$appliedStudentFiles = Student::select("id","agent_id","student_unique_id","firstName","middleName","lastName","mobileNo","email","applingForCountry","applingForLevel","previousQualification","country_id","nationality","comment","IsShortlisting","applied_at","apply_for_shortlist_at","shortlist_compleate_at")->with(['appliedStudentFiles' => function($sfiles) {
        $sfiles->select('id','student_id','agent_id');
    },'country' => function($cntry) {
        $cntry->select('id','path','image_name');
    },'agent' => function($agnt) {
        $agnt->select('id','name','company_name','mobileno','email');
    },'appliedStudentFilesByAdmin'=> function($adminApplictn) {
        $adminApplictn->select('id');
    }])->where('shortlisting','0')->where('applicationFee_status','paid')->where('lock_status',1)->get();

$isMatchPreProcess = '';
			return view( 'admin.payments.index',compact('appliedStudentFiles','isMatchPreProcess'));

    }
		





}
