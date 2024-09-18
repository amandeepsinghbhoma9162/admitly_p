@extends('admin.layouts.admin')
 @section('content')
 <style type="text/css">
     .selecteditemColor{
        background: #ffffff!important;
        border: 2px solid #9bc39b!important;
    }
     .notSelected{
        filter: blur(1px);
     }
 </style>
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
             <div  class=" col-md-12 pdf listMainGroup mt-2">
                <div class="card">
                    <div class="card-body">
                        <div id="headingOne" class="card-header">
                            <button type="button"  class="text-left m-0 p-0 btn btn-link btn-block ">
                                <h5 class="m-0 p-0 text-default-color">All Documents In Single PDF</h5>
                            </button>
                        </div>
                        <div data-parent="#accordion" id="collapseOneT" aria-labelledby="headingOne" class="collapse show" style="">
                            <div class="senSecImg">
                                <br>
                                
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <div class="col-md-9">
                                                       All documents
                                                    </div>
                                                    <div class="col-md-3">
                                                       <a href="{{route('convertPdf.alldocuments',$student['id'])}}"  target="_blank">
                                                        <div class="downloadHover"><i class="fa fa-download download" aria-hidden="true"></i></div>
                                                        
                                                    </a>
                                                    </div>

                                                </li>
                                            </ul>
                                        </div>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        
        
        @if($pendancyAttachments->count()>0 || $otherAttachments->count()>0 || $otherAdminDocAttachments->count() > 0)
        <div class=" col-md-12 pdf">
            <div class="card">
                <div class="card-body">
                    <div id="headingOne" class="card-header">
                        <button type="button" class="text-left m-0 p-0 btn btn-link btn-block ">
                            <h5 class="m-0 p-0 text-default-color">Pendency Documents</h5>
                        </button>
                    </div>
                    <div>
                        <div class="senSecImg">
                            <br> @if($pendancyAttachments->count()>0 || $otherAttachments->count()>0 || $otherAdminDocAttachments->count() > 0)
                            <div class="row">
                                @foreach($otherAdminDocAttachments as $key=> $otherAdminDocAttachment) @if($otherAdminDocAttachment['status'] == 10)
                                <div class="col-md-12 mb-3">
                                    <ul class="list-group ">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="col-md-4">
                                            <h5 class="card-title">{{$otherAdminDocAttachment['title']}}</h5>
                                        </div>
                                      
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12 pendancyP">
                                                    @if($otherAdminDocAttachment['status'] == 1)
                                                    <div>
                                                        <a class="btn btn-success" href="{{route('pendancyAttachments.accepted',$otherAdminDocAttachment['id'])}}">Accept</a>
                                                        <a class="btn btn-danger pendancyReject" href="javascript:void;">Reject</a>
                                                    </div>
                                                    <div style="margin: 10px 0px 10px 0px;" class="displayNone pendancyC">
                                                        <form method="POST" action="{{route('pendancyAttachments.rejected',$otherAdminDocAttachment['id'])}}">
                                                            @csrf
                                                            <textarea name="reason" class="form-control"></textarea>
                                                            <button style="margin-top:10px" class="btn btn-success float-right">Save</button>
                                                        </form>
                                                        <br>
                                                    </div>
                                                    @endif @if($otherAdminDocAttachment['status'] == 3)
                                                    <div class="text-danger">
                                                        <label><strong class="text-secondary">Document: </strong>Rejected</label>
                                                        <p><strong class="text-secondary">Reason: </strong>{{$otherAdminDocAttachment['reason']}}</p>
                                                    </div>
                                                    @endif @if($otherAdminDocAttachment['status'] == 2)
                                                    <div class="text-success">
                                                        <label><strong class="text-secondary">Document: </strong>Accepted <i class="fa fa-check " aria-hidden="true"></i></label>
                                                    </div>
                                                    @endif
                                                    <p> {{$otherAdminDocAttachment['comment']}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="downloadHover"><a href="{{route('pendancyAttachments.delete',$otherAdminDocAttachment['id'])}}"><i class="fa fa-trash download" aria-hidden="true"></i></a></div>
                                            <h5>Created at: <small>{{$otherAdminDocAttachment['created_at']}}</small></h5>
                                            
                                            
                                            
                                        </div>
                                    </li>
                                </ul>
                                </div>
                                @else
                                <div class="col-md-12 mb-3">
                                    <ul class="list-group ">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="col-md-4">
                                            <h5 class="card-title">{{$otherAdminDocAttachment['title']}}</h5>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12 pendancyP">
                                                    @if($otherAdminDocAttachment['status'] == 1)
                                                    <div>
                                                        <a class="btn btn-success" href="{{route('pendancyAttachments.accepted',$otherAdminDocAttachment['id'])}}">Accept</a>
                                                        <a class="btn btn-danger pendancyReject" href="javascript:void;">Reject</a>
                                                    </div>
                                                    <div style="margin: 10px 0px 10px 0px;" class="displayNone pendancyC">
                                                        <form method="POST" action="{{route('pendancyAttachments.rejected',$otherAdminDocAttachment['id'])}}">
                                                            @csrf
                                                            <textarea name="reason" class="form-control"></textarea>
                                                            <button style="margin-top:10px" class="btn btn-success float-right">Save</button>
                                                        </form>
                                                        <br>
                                                    </div>
                                                    @endif @if($otherAdminDocAttachment['status'] == 3)
                                                    <div class="text-danger">
                                                        <label><strong class="text-secondary">Document: </strong>Rejected</label>
                                                        <p><strong class="text-secondary">Reason: </strong>{{$otherAdminDocAttachment['reason']}}</p>
                                                    </div>
                                                    @endif @if($otherAdminDocAttachment['status'] == 2)
                                                    <div class="text-success">
                                                        <label><strong class="text-secondary">Document: </strong>Accepted <i class="fa fa-check " aria-hidden="true"></i></label>
                                                    </div>
                                                    @endif
                                                    <p> {{$otherAdminDocAttachment['comment']}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{asset($otherAdminDocAttachment['path'].'/'.$otherAdminDocAttachment['name'])}}" download>
                                                <div class="downloadHover"><i class="fa fa-download download" aria-hidden="true"></i>
                                                    
                                                </div>
                                                
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                                </div>
                                <h5>Created at: <small>{{$otherAdminDocAttachment['created_at']}}</small></h5>
                                            <h5>Updated at: <small>{{$otherAdminDocAttachment['updated_at']}}</small></h5>
                                @endif @endforeach @foreach($pendancyAttachments as $key=> $pendancyAttachment)
                                <div class="col-md-12 mb-3">
                                    <ul class="list-group ">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="col-md-4">
                                            <h5 class="card-title">{{$pendancyAttachment->qualification['qualification_grade']}}</h5>
                                            <h5 class="card-subtitle">{{$pendancyAttachment->applicationCourse['name']}}</h5>
                                        </div>
                                       
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12 pendancyP">
                                                    @if($pendancyAttachment['status'] == 1)
                                                    <div>
                                                        <a class="btn btn-success" href="{{route('pendancyAttachments.accepted',$pendancyAttachment['id'])}}">Accept</a>
                                                        <a class="btn btn-danger pendancyReject" href="javascript:void;">Reject</a>
                                                    </div>
                                                    <div style="margin: 10px 0px 10px 0px;" class="displayNone pendancyC">
                                                        <form method="POST" action="{{route('pendancyAttachments.rejected',$pendancyAttachment['id'])}}">
                                                            @csrf
                                                            <textarea name="reason" class="form-control"></textarea>
                                                            <button style="margin-top:10px" class="btn btn-success float-right">Save</button>
                                                        </form>
                                                        <br>
                                                    </div>
                                                    @endif @if($pendancyAttachment['status'] == 3)
                                                    <div class="text-danger">
                                                        <label><strong class="text-secondary">Document: </strong>Rejected</label>
                                                        <p><strong class="text-secondary">Reason: </strong>{{$pendancyAttachment['reason']}}</p>
                                                    </div>
                                                    @endif @if($pendancyAttachment['status'] == 2)
                                                    <div class="text-success">
                                                        <label><strong class="text-secondary">Document: </strong>Accepted <i class="fa fa-check " aria-hidden="true"></i></label>
                                                    </div>
                                                    @endif
                                                    <p> {{$pendancyAttachment['comment']}}</p>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            @if($pendancyAttachment['name'])
                                            <a href="{{asset($pendancyAttachment['path'].'/'.$pendancyAttachment['name'])}}" download>
                                                <div class="downloadHover"><i class="fa fa-download download" aria-hidden="true"></i>
                                                    
                                                </div>
                                                
                                            </a>
                                             <h5>Created at: <small>{{$pendancyAttachment['created_at']}}</small></h5>
                                            <h5>Updated at: <small>{{$pendancyAttachment['updated_at']}}</small></h5>
                                            @else
                                            <div class="downloadHover"><a href="{{route('pendancyAttachments.delete',$pendancyAttachment['id'])}}"><i class="fa fa-trash download" aria-hidden="true"></i></a></div>
                                             <h5>Created at: <small>{{$pendancyAttachment['created_at']}}</small></h5>
                                             @endif
                                        </div>
                                    </li>
                                </ul>
                                </div>
                                @endforeach
                                 @foreach($otherAttachments as $key=> $otherAttachment)
                                    
                                <div class="col-md-12 mb-3">
                                    <ul class="list-group ">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="col-md-4">
                                            <h5 class="card-title">{{$otherAttachment['title']}}</h5>
                                        </div>
                                       
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12 pendancyP">
                                                    @if($otherAttachment['status'] == 1)
                                                    <div>
                                                        <a class="btn btn-success" href="{{route('pendancyAttachments.accepted',$otherAttachment['id'])}}">Accept</a>
                                                        <a class="btn btn-danger pendancyReject" href="javascript:void;">Reject</a>
                                                    </div>
                                                    <div style="margin: 10px 0px 10px 0px;" class="displayNone pendancyC">
                                                        <form method="POST" action="{{route('pendancyAttachments.rejected',$otherAttachment['id'])}}">
                                                            @csrf
                                                            <textarea name="reason" class="form-control"></textarea>
                                                            <button style="margin-top:10px" class="btn btn-success float-right">Save</button>
                                                        </form>
                                                        <br>
                                                    </div>
                                                    @endif @if($otherAttachment['status'] == 3)
                                                    <div class="text-danger">
                                                        <label><strong class="text-secondary">Document: </strong>Rejected</label>
                                                        <p><strong class="text-secondary">Reason: </strong>{{$otherAttachment['reason']}}</p>
                                                    </div>
                                                    @endif @if($otherAttachment['status'] == 2)
                                                    <div class="text-success">
                                                        <label><strong class="text-secondary">Document: </strong>Accepted <i class="fa fa-check " aria-hidden="true"></i></label>
                                                    </div>
                                                    @endif
                                                    <p> {{$otherAttachment['comment']}}</p>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            @if($otherAttachment['name'])
                                            <a href="{{asset($otherAttachment['path'].'/'.$otherAttachment['name'])}}" download>
                                                <div class="downloadHover"><i class="fa fa-download download" aria-hidden="true"></i>
                                                    <button class="btn btn-success">Download</button>
                                                </div>
                                            </a>
                                            <h5>Created at: <small>{{$otherAttachment['created_at']}}</small></h5>
                                            <h5>Updated at: <small>{{$otherAttachment['updated_at']}}</small></h5>
                                            @else
                                            <div class="downloadHover"><a href="{{route('pendancyAttachments.delete',$otherAttachment['id'])}}"><i class="fa fa-trash download" aria-hidden="true"></i></a></div>
                                            <h5>Created at: <small>{{$otherAttachment['created_at']}}</small></h5>
                                            @endif
                                            
                                        </div>
                                    </li>
                                    </ul>
                                    
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div class="text-center">
                                <p class="text-center">No Pendency.</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
         @if($paymentscreenshot)
         <div class=" col-md-12 pdf mb-3">
            <div class="card">
                <div class="card-body">
                    <div id="headingOne" class="card-header">
                        <button type="button" class="text-left m-0 p-0 btn btn-link btn-block ">
                            <h5 class="m-0 p-0 text-default-color">Paid amount of student</h5>
                        </button>
                    </div>
                    <div>
                        <div class="senSecImg">
                            <br> @if($paymentscreenshot)
                            <div class="row listMainGroup">
                                
                                <div class="col-md-12 mb-2">
                                    <ul class="list-group zoom">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div class="col-md-4">
                                                <div>
                                                    <strong>Paid Amount Image</strong>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <img src="{{$paymentscreenshot['path']}}{{$paymentscreenshot['name']}}">
                                                <a href="{{asset($paymentscreenshot['path'].''.$paymentscreenshot['name'])}}" download>download</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a class="btn btn-danger" href="{{route('payment.decline',base64_encode($student['id']))}}">Decline</a>
                                                <a class="btn btn-success" href="{{route('payment.approve',base64_encode($student['id']))}}">Approve</a>
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
        <!-- @if($hasAttachs->count()>0)
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
   @endif  -->                     
       <br>
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
        @if($studentQualifications->count()>0)
        <div class=" col-md-12 pdf mb-3" style=" margin-top: 10px;">
            <div class="card">
                <div class="card-body">
                    <div id="headingOne" class="card-header">
                        <button type="button" class="text-left m-0 p-0 btn btn-link btn-block ">
                            <h5 class="m-0 p-0 text-default-color">Qualification</h5>
                        </button>
                    </div>
                    <div>
                        <div class="senSecImg">
                            <br> @if($studentQualifications->count()>0)
                            <div class="row listMainGroup">
                                @foreach($studentQualifications as $key=> $studentQualification)
                                <div class="col-md-12 mb-2">
                                    <ul class="list-group zoom">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div class="col-md-4">
                                                <div>
                                                    <strong>Level: </strong>{{$studentQualification->qualification['qualification_grade']}}
                                                </div>
                                                <div>
                                                    <strong>Board: </strong>{{$studentQualification->boards['name']}}
                                                </div>
                                                <div>
                                                    <strong>Subject: </strong>{{$studentQualification['subject']}}
                                                </div>
                                                <div>
                                                    <strong>From: </strong>{{date('d-M-Y',strtotime($studentQualification['from']))}}
                                                </div>
                                                <div>
                                                    <strong>To: </strong>{{date('d-M-Y',strtotime($studentQualification['to']))}}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div>
                                                    <strong>City: </strong> {{$studentQualification->city['name']}}
                                                </div>
                                                <div>
                                                    <strong>State: </strong>{{$studentQualification->state['name']}}
                                                </div>
                                                <div>
                                                    <strong>Country: </strong>{{$studentQualification->country['name']}}
                                                </div>
                                                <div>
                                                    <strong>Institute: </strong>{{$studentQualification['instituteName']}}
                                                </div>
                                                <div>
                                                    <strong>Total: </strong>{{$studentQualification->totals['name']}}
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                @if($studentQualification->qualificationDocuments)
                                                    @if($studentQualification->qualificationDocuments['status'] == 0)
                                                    <div style="margin: 10px">
                                                        <a class="btn btn-success mb-1" href="{{route('qualificationDoc.accepted',$studentQualification->qualificationDocuments['id'])}}">Accept</a>
                                                        <a class="btn btn-danger pendancyReject" href="{{route('qualificationDoc.rejected',$studentQualification->qualificationDocuments['id'])}}">Reject</a>
                                                    </div>
                                                    <div style="margin: 10px 0px 10px 0px;" class="displayNone pendancyC">
                                                        <form method="POST" action="{{route('qualificationDoc.rejected',$studentQualification->qualificationDocuments['id'])}}">
                                                            @csrf
                                                            <textarea name="reason" class="form-control"></textarea>
                                                            <button style="margin-top:10px" class="btn btn-success float-right">Save</button>
                                                        </form>
                                                        <br>
                                                    </div>
                                                    @endif
                                                @endif
                                                @if($studentQualification->qualificationDocuments['status'] == 1)
                                                <div style="margin: 10px">
                                                    <p>Document :<span class="text-success">Accepted</span></p>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-3">
                                                @if($studentQualification->qualificationDocuments)
                                                    @if($studentQualification->qualificationDocuments['status'] == 2)
                                                    <div class="text-danger"><span class="documentDenied">DENIED</span></div>
                                                    @else
                                                    <a href="{{asset($studentQualification->qualificationDocuments['path'].'/'.$studentQualification->qualificationDocuments['name'])}}" download>
                                                        <div class="downloadHover "><i class="fa fa-download download text-default-color" aria-hidden="true"></i></div>

                                                    </a>
                                                     <form method="POST" action="{{route('pdf.view')}}"  target="_blank">
                                                        @csrf
                                                     <input type="hidden" name="name"   value="{{$studentQualification->qualificationDocuments['name']}}">
                                                     <input type="hidden" name="path"   value="{{$studentQualification->qualificationDocuments['path']}}">
                                                     <button class="btn btn-info" target="_blank">View Pdf</button>
                                                    </form>
                                                    @endif
                                                @endif
                                            </div>

                                        </li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div class="text-center">
                                <p class="text-center">No Qualification.</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
       @endif
       <br>
        @if($student['applingForCountry'] == '230')
        @if($studentLor)
        <div class=" col-md-12 pdf mb-3">
            <div class="card">
                <div class="card-body">
                    <div id="headingOne" class="card-header">
                        <button type="button" data-toggle="collapse" data-target="#collapseOneQ" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block ">
                            <h5 class="m-0 p-0 text-default-color">Additional Documents</h5>
                        </button>
                    </div>
                    <div>
                        <div class="senSecImg">
                            <br>
                            <div class="row listMainGroup">
                                @if($studentLor)
                                <div class="col-md-12 mb-2">
                                    <ul class="list-group zoom">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div class="col-md-4">
                                                LOR (Letter Of Recommendation)
                                            </div>
                                            <div class="col-md-4">
                                                @if($studentLor['status'] == 0)
                                                <div style="margin: 10px">
                                                    <a class="btn btn-success" href="{{route('qualificationDoc.accepted',$studentLor['id'])}}">Accept</a>
                                                    <a class="btn btn-danger pendancyReject" href="{{route('qualificationDoc.rejected',$studentLor['id'])}}">Reject</a>
                                                </div>
                                                @endif @if($studentLor['status'] == 1)
                                                <div style="margin: 10px">
                                                    <p>Document :<span class="text-success">Accepted</span></p>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    @if($studentLor['status'] == 2)
                                                    <div class="text-danger"><span class="documentDenied">DENIED</span></div>
                                                    @else
                                                    <a href="{{asset($studentLor['path'].'/'.$studentLor['name'])}}" download>
                                                        <div class="downloadHover"><i class="fa fa-download download text-default-color" aria-hidden="true"></i></div>

                                                    </a>
                                                    @endif

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                @endif @if($studentMoi)
                                <div class="col-md-12 mb-2">
                                    <ul class="list-group zoom">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div class="col-md-4">
                                                MOI (Medium Of Instruction)
                                            </div>
                                            <div class="col-md-4">
                                                @if($studentMoi['status'] == 0)
                                                <div style="margin: 10px">
                                                    <a class="btn btn-success" href="{{route('qualificationDoc.accepted',$studentMoi['id'])}}">Accept</a>
                                                    <a class="btn btn-danger pendancyReject" href="{{route('qualificationDoc.rejected',$studentMoi['id'])}}">Reject</a>
                                                </div>
                                                @endif @if($studentMoi['status'] == 1)
                                                <div style="margin: 10px">
                                                    <p>Document :<span class="text-success">Accepted</span></p>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <div class="">
                                                    @if($studentMoi['status'] == 2)
                                                    <div class="text-danger"><span class="documentDenied">DENIED</span></div>
                                                    @else
                                                    <a href="{{asset($studentMoi['path'].'/'.$studentMoi['name'])}}" download>
                                                        <div class="downloadHover"><i class="fa fa-download download text-default-color" aria-hidden="true"></i></div>

                                                    </a>
                                                     <form method="POST" action="{{route('pdf.view')}}"  target="_blank">
                                                        @csrf
                                                     <input type="hidden" name="name"   value="{{$studentMoi['name']}}">
                                                     <input type="hidden" name="path"   value="{{$studentMoi['path']}}">
                                                     <button class="btn btn-info" target="_blank">View Pdf</button>
                                                    </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                @endif
                                <!--  @if($studentSop)
                            <div class="col-md-4">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">SOP</h5>
                                    </div>
                                    <div class="boxImg">
                                        @if($studentSop['status'] == 2)
                                        <div class="text-danger"><span class="documentDenied">DENIED</span></div>
                                        @else
                                        <a href="{{asset($studentSop['path'].'/'.$studentSop['name'])}}" download>
                                            <div class="downloadHover"><i class="fa fa-download download" aria-hidden="true"></i><button class="btn btn-success">Download</button></div>
                                            <img width="100%" src="{{asset('images/site/pdfIcon.png')}}" alt="Card image cap" >
                                        </a>
                                        @endif    
                                    </div>
                                    @if($studentSop['status'] == 0)
                                    <div style="margin: 10px" >
                                        <a class="btn btn-success" href="{{route('qualificationDoc.accepted',$studentSop['id'])}}">Accept</a>
                                        <a class="btn btn-danger pendancyReject" href="{{route('qualificationDoc.rejected',$studentSop['id'])}}">Reject</a>
                                    </div>
                                    @endif
                                    @if($studentSop['status'] == 1)
                                    <div style="margin: 10px" >
                                        <p>Document :<span class="text-success">Accepted</span></p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endif -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @endif
@if($student->passport)
    <div class="row listMainGroup">
        <div class=" col-md-12 pdf mb-3">
            <div class="card">
                <div class="card-body">
                    <div id="headingOne" class="card-header">
                        <button type="button" class="text-left m-0 p-0 btn btn-link btn-block ">
                            <h5 class="m-0 p-0 text-default-color">Passport</h5>
                        </button>
                    </div>
                    <div data-parent="#accordion" id="collapseOneT" aria-labelledby="headingOne" class="collapse show" style="">
                        <div class="senSecImg">
                            <br> @if($student->passport)
                            <div class="row">
                            <div class="col-md-12 mb-2">
                                <ul class="list-group ">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="col-md-4">
                                            Passport Document
                                        </div>
                                        <div class="col-md-4">
                                            @if($student->passport['status'] == 0)
                                            <div style="margin: 10px">
                                                <a class="btn btn-success" href="{{route('qualificationDoc.accepted',$student->passport['id'])}}">Accept</a>
                                                <a class="btn btn-danger pendancyReject" href="{{route('qualificationDoc.rejected',$student->passport['id'])}}">Reject</a>
                                            </div>
                                            @endif @if($student->passport['status'] == 1)
                                            <div style="margin: 10px">
                                                <p>Document :<span class="text-success">Accepted</span></p>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <div class="">
                                                @if($student->passport['status'] == 2)
                                                <div class="text-danger"><span class="documentDenied">DENIED</span></div>
                                                @else
                                                <a href="{{asset($student->passport['path'].'/'.$student->passport['name'])}}" download>
                                                    <div class="downloadHover"><i class="fa fa-download download text-default-color" aria-hidden="true"></i></div>

                                                </a>
                                                <form method="POST" action="{{route('pdf.view')}}"  target="_blank">
                                                        @csrf
                                                     <input type="hidden" name="name"   value="{{$student->passport['name']}}">
                                                     <input type="hidden" name="path"   value="{{$student->passport['path']}}">
                                                     <button class="btn btn-info" target="_blank">View Pdf</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($studentEnglishTests->count()>0)
            <div class="card" style="margin-top: 10px;">
                <div class="card-body">
                    <div id="headingOne" class="card-header">
                        <button type="button" class="text-left m-0 p-0 btn btn-link btn-block ">
                            <h5 class="m-0 p-0 text-default-color">English Qualification Tests</h5>
                        </button>
                    </div>
                    <div data-parent="#accordion" id="collapseOneT" aria-labelledby="headingOne" class="collapse show" style="">
                        <div class="senSecImg">
                            <br> @if($studentEnglishTests->count()>0)
                            <div class="row listMainGroup">
                                @foreach($studentEnglishTests as $key=> $studentEnglishTest)
                                <div class="col-md-12 mb-2">
                                    <ul class="list-group zoom">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div class="col-md-3">
                                                <div>
                                                    <strong>Test: </strong>{{$studentEnglishTest->englishTests['name']}}
                                                </div>
                                                <div>
                                                    <strong>Exam Date: </strong>{{$studentEnglishTest['dateOfTest']}}
                                                </div>
                                                @if($studentEnglishTest->englishTests['name'] != 'PTE')

                                                <div>
                                                    <strong>Reading: </strong> {{$studentEnglishTest['reading']}}
                                                </div>
                                                <div>
                                                    <strong>Writing: </strong> {{$studentEnglishTest['writing']}}
                                                </div>

                                                <div>
                                                    <strong>Speaking: </strong> {{$studentEnglishTest['speaking']}}
                                                </div>
                                                <div>
                                                    <strong>Listening: </strong> {{$studentEnglishTest['listening']}}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                @if($studentEnglishTest->englishTestDocuments['status'] == 0)
                                                <div style="margin: 10px">
                                                    @if($studentEnglishTest->englishTestDocuments['id'])
                                                    <a class="btn btn-success" href="{{route('qualificationDoc.accepted',$studentEnglishTest->englishTestDocuments['id'])}}">Accept</a>
                                                    <a class="btn btn-danger pendancyReject" href="{{route('qualificationDoc.rejected',$studentEnglishTest->englishTestDocuments['id'])}}">Reject</a>
                                                    @endif
                                                </div>
                                                @endif @if($studentEnglishTest->englishTestDocuments['status'] == 1)
                                                <div style="margin: 10px">
                                                    <p>Document :<span class="text-success">Accepted</span></p>
                                                </div>
                                                @endif @endif

                                            </div>
                                            <div class="col-md-3">
                                                <div class="">
                                                    @if($studentEnglishTest->englishTestDocuments['status'] == 2)
                                                    <div class="text-danger"><span class="documentDenied">DENIED</span></div>
                                                    @else
                                                    <a href="{{asset($studentEnglishTest->englishTestDocuments['path'].'/'.$studentEnglishTest->englishTestDocuments['name'])}}" download>
                                                        <div class="downloadHover"><i class="fa fa-download download text-default-color" aria-hidden="true"></i></div>

                                                    </a>
                                                    <form method="POST" action="{{route('pdf.view')}}"  target="_blank">
                                                        @csrf
                                                     <input type="hidden" name="name"   value="{{$studentEnglishTest->englishTestDocuments['name']}}">
                                                     <input type="hidden" name="path"   value="{{$studentEnglishTest->englishTestDocuments['path']}}">
                                                     <button class="btn btn-info" target="_blank">View Pdf</button>
                                                    </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                @endforeach @else
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
@if($studentWorkExperiances->count()>0)
        <div class="row listMainGroup">
            <div class=" col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div id="headingOne" class="card-header">
                            <button type="button" class="text-left m-0 p-0 btn btn-link btn-block ">
                                <h5 class="m-0 p-0 text-default-color">Work Experience</h5>
                            </button>
                        </div>
                        <div data-parent="#accordion" id="collapseOneW" aria-labelledby="headingOne" class="collapse show" style="">
                            <div class="senSecImg ">
                                <div class="row">
                                    @foreach($studentWorkExperiances as $key=> $studentWorkExperiance)
                                    <div class="col-md-12 mb-2">
                                        <ul class="list-group zoom">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <div class="col-md-3">
                                                    <div>
                                                        <strong>Organisation: </strong>{{$studentWorkExperiance['organization']}}
                                                    </div>
                                                    <div>
                                                        <strong>Designation: </strong> {{$studentWorkExperiance['designation']}}
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <strong> From Date: </strong> {{$studentWorkExperiance['fromDate']}}
                                                    </div>
                                                    <div>
                                                        <strong>To Date: </strong> {{$studentWorkExperiance['toDate']}}
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    @if($studentWorkExperiance->documents) @if($studentWorkExperiance->documents['status'] == 0)
                                                    <div style="margin: 10px">
                                                        <a class="btn btn-success" href="{{route('qualificationDoc.accepted',$studentWorkExperiance->documents['id'])}}">Accept</a>
                                                        <a class="btn btn-danger pendancyReject" href="{{route('qualificationDoc.rejected',$studentWorkExperiance->documents['id'])}}">Reject</a>
                                                    </div>
                                                    @endif @if($studentWorkExperiance->documents['status'] == 1)
                                                    <div style="margin: 10px">
                                                        <p>Document :<span class="text-success">Accepted</span></p>
                                                    </div>
                                                    @endif @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="">
                                                        @if($studentWorkExperiance->documents) @if($studentWorkExperiance->documents['status'] == 2)
                                                        <div class="text-danger"><span class="documentDenied">DENIED</span></div>
                                                        @else
                                                        <a href="{{asset($studentWorkExperiance->documents['path'].'/'.$studentWorkExperiance->documents['name'])}}" download>
                                                            <div class="downloadHover"><i class="fa fa-download download text-default-color" aria-hidden="true"></i></div>

                                                        </a>
                                                         <form method="POST" action="{{route('pdf.view')}}"  target="_blank">
                                                        @csrf
                                                         <input type="hidden" name="name"   value="{{$studentWorkExperiance->documents['name']}}">
                                                         <input type="hidden" name="path"   value="{{$studentWorkExperiance->documents['path']}}">
                                                         <button class="btn btn-info" target="_blank">View Pdf</button>
                                                        </form>
                                                        @endif @else
                                                        <div class="text-danger"><span class="documentDenied">Missing</span></div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    @endforeach @else
                                    <div class="text-center">
                                        <p class="text-center">No Work Experiance </p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($studentQualificationGaps->count()>0)
        <div class=" col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div id="headingOne" class="card-header">
                        <button type="button" class="text-left m-0 p-0 btn btn-link btn-block ">
                            <h5 class="m-0 p-0 text-default-color">Academic Gap</h5>
                        </button>
                    </div>
                    <div data-parent="#accordion" id="collapseOneAG" aria-labelledby="headingOne" class="collapse show" style="">
                        <div class="senSecImg ">
                            <br> @if($studentQualificationGaps->count()>0)
                            <div class="row listMainGroup">
                                @foreach($studentQualificationGaps as $key=> $studentQualificationGap)
                                <div class="col-md-12 mb-2">
                                    <ul class="list-group zoom">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div class="col-md-3">
                                                <div>
                                                    <strong>From Date:</strong> {{$studentQualificationGap['fromDate']}}
                                                </div>
                                                <div>
                                                    <strong>To Date:</strong> {{$studentQualificationGap['toDate']}}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div>
                                                    <strong>organization:</strong> {{$studentQualificationGap['organization']}}
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                @if($studentQualificationGap->documents) @if($studentQualificationGap->documents['status'] == 0)
                                                <div style="margin: 10px">
                                                    <a class="btn btn-success" href="{{route('qualificationDoc.accepted',$studentQualificationGap->documents['id'])}}">Accept</a>
                                                    <a class="btn btn-danger pendancyReject" href="{{route('qualificationDoc.rejected',$studentQualificationGap->documents['id'])}}">Reject</a>
                                                </div>
                                                @endif @if($studentQualificationGap->documents['status'] == 1)
                                                <div style="margin: 10px">
                                                    <p>Document :<span class="text-success">Accepted</span></p>
                                                </div>
                                                @endif @endif
                                            </div>
                                            <div class="col-md-3">
                                                <div class="">
                                                    @if($studentQualificationGap->documents) @if($studentQualificationGap->documents['status'] == 2)
                                                    <div class="text-danger"><span class="documentDenied">DENIED</span></div>
                                                    @else
                                                    <a href="{{asset($studentQualificationGap->documents['path'].'/'.$studentQualificationGap->documents['name'])}}" download>
                                                        <div class="downloadHover"><i class="fa fa-download download text-default-color" aria-hidden="true"></i></div>

                                                    </a>

                                                    <form method="POST" action="{{route('pdf.view')}}"  target="_blank">
                                                        @csrf
                                                         <input type="hidden" name="name"   value="{{$studentQualificationGap->documents['name']}}">
                                                         <input type="hidden" name="path"   value="{{$studentQualificationGap->documents['path']}}">
                                                     <button class="btn btn-info" target="_blank">View Pdf</button>
                                                    </form>
                                                    @endif @else
                                                    <div class="text-danger"><span class="documentDenied">Missing</span></div>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                @endforeach @else
                                <div class="text-center">
                                    <p class="text-center">No Qualification Gap </p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        <!-- </div> -->
            @endif
            @if($student->dobDoc)
        <div class="row" style="margin-top: 10px;">
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
        @if($studentQuestionAnswers->count()>0)
        <div class="row" style="margin-top: 10px;">
            <div class=" col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div id="headingOne" class="card-header">
                            <button type="button" class="text-left m-0 p-0 btn btn-link btn-block ">
                                <h5 class="m-0 p-0 text-default-color">Questions</h5>
                            </button>
                        </div>
                        <div data-parent="#accordion" id="collapseOneAG" aria-labelledby="headingOne" class="collapse show" style="">
                            <div class="senSecImg ">
                                <br>
                                <div class="row">
                                    @if($studentQuestionAnswers->count()>0) @foreach($studentQuestionAnswers as $key=> $studentQuestionAnswer)
                                    <div class="col-md-4">
                                        <div class="main-card mb-3 card zoom">
                                            <div class="card-body">
                                                <h6><strong>Q: </strong> {{$studentQuestionAnswer->questions->question['question']}}</h6>
                                                <span class="capitalize"><strong>A: </strong> {{$studentQuestionAnswer['answer']}}</span> @if($studentQuestionAnswer['answer'] == 'yes')
                                                <span>! {{$studentQuestionAnswer['detail']}}</span> @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach @else
                                    <div class="col-md-12 text-center">
                                        <p class="text-center">No Question </p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        </div>
         <div class="appChat"><a href="{{route('admin.student.chat',base64_encode($student['id']))}}"><i class="fas fa-comment-alt fa-2.3x" style="font-size: 2.2rem!important;"></i></a>
        </div>
        @endsection