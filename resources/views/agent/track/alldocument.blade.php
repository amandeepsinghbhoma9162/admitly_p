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
</style>
<div class="container-fluid" id="container">
<div class="row ">
    <input type="hidden" name="" value="{{$student['id']}}" id="student_id">
    @if($hasAttachs->count()>0)
    <div class=" col-md-12 pdf pendencyDoc">
        <div class="card">
            <div class="card-body">
                <div id="headingOne" class="card-header">
                    <button type="button" class="text-left m-0 p-0 btn btn-link btn-block ">
                        <h5 class="m-0 p-0 text-default-color">Shortlisting @if ($errors->has('file'))
                            <span class="invalid-feedback" style="display: block!important;" role="alert">
                            <strong>{{ $errors->first('file') }}</strong>
                            </span>
                            @endif
                        </h5>
                    </button>
                </div>
            </div>
            <div class="col-md-12 mb-2">
            <ul class="list-group ">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="col-md-4">
                        <h5 class="card-title">All Documents</h5>
                        <h5 class="card-subtitle"></h5>
                    </div>
                      <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-danger">
                                </div>
                                <div class="text-success">
                                </div>
                         </div>   
                        </div>
                    </div>
                    <div class="col-md-4" >
                        @foreach($hasAttachs as $hasAttach)
                        @if($hasAttach)
                        <a href="{{asset($hasAttach['path'].'/'.$hasAttach['name'])}}" download>
                            <div class="downloadHover"><i class="fa fa-download download" aria-hidden="true"></i></div>
                        </a>
                        @endif
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
   @endif                      
    @if($messages->count()>0)
    <div class=" col-md-12 pdf pendencyDoc">
        <div class="card">
            <div class="card-body">
                <div id="headingOne" class="card-header">
                    <button type="button" class="text-left m-0 p-0 btn btn-link btn-block ">
                        <h5 class="m-0 p-0 text-default-color">Shortlisting @if ($errors->has('file'))
                            <span class="invalid-feedback" style="display: block!important;" role="alert">
                            <strong>{{ $errors->first('file') }}</strong>
                            </span>
                            @endif
                        </h5>
                    </button>
                </div>
            </div>
            <div class="col-md-12 mb-2">
            <ul class="list-group ">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="col-md-4">
                        <h5 class="card-title">All Documents</h5>
                        <h5 class="card-subtitle"></h5>
                    </div>
                      <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-danger">
                                </div>
                                <div class="text-success">
                                </div>
                         </div>   
                        </div>
                    </div>
                    <div class="col-md-4" >
                        @foreach($messages as $message)
                        @if($message)
                        <img width="100%" style="padding: 30px;" src="{{asset($message['path'])}}" alt="Card image cap">
                                <!-- <div class="downloadHover"><i class="fa fa-download download" aria-hidden="true"></i></div> -->
                            </a>
                        @endif
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
   @endif
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
                                            <div class="downloadHover"><i class="fa fa-download download" aria-hidden="true"></i></div>
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
                                                <!-- @if($otherAdminDocAttachment['status'] == 3)
                                                <div class="text-danger">
                                                    <label><strong class="text-secondary">Document: </strong>Rejected</label>
                                                    <p><strong class="text-secondary">Reason: </strong>{{$otherAdminDocAttachment['reason']}}</p>
                                                </div>
                                                @endif  -->   
                                               <!--  @if($otherAdminDocAttachment['status'] == 2)
                                                <div class="text-success">
                                                    <label><strong class="text-secondary">Document: </strong>Accepted <i class="fa fa-check " aria-hidden="true"></i></label>
                                                </div>
                                                @endif  -->   
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
                                            <div class="downloadHover"><i class="fa fa-download download" aria-hidden="true"></i></div>
                                            
                                        </a>
                                        @else
                                        <div class="downloadHover"><a href="{{route('pendancyAttachments.delete',$otherAdminDocAttachment['id'])}}"><i class="fa fa-trash download" aria-hidden="true"></i></a></div>
                                        
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 pendancyP">
                                                @if($otherAdminDocAttachment['status'] == 3)
                                                <!-- <div class="text-danger">
                                                    <label><strong class="text-secondary">Document: </strong>Rejected</label>
                                                    <p><strong class="text-secondary">Reason: </strong>{{$otherAdminDocAttachment['reason']}}</p>
                                                </div> -->
                                                <div class="row">
                                                    <form method="POST" enctype="multipart/form-data" action="{{route('pendancyAttachments.update',$otherAdminDocAttachment['id'])}}"  >@csrf 
                                                        <label class="btn btn-success btn-default-color" onchange="javascript:this.form.submit()">Upload Document
                                                        <i class="fa fa-upload text-default-color" aria-hidden="true"></i><input type="file" name="file" class="displayNone">
                                                        </label><input type="hidden" name="studentId" value="{{$student['id']}}">
                                                    </form>
                                                </div>
                                                @endif    
                                                <!-- @if($otherAdminDocAttachment['status'] == 2)
                                                <div class="text-success">
                                                    <label><strong class="text-secondary">Document: </strong>Accepted <i class="fa fa-check " aria-hidden="true"></i></label>
                                                </div>
                                                @endif -->    
                                                <!-- <p> {{$otherAdminDocAttachment['comment']}}</p> -->
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
                                                        <!-- @if($pendancyAttachment['status'] == 3)
                                                        <div class="text-danger">
                                                            <label><strong class="text-secondary">Document: </strong>Rejected</label>
                                                            <p><strong class="text-secondary">Reason: </strong>{{$pendancyAttachment['reason']}}</p>
                                                        </div>
                                                        @endif -->
                                                        <!-- @if($pendancyAttachment['status'] == 2)
                                                        <div class="text-success">
                                                            <label><strong class="text-secondary">Document: </strong>Accepted <i class="fa fa-check " aria-hidden="true"></i></label>
                                                        </div>
                                                        @endif -->  
                                                        <!-- <p>{{$pendancyAttachment['comment']}}</p> -->
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
                                                    <!-- @if($otherAttachment['status'] == 3)
                                                    <div class="text-danger">
                                                        <label><strong class="text-secondary">Document: </strong>Rejected</label>
                                                        <p><strong class="text-secondary">Reason: </strong>{{$otherAttachment['reason']}}</p>
                                                    </div>
                                                    @endif -->
                                                    <!-- @if($otherAttachment['status'] == 2)
                                                    <div class="text-success">
                                                        <label><strong class="text-secondary">Document: </strong>Accepted <i class="fa fa-check " aria-hidden="true"></i></label>
                                                    </div>
                                                    @endif -->  
                                                    <!-- <p>{{$otherAttachment['comment']}}</p> -->
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
    @if($applicationDocuments->count()>0 )
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
                                            <div class="downloadHover"><i class="fa fa-download download" aria-hidden="true"></i></div>
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
    @endif
    @if($student['applingForCountry'] == '38')
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
                                                
                                                <a href="{{asset($paymentscreenshot['path'].''.$paymentscreenshot['name'])}}" download><div class="downloadHover"><i class="fa fa-download download" aria-hidden="true"></i></div></a>
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
    @if($studentQualifications->count()>0)
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
                                           
                                            <!-- <div >
                                                <strong>Total: </strong>{{$studentQualification->totals['name']}}
                                            </div> -->
                                        </div>
                                        <div class="col-md-2">
                                            <a href="{{asset($studentQualification->qualificationDocuments['path'].'/'.$studentQualification->qualificationDocuments['name'])}}" download>
                                                <div class="downloadHover"><i class="fa fa-download download" aria-hidden="true"></i></div>
                                            </a>
                                            <?php
                                            $data['path'] = $studentQualification->qualificationDocuments['path'];
                                            $data['name'] = $studentQualification->qualificationDocuments['name'];
                                            ?>
                                            <form method="POST" action="{{route('pdf.view')}}"  target="_blank">
                                                @csrf
                                             <input type="hidden" name="name"   value="{{$data['name']}}">
                                             <input type="hidden" name="path"   value="{{$data['path']}}">
                                             <button class="btn btn-info" target="_blank">View Pdf</button>
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
    @endif
    @if($studentLor)
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
                                             <div class="downloadHover"><i class="fa fa-download download" aria-hidden="true"></i></div>
                                            </a>
                                            <?php
                                            $data['path'] = $studentLor['path'];
                                            $data['name'] = $studentLor['name'];
                                            ?>
                                            <form method="POST" action="{{route('pdf.view')}}"  target="_blank">
                                                @csrf
                                             <input type="hidden" name="name"   value="{{$data['name']}}">
                                             <input type="hidden" name="path"   value="{{$data['path']}}">
                                             <button class="btn btn-info" target="_blank">View Pdf</button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            @endif
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
                                            <div class="downloadHover"><i class="fa fa-download download" aria-hidden="true"></i></div>
                                        </a>
                                        <?php
                                            $data['path'] = $studentMoi['path'];
                                            $data['name'] = $studentMoi['name'];
                                            ?>
                                            <form method="POST" action="{{route('pdf.view')}}"  target="_blank">
                                                @csrf
                                             <input type="hidden" name="name"   value="{{$data['name']}}">
                                             <input type="hidden" name="path"   value="{{$data['path']}}">
                                             <button class="btn btn-info" target="_blank">View Pdf</button>
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
                                            <div class="downloadHover"><i class="fa fa-download download" aria-hidden="true"></i></div>
                                        </a>
                                        <?php
                                            $data['path'] = $studentSop['path'];
                                            $data['name'] = $studentSop['name'];
                                            ?>
                                            <form method="POST" action="{{route('pdf.view')}}"  target="_blank">
                                                @csrf
                                             <input type="hidden" name="name"   value="{{$data['name']}}">
                                             <input type="hidden" name="path"   value="{{$data['path']}}">
                                             <button class="btn btn-info" target="_blank">View Pdf</button>
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
@if($student->passport)
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
                                            <div class="downloadHover"><i class="fa fa-download download" aria-hidden="true"></i></div>
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
@endif
@if($student->dobDoc)
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
                                            <div class="downloadHover"><i class="fa fa-download download" aria-hidden="true"></i></div>
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
@endif
@if($studentEnglishTests->count()>0)
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
                                        <!-- <div class="col-md-4">
                                            <div >
                                                <strong>Score: </strong>{{$studentEnglishTest->ieltstotalScores['name']}}
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-md-3">
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
                                        </div> -->
                                        <div class="col-md-2">
                                           <a href="{{asset($studentEnglishTest->englishTestDocuments['path'].'/'.$studentEnglishTest->englishTestDocuments['name'])}}" download>
                                            <div class="downloadHover"><i class="fa fa-download download" aria-hidden="true"></i></div>
                                            
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
@endif
@if($studentWorkExperiances->count()>0)
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
@endif                  
<!-- @if($studentQualificationGaps->count()>0)
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
        @endif -->
        <!-- @if($studentQuestionAnswers->count()>0)
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
    @endif -->
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
                        <div class="downloadHover"><i class="fa fa-download download" style="float: left;" aria-hidden="true"></i></div>
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