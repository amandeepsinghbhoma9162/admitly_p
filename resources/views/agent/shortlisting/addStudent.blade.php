<?php
    $studentUser =Auth::guard('student')->check();
    ?>
@extends(($studentUser === false) ? 'agent.layouts.app' : 'applicant.layouts.app')
@section('content')
<style>
    #image_preview div{
        width: 180px!important;
        float: left;
        margin: 5px;
        height: 180px!important;
    }
    #image_preview img{
        width: 100%!important;
        border: 5px solid lightgoldenrodyellow;
    }
    .accordion-wrapper>.card .collapse.show{
        border-bottom-color:white;
}
.card:hover {
    border-bottom: 1px solid white!important;
}/*
form .form-control {
    background: #4665d338;
    background-color: #4665d338;
}*/
</style>
<div class="container-fluid addNewStudent">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                    <div class="row">
                        @if($isEdit == 'yes')
                        <div class="col-md-12 card-header  tabs-border-right ">Quick Shortlisting</div>
                        @else    
                        <div class="col-md-12 card-header  tabs-border-right ">Quick Shortlisting</div>
                        @endif    
                    </div>
                <div class="card-body" id="formTab">
                    <div id="validation-errors">
                    </div>
                    <!-- start -->
                    <div id="accordion" class=" accordion-wrapper mb-3  col-md-12">
                                    <!-- <h5 class="m-0 p-0 btn-black-color">Personal Details</h5> -->
                        <div class="card ">
                            
                            <form method="POST" id="studentForm"  enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <input type="hidden" name="studentId" id="studentId" value="{{$data['id']}}">
                                <div data-parent="#accordion" id="collapseOnePe" aria-labelledby="headingOne" class="collapse step1 show " style="">
                                    <div class="senSecImg ">
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row senSecImg">
                                                    <div class="col-sm-12">
                                                    <label>Name*</label>    
                                                        <input id="name" type="text" class="mb-2 rspncInputFLoatRight form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" placeholder="Name" value="{{$data['firstName']}}" required autofocus>
                                                        @if ($errors->has('firstName'))
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('firstName') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                                    <div class="col-md-4 ">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label>Country</label>
                                                                <select class="mb-2 form-control country_id afterCheckHide" name="apply_country_id"  {{ Session::get('openNext') == 'openNextSession' ? 'disabled' : '' }} required>
                                                                <option value=''> Select Country</option>
                                                                @foreach($countries as $country)
                                                                @if($country['applyFor'] == '1')
                                                                @if(in_array($country['id'],$agentAllowCountry))
                                                                <option value="{{$country['id']}}" {{($data['applingForCountry'] == $country['id']) ? 'selected' : ''}} >{{$country['name']}}</option>
                                                                @endif
                                                                @endif
                                                                @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-4 "  >
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label>Course Level</label>
                                                                <select class="mb-0 form-control afterCheckHide qualificationLvl" name="apply_qualification_level" id="qualification_id" required style="margin-bottom: 0!important;">
                                                                    <option value=''> Select Course Level</option>
                                                                    @foreach($qualifications as $qualification)
                                                                    <option value="{{$qualification['id']}}" {{($data['applingForLevel'] == $qualification['id']) ? 'selected' : ''}}> {{$qualification['name']}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger"><small> Select country before course level</small> *</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                    <div id="accordion" class="step7 accordion-wrapper show mb-3 col-md-4">
                        <div class="card">
                            
                            <div data-parent="#accordion" id="collapseOneD" aria-labelledby="headingOne" class="collapse show" style="">
                                <div class="senSecImg">
                                    <form method="POST" class="documentUploads" enctype="multipart/form-data" action="{{route('quick.shortlisting.document')}}">
                                        @csrf
                                        <input type="hidden" name="studentId" class="studentId" value="{{$data['id']}}">
                                        <div class="form-group">
                                        <div class="col-md-12">
                                        <div class="row">
                                            <label for="input-id" class="col-md-8 ">Documents <small  class="docPdftext">(You can select multiple files)</small> <span class="text-danger">*</span> </label>
                                            <div class="col-sm-4">
                                                <label class="btn btn-info docBtn btn-default-color">
                                                <i class="fa fa-upload" ></i>
                                                <input type="file" name="allDocuments[]" class="mb-2 hide form-control imgInpDoc imgInp images" accept="application/pdf,image/jpeg,image/png" multiple id="checkImgvalue" onchange="checkFiles(this.files)">
                                                </label>
                                                <div class="error"></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class=" displayBlock" id="disSuccess">
                                                    <div id="image_preview"></div>
                                                    
                                                    <span class="text-center imgPassportEr"></span>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-8">
                    <div class="row">
                        <div class="show rspncStdBtnSet col-md-12">
                        <form method="POST" action="{{route('verify.applyFor')}}" style="display: inline;"> 
                            @csrf
                        </form>
                        <form method="POST" class="shortstudentChatRequestForm" >
                            @csrf
                                    <div class="form-group ">
                                            
                                        <input type="hidden" name="agent_id" class="agent_id" value="{{$data['agent_id']}}">
                                        <input type="hidden" name="student_id" class="student_id studentId" value="{{$data['id']}}">
                                        <!-- <input type="hidden" name="student" class="student" value="yes"> -->
                                        <textarea type="text" style="display: inline; width:100%;" rows="4" placeholder="Student Prefrence - Intake Preference/Institute Preference/Program Preference" name="message" class="mb-2 form-control " required></textarea>
                                        <input type="hidden" name="studentId" class="studentId" value="{{$data['id']}}">
                                    </div>
                                
                            <button type="submit" class="btn btn-success btn-shadow btn-default-color  margin-top-20 subRequests"  style="display: inline;margin: 0px 0px 0px 0px;">Click Here to Submit application for shortlisting
                            </button>
                        </form>
                    </div>
                    </div>
                    
                    
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('addjavascript')
<script type="text/javascript">
       
    $(document).ready(function(){
        // alert('123');
    // $(document).on('click','#clickShortListing',function(){
    //     alert('dsad');
    //     $('#chatSubmit').click();
    
    
      
    
    // shortlisting     
        // window.location.href = 'https://admitoffer.com/new/quick/student/shortlistings/'+stdId;
    // });
    
    $(document).on('submit','.shortstudentChatRequestForm',function(e)
            {
                var name = $('#name').val();
                    $('.appenderrorName').html('');
                if(!name){
                    $('#name').after('<div class="appenderrorName"><p class="text-danger">Name field required.</p></div>');
                $(window).scrollTop(0);
                    return false;
                }
                
                var stdcountry_id = $('.country_id').val();
                    $('.appenderrorCountry').html('');
                if(!stdcountry_id){
                    $('.country_id').after('<div class="appenderrorCountry"><p class="text-danger">Applying Country field required.</p></div>');
                $(window).scrollTop(0);
                    return false;
                }
                 var checkImgvalue = $('#checkImgvalue').val();
                    $('.error').html('');
                if(!checkImgvalue){
                    $('.error').after('<div class="appenderrorcheckImgvalue"><p class="text-danger">Upload required documents.</p></div>');
                $(window).scrollTop(0);
                    return false;
                }
                var qualification_id = $('#qualification_id').val();
                    $('.appenderrorCourse').html('');
                if(!qualification_id){
                    $('#qualification_id').after('<div class="appenderrorCourse"><p class="text-danger">Course level field required.</p></div>');
                    $(window).scrollTop(0);
                    return false;
                }
                e.preventDefault();
                e.stopPropagation();
                var ThisEvnt = $(this);
                var formData = $(this).serialize();
                var message = $('.messageInput').val();
                var stdId = $('.studentId').val();
                $.ajax(
                {
                    type:'post',
                    url:'/admin/student/chat/store',
                    data: new FormData(this), 
                    contentType: false,       
                    cache: false,             
                    processData:false,
                    success:function(result)
                    {
                        
                        if(result.status == 'success'){
                            $('.documentUploads').submit();
    
                        }
                        
                    },
                });
            });
    
    
    });
</script>
<script type="text/javascript">
     function checkFiles(files) {     
        if(files.length>15) {
            alert("length exceeded; files have been truncated");
            let list = new DataTransfer;
            for(let i=0; i<15; i++)
               list.items.add(files[i]);
               
            document.getElementById('checkImgvalue').files = list.files;
            document.getElementById('disSuccess').style.display = "none";
        }else{
            var j = files.length;  
            for(let i=0; i<files.length; i++){

               $('#image_preview').append("<div ><img src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
               j = j+1;
            }
        }       
    }
</script>
@endsection