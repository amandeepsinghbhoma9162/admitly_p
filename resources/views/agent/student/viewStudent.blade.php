<?php
$studentUser =Auth::guard('student')->check();
$totalAppFee = 0;
$qlfyDocumentCheck = [];
?>
@if($studentQualifications->count()>0)

    @foreach($studentQualifications as $key=> $studentQualification)
    <?php
        if($studentQualification->qualificationDocuments){
            $qlfyDocumentCheck[] = $studentQualification->qualificationDocuments;
        }

    ?>
    @endforeach
@endif
    
@extends(($studentUser === false) ? 'agent.layouts.app' : 'applicant.layouts.app')
@section('content')
<style>
    .card{
    margin:10px;
    }
    .selecteditemColor{
        background: #ffffff!important;
        border: 2px solid #9bc39b!important;
    }
    .notSelected{
        filter: blur(1px);
     }
     .stepsMainBar{
        margin: 40px 0px 60px 0px;
    }
    .stepsTopBar{
        background: #ede7f6;
        width: 100%;
        padding: 0px;
        height: 10px;
    }
    .stepsTopBar .step1 {
        width: 150px;
        margin: -18px 0px 0px 0px;
    }
    .stepsTopBar .step1 label{
        width: 45px;
    background: #7bab66;
    text-align: center;
    border-radius: 50%;
    color: white;
    height: 45px;
    padding: 2.2%;
    box-shadow: 1px 0.4px 2px #00000087;
    border: 2px solid #7bab66;
    font-size: 25px!important;
    float: right;
    }
    .stepsTopBar .step2 {
        width: 150px;
        margin: -18px 0px 0px 0px;
    }
    .stepsTopBar .step2 label{
        width: 45px;
    background: #7bab66;
    text-align: center;
    border-radius: 50%;
    color: white;
    height: 45px;
    padding: 2.2%;
    box-shadow: 1px 0.4px 2px #00000087;
    border: 2px solid #7bab66;
    font-size: 25px!important;
    float: right;
    }
    .stepsTopBar .step3 {
        width: 150px;
        margin: -18px 0px 0px 0px;
    }
    .stepsTopBar .step3 label{
        width: 45px;
    background: white;
    text-align: center;
    border-radius: 50%;
    color: #5a76d7;
    height: 45px;
    padding: 2.2%;
    box-shadow: 1px 0.4px 2px #00000087;
    border: 2px solid #7bab66;
    font-size: 25px!important;
    float: right;
    }
     
    label{
        font-size:17px!important; 
    }
    .stepsHead{
        width: 250px;
    }
    .stepsHead p{
        float: right;
    text-align: center;
    width: 100%;
    }
</style>
@if($student['lock_status'] == 1)
    <style>
        
     .stepsTopBar .step3 label{
        width: 45px;
        background: #4665d3e0;
        color: white;
    }
    </style>
@endif
<div class="container-fluid" id="container">
<div class="row ">
    <input type="hidden" name="" value="{{$student['id']}}" id="student_id">
    @if($student['lock_status'] == 0)
        
         @if($IsCheckedStudentCourseApplyFors->count()>0)
         @if($studentCourseApplyFors->count()>0)
                <input type="hidden" id='completeApplicationId' value="{{$student['id']}}">
                <a href="javascript:;" id="completeApplication" class="btn btn-success btn-default-color btn-shadow float-right subRequests fixedDisplay" style="width: 305px!important; background:linear-gradient(#e77817, #D80D05);">Click Here to FINAL SUBMIT - @if($studentCourseApplyFors->count()>1)
                    {{$IsCheckedStudentCourseApplyFors->count()}} Applications
                @endif
                @if($studentCourseApplyFors->count()>0 && $studentCourseApplyFors->count()<2)
                    {{$IsCheckedStudentCourseApplyFors->count()}} Application
                @endif
                </a>
          @endif      
          @endif      
          @if(!$student['shortlisting'])
          @if($studentQualifications->count() >= 2)
          @if($studentQualifications->count() == sizeof($qlfyDocumentCheck))
            <a href="{{route('new.student.shortlisting',$student['id'])}}" class="btn btn-success btn-default-color btn-shadow float-right fixedDisplay" style="background:linear-gradient(#e77817, #D80D05);top:150px;padding:20px;">Click Here to Submit application for shortlisting
                </a>
          @endif
          @endif
          @endif
            
              
    @endif

    <div class="col-md-12">
        <div class="stepsMainBar">
            <div class="stepsTopBar">
            <div class="row">
                <div class="col-md-4">
                    <div class="step1">
                        <label>1</label>
                    </div>
                    <div class="stepsHead">
                        <p>Basic Details</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step2">
                        <label>2</label>
                    </div>
                    <div class="stepsHead">
                        <p>Shortlist Programs</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step3">
                        <label>3</label>
                        <div class="stepsHead">
                        <p>Verify & Final Submit</p>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-title">Student Details</div>
                        
                    </div>
                    <div class="col-md-6">
                        @if(Auth::guard('student')->check() === false)
                        <a href="{{route('student.index')}}" class="btn btn-danger btn-default-color float-right" style="margin-top: -8px;">Back</a>
                        @endif
                        <br>
                        <br>
                        <a style="margin-top: -44px; margin-right: 74px"  href="{{route('student.alldocs.View',base64_encode($student->id))}}" class="btn btn-danger float-right btn-default-color"><i class="pe-7s-file"></i>Documents</a>
                    </div>
                    <div class="col-md-6">
                        
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2" style="border: 1px solid #eee; margin-left: 15px;" >
                        <div class="form-group">
                            <div class="SviewPage" style="margin-top: 10px;">
                                @if($student->studentImage)
                                <img src="{{asset($student->studentImage->path.'/'.$student->studentImage->name)}}">
                                @else
                                <img  src="{{asset('images/site/user-img.png')}}" alt="your image" />
                                @endif
                            </div>
                            <div class="text-center" style="font-size: 20px;" >
                                {{$student['title']}} {{$student['firstName']}}{{$student['middleName']}} {{$student['lastName']}}
                            </div>
                            <div class="text-center" >
                                <span class="colorBgYellow">{{$student['student_unique_id']}}</span>
                            </div><!-- 
                            <div class="text-center" style="margin-top: 10px;" >
                                <button class="btn btn-danger"><a href="{{route('agent.student.chat.show',base64_encode($student['id']))}}"></a>Chat</button>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-9 capitalize" style="border: 1px solid #eee; margin-left: 15px;">
                        <div id="toastTypeGroup" class="strongColor">
                        <div  class="row " style="padding: 5px;">
                            <div class="col-md-6 " >
                                    <div class="row " >
                                        <div class="col-md-4 " >
                                            <strong>Email: </strong>
                                        </div>
                                        <div class="col-md-8 " >
                                            {{$student['email']}}
                                        </div>
                                    </div>
                                </div>
                             <div class="col-md-6">
                              <!--    @if($student['lock_status'] == 0)
                                    @if($studentCourseApplyFors->count() > 0)
                                    <div class="row  capitalize  ">
                                        <div class="col-md-12 ">
                                            <input type="hidden" id='completeApplicationId' value="{{$student['id']}}">
                                            <a href="javascript:;" id="completeApplication" class="btn btn-success btn-shadow float-right width-100-percent subRequests">FINAL SUBMIT - @if($studentCourseApplyFors->count()>1)
                                                {{$studentCourseApplyFors->count()}} Applications
                                            @endif
                                            @if($studentCourseApplyFors->count()>0 && $studentCourseApplyFors->count()<2)
                                                {{$studentCourseApplyFors->count()}} Application
                                            @endif
                                            </a>
                                        </div>
                                    </div>
                                    @endif    
                                    @endif -->
                                    @if($student['lock_status'] == 1)
                                    <div class="row  capitalize ">
                                        <div class="col-md-12 ">
                                            <a href="javascript:;"  class="btn btn-danger text-center float-right" style="width: 100%; background: #7862a2!important; border-color: #7862a2!important;;">Profile Locked</a>
                                        </div>
                                    </div>
                                    @endif
                                    </div>
                            </div>
                            <div class="row  capitalize" style="padding: 5px;">
                                <div class="col-md-6 " >
                                    <div class="row " >
                                        <div class="col-md-4 " >
                                            <strong>Skype Id: </strong>
                                        </div>
                                        <div class="col-md-8 " >
                                            {{$student['skypeId']}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 " >
                                      <div class="row  capitalize ">
                                        <div class="col-md-6 " >
                                            <strong>Applied For Country: </strong>
                                        </div>
                                        <div class="col-md-6 " >
                                            <span class="capitalize">{{$student->country['name']}}</span>&nbsp;@if($student->country)<img src="{{asset($student->country['path'].'/'.$student->country['image_name'])}}" width="30px">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row " style="padding: 5px;">
                                <div class="col-md-6 " >
                                    <div class="row" >
                                        <div class="col-md-4 " >
                                            <strong>Mobile no: </strong>
                                        </div>
                                        <div class="col-md-8 " >
                                            {{$student['mobileNo']}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 " >
                                    <div class="row  capitalize ">
                                        <div class="col-md-6 " >
                                            <strong>Application Level: </strong>
                                        </div>
                                        <div class="col-md-6 " >
                                            <span class="capitalize">
                                                @if($student->country['id'] != '230')
                                                    {{$student->crslvl['name']}}
                                                @else
                                                {{$student->qualificationLevel['name']}}
                                                @endif
                                            </span>
                                            <span class="capitalize"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row " style="padding: 5px;">
                                <div class="col-md-6 " >
                                    <div class="row " >
                                        <div class="col-md-4 " >
                                            <strong>Marital Status: </strong>
                                        </div>
                                        <div class="col-md-8 " >
                                            @if($student['email'])
                                            @if($student['maritalStatus'] =='yes')
                                            Single
                                            @else    
                                            Married
                                            @endif
                                            @endif    
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 " >
                                    <div class="row   ">
                                        @if($student['lock_status'] == 1)
                                        <div class=" col-md-6" >
                                            <strong>Profile Created On: </strong>
                                        </div>
                                        <div class=" col-md-6" >
                                            {{date('d-M-Y',strtotime($student['created_at']))}}
                                        </div>
                                        @else
                                        <div class=" col-md-6" >
                                            <strong>Profile Status: </strong>
                                        </div>
                                        <div class=" col-md-6" >
                                            <b>INCOMPLETE</b>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row " style="padding: 5px;">
                                <div class="col-md-6 " >
                                    <div class="row " >
                                        <div class="col-md-4 " >
                                            <strong>Gender: </strong>
                                        </div>
                                        <div class="col-md-8 " >
                                            {{$student['gender']}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 " >
                                    <div class="row   ">
                                        <div class=" col-md-6" >
                                            <strong>English Score: </strong>
                                        </div>
                                        <div class=" col-md-6 uppercase" >
                                            {{$student->englishScores['score']}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row " style="padding: 5px;">
                                <div class="col-md-6 " >
                                    <div class="row " >
                                        <div class="col-md-4 " >
                                            <strong>Date Of Birth: </strong>
                                        </div>
                                        <div class="col-md-8 " >
                                            {{$student['dateOfBirth']}}
                                        </div>
                                    </div>
                                </div>
                                @if($student->mathScores)
                                @if($student->mathScores['name'])
                                <div class="col-md-6 " >
                                   <div class="row   ">
                                        <div class=" col-md-6" >
                                            <strong>Math Score: </strong>
                                        </div>
                                        <div class=" col-md-6" >
                                        {{$student->mathScores['name']}}
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endif

                            </div>
                            <!-- <div class="row ">
                                <div class="col-md-6 " >
                                    <div class="row " >
                                        <div class="col-md-4 " >
                                            <strong>Language: </strong>
                                        </div>
                                        <div class="col-md-8 " >
                                            {{$student['firstLanguage']}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 " >
                                    <div class="row   ">
                                        <div class=" col-md-6" >
                                            <strong>Passport Expiry Date: </strong>
                                        </div>
                                        <div class=" col-md-6" >
                                        {{date('d-M-Y',strtotime($student['passportExpiryDate']))}}
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row " style="padding: 5px;">
                                @if($student['applicationFee_status'])
                                <div class="col-md-6 " >
                                    <div class="row  ">
                                        <div class=" col-md-4" >
                                            <strong>Total Amount: </strong>
                                        </div>
                                        <div class=" col-md-6" >
                                            <small>{{$student->country['currency_icon_name']}}</small>&nbsp;{{$student['application_total_fee']}}
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($student['applicationFee_status'])
                                <div class="col-md-6 " >
                                    <div class="row  ">
                                        <div class=" col-md-6" >
                                            <strong>Application Fee:</strong>
                                        </div>
                                        <div class=" col-md-6" >
                                            {{$student['applicationFee_status']}}
                                            @if($student['applicationFee_status'] == 'paid')
                                            
                                                @if($student['lock_status'] == 1)
                                                <a class="btn btn-danger" href="{{route('payment.invoice',[base64_encode($student['id']),base64_encode($student['application_total_fee'])])}}">Genrate Invoice</a>
                                                @endif
                                             @endif   
                                        </div>
                                    </div>
                                </div>
                                @endif
                                 
                            </div>
                            <div class="row " style="padding: 5px;">
                                
                               
                            </div>
                            <!-- <div class="row  capitalize">
                                <div class="col-md-4 " >
                                    <strong>Additional Details: </strong>
                                </div>
                                <div class="col-md-8 " >
                                    {{$student['detail']}}
                                </div>
                            </div> -->
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card uniStyle">
             <?php
            $hasCollegeId = [];
            $hasCardCollegeId = [];
            $totalAppFee = 0;
            ?>
            @foreach($studentCourseApplyFors as $key=> $studentCourseApplyFor)
            @if($studentCourseApplyFor['isChecked'] == 'yes')
            @if($studentCourseApplyFor->college['isCardRequired'] == 'yes')
                @if(!in_array($studentCourseApplyFor->college['id'],$hasCardCollegeId))
                    <?php
                    $hasCardCollegeId[] = $studentCourseApplyFor->college['id'];
                      (int)$totalAppFee += (int)$studentCourseApplyFor->college['application_fee'];
                    ?>
                @endif
            @endif
            @endif
            @endforeach
            <div class="card-body">
                <div id="headingOne" class="card-header">
                    <button type="button"  class="text-left m-0 p-0 btn btn-link btn-block ">
                        <h5 class="m-0 p-0 text-default-color">Selected Programs 
                            @if($totalAppFee > 0)
                            <span style="color: black;">| </span><span>Total Payable Fee<span style="color: black;"> =</span> </span><strong class="text-success">$ {{$totalAppFee}}</strong>
                            @endif

                        </h5>
                    </button>
                    @if($student['lock_status'] != 1)
                    @if($studentCourseApplyFors->count()>0)
                    <form method="POST" action="{{route('verify.applyFor')}}" > 
                            @csrf
                            <input type="hidden" name="studentId" class="studentId" value="{{$student['id']}}">
                        <button  class=" btn btn-warning  btn-default-color" style="width: 150px;">
                            Edit Programs 
                        </button>
                    </form>
                    @endif
                    @endif
                </div>
                <div data-parent="#accordion" id="collapseOne1" aria-labelledby="headingOne" class="collapse show" style="">
                    @if($studentCourseApplyFors->count()>0)
                    <ul class="todo-list-wrapper list-group list-group-flush" id="exampleAccordion">
                        @foreach($studentCourseApplyFors as $key=> $studentCourseApplyFor)
                        @if($studentCourseApplyFor->course)
                        <li class="list-group-item {{  ($studentCourseApplyFor['isChecked'] == 'yes' ? 'selecteditemColor' : 'notSelected') }}" >
                            <div class="todo-indicator bg-success"></div>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left flex2">
                                        <div class="widget-heading parent">
                                            @if($student['lock_status'] != 1)
                                           <label class="containerCheckBox"><h5 style="color:#3f6ad8;"> <strong> {{$studentCourseApplyFor->course['name']}}</strong>
                                               
                                                @if($studentCourseApplyFor->course)
                                                <a href="{{$studentCourseApplyFor->course->college['website_link']}}" target="_blank"> <i class="fa fa-link"></i></a>
                                                @endif
                                                 &nbsp; 
                                                    
                                                @if($studentCourseApplyFor['paid_applications_fee'])<span class="" style="color: black;">| <small> {{$student->country['currency_icon_name']}}&nbsp;  {{$studentCourseApplyFor['paid_applications_fee']}}<span class="" style="color: black;">| <small> <b class="text-success"> Paid </b></small>
                                                </span></small></span>
                                                @endif
                                                 @if($studentCourseApplyFor['file_status'] == '13')
                                                
                                                <a href="{{route('change.course',[$studentCourseApplyFor['student_id'],$studentCourseApplyFor['course_id']])}}" class="btn btn-info text-white">Change Program</a>
                                            
                                            @endif    
                                            </h5>
                                                    <input id="isChecked" type="checkbox" name="isChecked" class="isChecked mb-2 displayNone"    {{  ($studentCourseApplyFor->isChecked == 'yes' ? 'checked' : '') }} >   
                                            <input type="hidden" name="application_id" value="{{base64_encode($studentCourseApplyFor['id'])}}" class="application_id">
                                                    <span class="checkmarked"></span>
                                                </label>
                                                @else
                                                <h5 style="color:#3f6ad8;"> <strong> {{$studentCourseApplyFor->course['name']}}</strong>
                                               
                                                @if($studentCourseApplyFor->course)
                                                <a href="{{$studentCourseApplyFor->course->college['website_link']}}" target="_blank"> <i class="fa fa-link"></i></a>
                                                @endif
                                                 &nbsp; 
                                                    
                                                @if($studentCourseApplyFor['paid_applications_fee'])<span class="" style="color: black;">| <small> {{$student->country['currency_icon_name']}}&nbsp;  {{$studentCourseApplyFor['paid_applications_fee']}} <span class="" style="color: black;">| <small><b class="text-success"> Paid </b></small>
                                                </span></small></span>
                                                @endif
                                                 @if($studentCourseApplyFor['file_status'] == '13')
                                                
                                                <a href="{{route('change.course',[$studentCourseApplyFor['student_id'],$studentCourseApplyFor['course_id']])}}" class="btn btn-info text-white">Change Program</a>
                                            
                                            @endif    
                                            </h5>   
                                                @endif
                                        <div class="uniStyleDiv">
                                            <span class="badge badge-pill badge-warning" style="background: #7862a247; "><strong class="strongFadeColor ">University: </strong><span class="strongFadeColor ">
                                                @if($studentCourseApplyFor->course)
                                                {{$studentCourseApplyFor->course->college['name']}}</span></span>
                                                @if($studentCourseApplyFor->college['application_fee'])&nbsp;
                                                <span class=" badge badge-danger">
                                                    
                                                <strong class="strongFadeColor " style="color: #7862a2;" >University Fee: </strong>
                                                 {{$student->country['currency_icon_name']}}&nbsp;{{$studentCourseApplyFor->college['application_fee']}}&nbsp;
                                                </span>
                                                @endif
                                                @endif
                                            @if($student['lock_status'] == 1)
                                            @if($studentCourseApplyFor->applicationStatus['id'] == 1 || $studentCourseApplyFor->applicationStatus['id'] == 15)
                                            <div class=" badge badge-danger" >
                                                <strong class="">Status :</strong>
                                                {{$studentCourseApplyFor->applicationStatus['name']}}
                                                <!-- <span class="float-right">|</span> -->
                                            </div>
                                            @else
                                            <div class="badge badge-success" >
                                                <strong class="">Status :</strong>
                                                {{$studentCourseApplyFor->applicationStatus['name']}}
                                                <!-- <span class="float-right">|</span> -->
                                            </div>
                                            @endif
                                            @endif
                                            <!-- <div class="badge badge-warning" > -->
                                                <!-- <strong class="">Course :</strong> -->
                                                <!-- {{$studentCourseApplyFor->course['course_unique_id']}} -->
                                                <!-- <span class="float-right">|</span> -->
                                            <!-- </div> -->
                                        </div>
                                        </div>
                                        <div class="row">
                                            <div class=" col-md-5 capitalize strongFadeColor "><strong >Subject :</strong>
                                                @if($studentCourseApplyFor->course)
                                                {{ substr($studentCourseApplyFor->course->subjects['name'],0,35)}}...
                                                @endif
                                                <span class="float-right">|</span>
                                            </div>
                                            
                                            <div class=" col-md-3 strongFadeColor" >

                                                <strong class="strongFadeColor">Program title :</strong>
                                                @if($studentCourseApplyFor->course)
                                                {{substr($studentCourseApplyFor->course->programTitle['name'],0,10)}} &nbsp; 
                                                @endif
                                                <span class="float-right">|</span>
                                            </div>
                                            <div class=" col-md-2 strongFadeColor" >
                                                <strong class="strongFadeColor">Intake :</strong>
                                                @if($studentCourseApplyFor->course)
                                                    @if($studentCourseApplyFor['change_intake'])
                                                     {{$studentCourseApplyFor->change_intakes['name']}}
                                                    @else
                                                     {{$studentCourseApplyFor->course->intakes['name']}}
                                                    @endif
                                                @endif
                                                <span class="float-right">|</span>
                                            </div>
                                            
                                            <div class=" col-md-2 strongFadeColor">
                                                @if($studentCourseApplyFor->pendencies->count() > 0)
                                                <a href="{{route('student.viewApplicationPendencies',base64_encode($studentCourseApplyFor['id']))}}"><strong class="">Pendencies : </strong><span class="badge badge-pill badge-danger"> {{$studentCourseApplyFor->pendencies->count()}}</span></a>&nbsp;
                                                @else
                                                <strong class="strongFadeColor">Pendencies : </strong><span class="badge badge-pill badge-success"> {{$studentCourseApplyFor->pendencies->count()}}</span>&nbsp;
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="badge badge-warning mr-2"></div>
                                    </div>
                                    <!-- <a href="{{route('student.track.View',base64_encode($studentCourseApplyFor['id']))}}" class="btn btn-sm btn-info mb-4">Track</a> -->
                                    @if(Auth::guard('student')->check() === false)
                                    <a href="{{route('student.application.View',base64_encode($studentCourseApplyFor['id']))}}" class="btn btn-sm btn-info mb-4 btn-default-color" > View </a>
                                    @else
                                    <a href="{{route('applicant.student.application.View',base64_encode($studentCourseApplyFor['id']))}}" class="btn btn-sm btn-info mb-4 btn-default-color" > View </a>
                                    @endif
                                    <div class="widget-content-right">
                                        <button type="button" class="border-0 btn-transition btn btn-outline-success m-0 p-0 btn btn-link" aria-expanded="false" aria-controls="exampleAccordion" data-toggle="collapse" :href="'#collapseExample'+course.id" >
                                            <!-- <fa name="check" _nghost-c2=""><i _ngcontent-c2="" aria-hidden="true" class="fa fa-arrow-down"></i></fa> -->
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    @else
                    <div class="text-center"><br>
                        <p class="text-center">You have not selected any programs Admitly will select appropriate program and update here.</p>
                        <h1>{{$student['student_status']}}</h1>
                        <h3>{{$student['reason']}}</h3>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($pendancyAttachments->count()>0 || $otherAttachments->count() > 0 || $otherAdminDocAttachments->count() > 0)
    <div class=" col-md-12 pdf pendencyDoc">
        <div class="card">
            <div class="card-body">
                <div id="headingOne" class="card-header">
                    <button type="button" class="text-left m-0 p-0 btn btn-link btn-block ">
                        <h5 class="m-0 p-0 text-default-color">Pendancy Document @if ($errors->has('file'))
                            <span class="invalid-feedback" style="display: block!important;" role="alert">
                            <strong>{{ $errors->first('file') }}</strong>
                            </span>
                            @endif
                        </h5>
                    </button>
                </div>
                <div >
                    <div class="senSecImg">
                        <br>
                        @if($pendancyAttachments->count()>0 || $otherAttachments->count() > 0 || $otherAdminDocAttachments->count() > 0)
                        <div class="row">
                            @foreach($otherAdminDocAttachments as $key=> $otherAdminDocAttachment)
                            @if($otherAdminDocAttachment['status'] == 10)
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$otherAdminDocAttachment['title']}}</h5>
                                    </div>
                                    <div class="boxImg" >
                                        @if($otherAdminDocAttachment['name'])
                                        <a href="{{asset($otherAdminDocAttachment['path'].'/'.$otherAdminDocAttachment['name'])}}" download>
                                            <div class="downloadHover"><i class="fa fa-download download" style="color: #7862a2!important;" aria-hidden="true"></i></div>
                                            <img width="100%" style="padding-top: 15px;" src="{{asset('images/site/pdfIcon.png')}}" alt="Card image cap" >
                                        </a>
                                        @else
                                        <div class="downloadHover"><a href="{{route('pendancyAttachments.delete',$otherAdminDocAttachment['id'])}}"><i class="fa fa-trash download" aria-hidden="true"></i></a></div>
                                        <img width="100%" style="padding-top: 15px;" src="{{asset('images/site/pdfIcon.png')}}" alt="Card image cap" >
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 pendancyP">
                                                @if($otherAdminDocAttachment['status'] == 3)
                                                <div class="text-danger">
                                                    <label><strong class="text-secondary">Document: </strong>Rejected</label>
                                                    <p><strong class="text-secondary">Reason: </strong>{{$otherAdminDocAttachment['reason']}}</p>
                                                </div>
                                                @endif    
                                                @if($otherAdminDocAttachment['status'] == 2)
                                                <div class="text-success">
                                                    <label><strong class="text-secondary">Document: </strong>Accepted <i class="fa fa-check " aria-hidden="true"></i></label>
                                                </div>
                                                @endif    
                                                <div class="row">
                                                    <form method="POST" enctype="multipart/form-data" action="{{route('pendancyAttachments.update',$otherAdminDocAttachment['id'])}}"  >@csrf 
                                                        <label class="btn btn-success btn btn-default-color" onchange="javascript:this.form.submit()">Upload Document
                                                        <i class="fa fa-upload " aria-hidden="true"></i><input type="file" name="file" class="displayNone">
                                                        </label><input type="hidden" name="studentId" value="{{$student['id']}}">
                                                    </form>
                                                </div>
                                                <p class="capitalize"> {{$otherAdminDocAttachment['comment']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$otherAdminDocAttachment['title']}}</h5>
                                    </div>
                                    <div class="boxImg" >
                                        @if($otherAdminDocAttachment['name'])
                                        <a href="{{asset($otherAdminDocAttachment['path'].'/'.$otherAdminDocAttachment['name'])}}" download>
                                            <div class="downloadHover"><i class="fa fa-download download" style="color: #7862a2!important;" aria-hidden="true"></i></div>
                                            
                                        </a>
                                        @else
                                        <div class="downloadHover"><a href="{{route('pendancyAttachments.delete',$otherAdminDocAttachment['id'])}}"><i class="fa fa-trash download" aria-hidden="true"></i></a></div>
                                        
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 pendancyP">
                                                @if($otherAdminDocAttachment['status'] == 3)
                                                <div class="text-danger">
                                                    <label><strong class="text-secondary">Document: </strong>Rejected</label>
                                                    <p><strong class="text-secondary">Reason: </strong>{{$otherAdminDocAttachment['reason']}}</p>
                                                </div>
                                                <div class="row">
                                                    <form method="POST" enctype="multipart/form-data" action="{{route('pendancyAttachments.update',$otherAdminDocAttachment['id'])}}"  >@csrf 
                                                        <label class="btn btn-success btn-default-color" onchange="javascript:this.form.submit()">Upload Document
                                                        <i class="fa fa-upload text-default-color" aria-hidden="true"></i><input type="file" name="file" class="displayNone">
                                                        </label><input type="hidden" name="studentId" value="{{$student['id']}}">
                                                    </form>
                                                </div>
                                                @endif    
                                                @if($otherAdminDocAttachment['status'] == 2)
                                                <div class="text-success">
                                                    <label><strong class="text-secondary">Document: </strong>Accepted <i class="fa fa-check " aria-hidden="true"></i></label>
                                                </div>
                                                @endif    
                                                <p> {{$otherAdminDocAttachment['comment']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @foreach($pendancyAttachments as $key=> $pendancyAttachment)
                            <div class="col-md-12 mb-2">

                                <ul class="list-group ">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        
                                            <div class="col-md-4">
                                                <h5 class="card-title">{{$pendancyAttachment->qualification['qualification_grade']}}</h5>
                                                <h5 class="card-subtitle">{{$pendancyAttachment->applicationCourse['name']}}</h5>
                                            </div>
                                              <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @if($pendancyAttachment['status'] == 3)
                                                        <div class="text-danger">
                                                            <label><strong class="text-secondary">Document: </strong>Rejected</label>
                                                            <p><strong class="text-secondary">Reason: </strong>{{$pendancyAttachment['reason']}}</p>
                                                        </div>
                                                        @endif
                                                        @if($pendancyAttachment['status'] == 2)
                                                        <div class="text-success">
                                                            <label><strong class="text-secondary">Document: </strong>Accepted <i class="fa fa-check " aria-hidden="true"></i></label>
                                                        </div>
                                                        @endif  
                                                        <p>{{$pendancyAttachment['comment']}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4" >
                                                @if($pendancyAttachment['status'] != 2)
                                                <div class="downloadHover">
                                                    <form method="POST" enctype="multipart/form-data" action="{{route('pendancyAttachments.update',$pendancyAttachment['id'])}}"  >@csrf 
                                                        <label class="download" onchange="javascript:this.form.submit()">
                                                        <i class="fa fa-upload text-default-color" aria-hidden="true"></i><input type="file" name="file" class="displayNone">
                                                        </label><input type="hidden" name="studentId" value="{{$student['id']}}">
                                                    </form>
                                                </div>
                                                @endif
                                                
                                            </div>
                                          
                                        
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                            @foreach($otherAttachments as $key=> $otherAttachment)
                            <div class="col-md-12 mb-2">

                                <ul class="list-group ">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                    
                                        <div class="col-md-4">
                                            <h5 class="card-title">{{$otherAttachment['title']}}</h5>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @if($otherAttachment['status'] == 3)
                                                    <div class="text-danger">
                                                        <label><strong class="text-secondary">Document: </strong>Rejected</label>
                                                        <p><strong class="text-secondary">Reason: </strong>{{$otherAttachment['reason']}}</p>
                                                    </div>
                                                    @endif
                                                    @if($otherAttachment['status'] == 2)
                                                    <div class="text-success">
                                                        <label><strong class="text-secondary">Document: </strong>Accepted <i class="fa fa-check " aria-hidden="true"></i></label>
                                                    </div>
                                                    @endif  
                                                    <p>{{$otherAttachment['comment']}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" >
                                            @if($otherAttachment['status'] != 2)
                                            <div class="downloadHover">
                                                <form method="POST" enctype="multipart/form-data" action="{{route('pendancyAttachments.update',$otherAttachment['id'])}}"  >@csrf 
                                                    <label class="download" onchange="javascript:this.form.submit()">
                                                    <i class="fa fa-upload text-default-color" aria-hidden="true"></i><input type="file" name="file" class="displayNone">
                                                    </label><input type="hidden" name="studentId" value="{{$student['id']}}">
                                                </form>
                                            </div>
                                            @endif
                                            
                                        </div>
                                   
                                </li>
                                </ul>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="text-center">
                            <p class="text-center">No Qualification </p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif 
    <!-- @if($applicationDocuments->count()>0 )
    <div class=" col-md-12">
        <div class="card">
            <div class="card-body">
                <div id="headingOne" class="card-header">
                    <button type="button" class="text-left m-0 p-0 btn btn-link btn-block ">
                        <h5 class="m-0 p-0 ">Offer Letter</h5>
                    </button>
                </div>
                <div >
                    <div class="senSecImg">
                        <br>
                        @if($applicationDocuments->count()>0)
                        <div class="row">
                            @foreach($applicationDocuments as $key=> $applicationDocument)
                            <div class="col-md-4">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Offer Letter</h5>
                                    </div>
                                    <div class="boxImg" >
                                        <a href="{{asset($applicationDocument['path'].'/'.$applicationDocument['name'])}}" download>
                                            <div class="downloadHover"><i class="fa fa-download download" style="color: #7862a2!important;" aria-hidden="true"></i></div>
                                            <img width="100%" style="padding: 30px;" src="{{asset($applicationDocument['path'].'/'.$applicationDocument['name'])}}" alt="Card image cap" >
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>{{$applicationDocument['comment']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="text-center">
                            <p class="text-center">No Qualification </p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif  -->
    @if($student['applingForCountry'] != '230')
     @if($paymentscreenshot)
     <div class=" col-md-12 pdf mb-3">
            <div class="card">
                <div class="card-body">
                    <div id="headingOne" class="card-header">
                        <button type="button" class="text-left m-0 p-0 btn btn-link btn-block ">
                            <h5 class="m-0 p-0 text-default-color">Paid amount</h5>
                        </button>
                    </div>
                    <div>
                        <div class="senSecImg">
                            <br> @if($paymentscreenshot)
                            <div class="row listMainGroup">
                                
                                <div class="col-md-12 mb-2">
                                    <ul class="list-group zoom">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div class="col-md-5">
                                                <div>
                                                    <strong>Paid Amount Image</strong>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <img src="{{$paymentscreenshot['path']}}{{$paymentscreenshot['name']}}">
                                                
                                            </div>
                                            <div class="col-md-3">
                                                
                                                <a href="{{asset($paymentscreenshot['path'].''.$paymentscreenshot['name'])}}" download><div class="downloadHover"><i class="fa fa-download download" style="color: #7862a2!important;" aria-hidden="true"></i></div></a>
                                                @if($student['lock_status'] == 1)
                                                <a class="btn btn-warning" href="{{route('payment.invoice',[base64_encode($student['id']),base64_encode($student['application_total_fee'])])}}">Genrate Invoice</a>
                                                @endif
                                            </div>
                                            
                                        </li>
                                    </ul>
                                </div>
                                
                            </div>
                            @else
                            <div class="text-center">
                                <p class="text-center">No Verify amount.</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif
    <div class=" col-md-12 pdf">
        <div class="card">
            <div class="card-body">
                <div id="headingOne" class="card-header">
                    <button type="button" data-toggle="collapse" data-target="#collapseOneQ" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block ">
                        <h5 class="m-0 p-0 text-default-color">Qualification</h5>
                    </button>
                </div>
                <div >
                    <div class="senSecImg">
                        <br>
                        <?php
                        $qlfyDocumentCheck = [];
                        ?>
                        @if($studentQualifications->count()>0)
                        <div class="row listMainGroup">
                            @foreach($studentQualifications as $key=> $studentQualification)
                            <?php
                            if($studentQualification->qualificationDocuments){
                                $qlfyDocumentCheck[] = $studentQualification->qualificationDocuments;
                            }
                            ?>
                            <div class="col-md-12 mb-2">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="col-md-5">
                                            <div >
                                                <strong>Level: </strong>{{$studentQualification->qualification['qualification_grade']}}
                                            </div>
                                        </div>
                                            
                                        <div class="col-md-5">
                                           
                                            <div >
                                                <strong>Total: </strong>{{$studentQualification->totals['name']}}
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="{{asset($studentQualification->qualificationDocuments['path'].'/'.$studentQualification->qualificationDocuments['name'])}}" download>
                                                <div class="downloadHover"><i class="fa fa-download download" style="color: #7862a2!important;" aria-hidden="true"></i></div>
                                            </a>
                                            <?php
                                            $data['path'] = $studentQualification->qualificationDocuments['path'];
                                            $data['name'] = $studentQualification->qualificationDocuments['name'];
                                            ?>
                                            <form method="POST" action="{{route('pdf.view')}}"  target="_blank">
                                                @csrf
                                             <input type="hidden" name="name"   value="{{$data['name']}}">
                                             <input type="hidden" name="path"   value="{{$data['path']}}">
                                             <button class="btn btn-info btn-default-color" target="_blank">View Pdf</button>
                                            </form>
                                        </div>
                                        
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="text-center">
                            <p class="text-center">No Qualification </p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($student['applingForCountry'] == '230')
    <div class=" col-md-12 pdf">
        <div class="card">
            <div class="card-body">
                <div id="headingOne" class="card-header">
                    <button type="button" data-toggle="collapse" data-target="#collapseOneQ" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block ">
                        <h5 class="m-0 p-0 text-default-color">Additional Documents</h5>
                    </button>
                </div>
                <div >
                    <div class="senSecImg">
                        <br>
                        
                        <div class="row listMainGroup">
                            @if($studentLor)
                           
                             <div class="col-md-12 mb-2">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="col-md-9">
                                           LOR (Letter Of Recommendation)
                                        </div>
                                         <div class="col-md-3">
                                           <a href="{{asset($studentLor['path'].'/'.$studentLor['name'])}}" download>
                                            <div class="downloadHover"><i class="fa fa-download download" style="color: #7862a2!important;" aria-hidden="true"></i></div>
                                            
                                        </a>
                                            <?php
                                            $data['path'] = $studentLor['path'];
                                            $data['name'] = $studentLor['name'];
                                            ?>
                                            <form method="POST" action="{{route('pdf.view')}}"  target="_blank">
                                                @csrf
                                             <input type="hidden" name="name"   value="{{$data['name']}}">
                                             <input type="hidden" name="path"   value="{{$data['path']}}">
                                             <button class="btn btn-info btn-default-color" target="_blank">View Pdf</button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            @if($studentMoi)
                           
                            <div class="col-md-12 mb-2">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="col-md-9">
                                           MOI (Medium Of Instruction)
                                        </div>
                                        <div class="col-md-3">
                                           <a href="{{asset($studentMoi['path'].'/'.$studentMoi['name'])}}" download>
                                            <div class="downloadHover"><i class="fa fa-download download" style="color: #7862a2!important;" aria-hidden="true"></i></div>
                                            
                                        </a>

                                        <?php
                                            $data['path'] = $studentMoi['path'];
                                            $data['name'] = $studentMoi['name'];
                                            ?>
                                            <form method="POST" action="{{route('pdf.view')}}"  target="_blank">
                                                @csrf
                                             <input type="hidden" name="name"   value="{{$data['name']}}">
                                             <input type="hidden" name="path"   value="{{$data['path']}}">
                                             <button class="btn btn-info btn-default-color" target="_blank">View Pdf</button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            @if($studentSop)
                           
                           <div class="col-md-12 mb-2">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="col-md-9">
                                           SOP (Statement Of Purpose)
                                        </div>
                                        <div class="col-md-3">
                                           <a href="{{asset($studentSop['path'].'/'.$studentSop['name'])}}" download>
                                            <div class="downloadHover"><i class="fa fa-download download" style="color: #7862a2!important;" aria-hidden="true"></i></div>
                                            
                                        </a>
                                        <?php
                                            $data['path'] = $studentSop['path'];
                                            $data['name'] = $studentSop['name'];
                                            ?>
                                            <form method="POST" action="{{route('pdf.view')}}"  target="_blank">
                                                @csrf
                                             <input type="hidden" name="name"   value="{{$data['name']}}">
                                             <input type="hidden" name="path"   value="{{$data['path']}}">
                                             <button class="btn btn-info btn-default-color" target="_blank">View Pdf</button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            @endif
                           
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<div class="row ">
<div  class=" col-md-12 pdf listMainGroup">
    <div class="card">
        <div class="card-body">
            <div id="headingOne" class="card-header">
                <button type="button"  class="text-left m-0 p-0 btn btn-link btn-block ">
                    <h5 class="m-0 p-0 text-default-color">Passport</h5>
                </button>
            </div>
            <div data-parent="#accordion" id="collapseOneT" aria-labelledby="headingOne" class="collapse show" style="">
                <div class="senSecImg">
                    <br>
                    @if($student->passport)
                    <div class="row">
                        <div class="col-md-12 mb-2">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="col-md-9">
                                           Passport 
                                        </div>
                                        <div class="col-md-3">
                                           <a href="{{asset($student->passport['path'].'/'.$student->passport['name'])}}" download>
                                            <div class="downloadHover"><i class="fa fa-download download" style="color: #7862a2!important;" aria-hidden="true"></i></div>
                                            
                                        </a>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                        @else
                        <div class="text-center">
                            <p class="text-center">No Passport Added .</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row ">
<div  class=" col-md-12 pdf listMainGroup">
    <div class="card">
        <div class="card-body">
            <div id="headingOne" class="card-header">
                <button type="button"  class="text-left m-0 p-0 btn btn-link btn-block ">
                    <h5 class="m-0 p-0 text-default-color">Date of birth</h5>
                </button>
            </div>
            <div data-parent="#accordion" id="collapseOneT" aria-labelledby="headingOne" class="collapse show" style="">
                <div class="senSecImg">
                    <br>
                    @if($student->dobDoc)
                    <div class="row">
                        <div class="col-md-12 mb-2">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="col-md-9">
                                           Date of birth 
                                        </div>
                                        <div class="col-md-3">
                                           <a href="{{asset($student->dobDoc['path'].'/'.$student->dobDoc['name'])}}" download>
                                            <div class="downloadHover"><i class="fa fa-download download" style="color: #7862a2!important;" aria-hidden="true"></i></div>
                                            
                                        </a>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                        @else
                        <div class="text-center">
                            <p class="text-center">No Date of birth documnt available .</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-12 pdf">
    <div class="card">
        <div class="card-body">
            <div id="headingOne" class="card-header">
                <button type="button"  class="text-left m-0 p-0 btn btn-link btn-block ">
                    <h5 class="m-0 p-0 text-default-color">English Qualification Tests</h5>
                </button>
            </div>
            <div data-parent="#accordion" id="collapseOneT" aria-labelledby="headingOne" class="collapse show" style="">
                <div class="senSecImg">
                    <br>
                    @if($studentEnglishTests->count()>0)
                    <div class="row">
                        @foreach($studentEnglishTests as $key=> $studentEnglishTest)
                        <div class="col-md-12 mb-2">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="col-md-3">
                                            <div >
                                                <strong>Test: </strong>{{$studentEnglishTest->englishTests['name']}}
                                            </div>
                                           
                                           
                                        </div>
                                        <div class="col-md-4">
                                            <div >
                                                <strong>Score: </strong>{{$studentEnglishTest->ieltstotalScores['name']}}
                                            </div>
                                           
                                           
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <div>
                                                <strong>Overall Score: </strong> {{$studentEnglishTest['overAll']}}
                                            </div>
                                            <div>
                                                @if($studentEnglishTest->totalScores)
                                                    @if($studentEnglishTest->totalScores['score'])
                                                    <strong>Score: </strong> {{$studentEnglishTest->totalScores['score']}}
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                           <a href="{{asset($studentEnglishTest->englishTestDocuments['path'].'/'.$studentEnglishTest->englishTestDocuments['name'])}}" download>
                                            <div class="downloadHover"><i class="fa fa-download download" style="color: #7862a2!important;" aria-hidden="true"></i></div>
                                            
                                        </a>
                                        </div>
                                    </li>
                                </ul>
                        </div>
                        @endforeach
                        @else
                        <div class="text-center">
                            <p class="text-center">No Qualification Test </p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
   <div class="row ">
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div id="headingOne" class="card-header">
                <button type="button"  class="text-left m-0 p-0 btn btn-link btn-block ">
                    <h5 class="m-0 p-0 text-default-color">Work Experience</h5>
                </button>
            </div>
            <div data-parent="#accordion" id="collapseOneW" aria-labelledby="headingOne" class="collapse show" style="">
                <div class="senSecImg ">
                    <br>
                    @if($studentWorkExperiances->count()>0)
                    <div class="row">
                        @foreach($studentWorkExperiances as $key=> $studentWorkExperiance)
                        <div class="col-md-12 mb-2">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="col-md-3">
                                        <div >
                                            <strong>Organisation: </strong>{{$studentWorkExperiance['organization']}}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div >
                                            <strong>Designation: </strong> {{$studentWorkExperiance['designation']}}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                            <strong> From Date: </strong> {{$studentWorkExperiance['fromDate']}}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div>
                                            <strong>To Date: </strong> {{$studentWorkExperiance['toDate']}}
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                        @else
                        <div class="text-center">
                            <p class="text-center">No Work Experience </p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div id="headingOne" class="card-header">
                    <button type="button"  class="text-left m-0 p-0 btn btn-link btn-block ">
                        <h5 class="m-0 p-0 text-default-color">Academic Gap</h5>
                    </button>
                </div>
                <div data-parent="#accordion" id="collapseOneAG" aria-labelledby="headingOne" class="collapse show" style="">
                    <div class="senSecImg ">
                        <br>
                        <div class="row">
                        @if($studentQualificationGaps->count()>0)
                            @foreach($studentQualificationGaps as $key=> $studentQualificationGap)
                            <div class="col-md-12 mb-2">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="col-md-3">
                                            <div >
                                                <strong>From Date:</strong> {{$studentQualificationGap['fromDate']}}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div >
                                                <strong>To Date:</strong> {{$studentQualificationGap['toDate']}}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div>
                                                {{$studentQualificationGap['organization']}}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                            @else
                            <div class="col-md-12">
                                <p class="text-center">No Qualification Gap </p>
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=" row">
        <div class=" col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id="headingOne" class="card-header">
                        <button type="button"  class="text-left m-0 p-0 btn btn-link btn-block ">
                            <h5 class="m-0 p-0 text-default-color">Questions</h5>
                        </button>
                    </div>
                    <div data-parent="#accordion" id="collapseOneAG" aria-labelledby="headingOne" class="collapse show" style="">
                        <div class="senSecImg ">
                            <br>
                            @if($studentQuestionAnswers->count()>0)
                            <div class="row">
                                @foreach($studentQuestionAnswers as $key=> $studentQuestionAnswer)
                                <div class="col-md-4">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <h6><strong>Q: </strong> {{$studentQuestionAnswer->questions->question['question']}}</h6>
                                            <span class="capitalize"><strong>A: </strong> {{$studentQuestionAnswer['answer']}}</span>
                                            @if($studentQuestionAnswer['answer'] == 'yes')
                                            <span>! {{$studentQuestionAnswer['detail']}}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="text-center">
                                    <p class="text-center">No Question </p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary finalPop hide" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
    

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog appendCheckedPOP" role="document" style="top:50px;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Applicatiions requirement <small><span id="isNotDocUpload"></span></small></h5>
            <button type="button" id="paymentpopClose" class=" close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="height: 350px;
    overflow-y: scroll;">
            
            @if($studentCourseApplyFors->count() > 0)
            <?php
            $hasCollegeId = [];
            $hasCardCollegeId = [];
            $totalAppFee = 0;
            ?>
            @foreach($studentCourseApplyFors as $key=> $studentCourseApplyFor)
            @if($studentCourseApplyFor['isChecked'] == 'yes')
            @if($studentCourseApplyFor->college['isCardRequired'] == 'yes')
                @if(!in_array($studentCourseApplyFor->college['id'],$hasCardCollegeId))
                    <?php
                    $hasCardCollegeId[] = $studentCourseApplyFor->college['id'];
                      (int)$totalAppFee += (int)$studentCourseApplyFor->college['application_fee'];
                    ?>
                @endif
            @endif
            @if($studentCourseApplyFor->college['isDocumentRequired'] == 'yes')
            @if(!in_array($studentCourseApplyFor->college['id'],$hasCollegeId))
            <?php
            $hasCollegeId[] = $studentCourseApplyFor->college['id'];
            
            ?>
            <form method="post" class="uploadSignedDoc">
            @csrf
            <input type="hidden" name="sign_student_id" value="{{$student['id']}}">
            <input type="hidden" name="applicationId" value="{{$studentCourseApplyFor['id']}}">
            <input type="hidden" name="college_id" value="{{$studentCourseApplyFor['college_id']}}">
              <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label  class="col-form-label">Download signed document:</label>
                    <small>{{$studentCourseApplyFor->college['name']}}</small>
                    <a href="{{asset($studentCourseApplyFor->college->collegeSignedDocuments['path'].'/'.$studentCourseApplyFor->college->collegeSignedDocuments['name'])}}" target="_blank" download>
                        <div class="downloadHover"><i class="fa fa-download download" style="color: #7862a2!important;" style="float: left;" aria-hidden="true"></i></div>
                    </a>
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Upload signed document:</label>
                    <small>{{$studentCourseApplyFor->college['name']}}</small><br>
                    <label class="btn btn-info ">
                        <i class="fa fa-upload" ></i>
                        <input type="file" name="clgSignedDoc" class="mb-2 hide form-control " accept="application/pdf" >
                    </label>
                    
                    @if(in_array($studentCourseApplyFor['college_id'],$applicationclgSignedDocDocuments))
                    <span class="text-success">Uploaded</span>
                    @endif
                    <div class="error"></div>
                  </div>
                  </div>
              </div>
            </form>
              @endif
              @endif
              @endif
              @endforeach
              @endif
            <hr>
            <div class="text-center">
                <label>Total Applications Fee</label>
                <h2><small>{{$student->country['currency_icon_name']}}</small> {{$totalAppFee}}</h2>
            
            </div>
          </div>
          <div class="modal-footer">
            
                <span><b>Total Applications Fee : <small>{{$student->country['currency_icon_name']}}</small> {{$totalAppFee}}</b></span>
            <a href="javascript:;" id="paymentcompleteApplication" class="btn btn-warning" style="background: linear-gradient(rgb(231, 120, 23), rgb(216, 13, 5)); color: white;">Proceed to pay</a>
          </div>
        </div>
      </div>
    </div>
     @if($IsCheckedStudentCourseApplyFors->count()>0)
    @include('agent/student/finalSubmitbutnpopup')
    @endif
</div>      
     @if(Auth::guard('student')->check() === false)
     @if($student['lock_status'] == 1 || $student['IsShortlisting'] == 'yes')
    <div class="appChat"><a href="{{route('agent.student.chat.show',base64_encode($student['id']))}}"><i class="fas fa-comment-alt fa-2x" style="margin: -13px; margin-right: 1px; font-size: 2.2rem!important;"></i></a></div>
     @endif
     @endif
</div>
@endsection
@section('addjavascript')
<noscript>
    <script src="{{ asset('js/app.js') }}" ></script>
</noscript>

<script type="text/javascript">
    var perfEntries = performance.getEntriesByType("navigation");

if (perfEntries[0].type === "back_forward") {
    location.reload(true);
}

    $(document).on('click','.isChecked',function(){
        $('#completeApplication').hide();
        $('#completeApplicationPOP').hide();
        $body = $("body");
    $body.addClass("loading");
        var application_id = $(this).siblings('.application_id').val();
        var student_id = $('#student_id').val();
        
        $.ajax(
        {
            type:'get',
            url:'/agent/isChecked/'+application_id,
            success:function(result)
            {
                $body.removeClass("loading");
                // console.log(result);
                        window.location.reload();
                // $.ajax(
                // {
                //     type:'get',
                //     url:'/agent/getpopup/isChecked/'+student_id,
                //     success:function(result)
                //     {
                //         console.log(result);
                       
                        
                //     },
                // });
               
                
            },
        });
    });
</script>
@endsection