@extends('admin.layouts.admin') 
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
</style>
<div class="container-fluid addNewStudent">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 card-header  tabs-border-right ">Quick Shortlisting</div>
                            
                        <!-- <div class="col-md-12 card-header  tabs-border-right ">Quick Shortlisting</div>
                         -->
                    </div>
                </div>
                <div class="card-body" id="formTab">
                    <div id="validation-errors">
                    </div>
                    <!-- start -->
                    <div id="accordion" class=" accordion-wrapper mb-3  col-md-12">
                                    <!-- <h5 class="m-0 p-0 btn-black-color">Personal Details</h5> -->
                        <div class="card ">

                            <form class="" method="POST" action="{{route('admin.quick.shortlisting.store')}}" enctype="multipart/form-data">
                            
                            <!-- <form method="POST" action="{{route('admin.quick.shortlisting.store')}}" enctype="multipart/form-data" > -->
                                @csrf
                                
                                        <br>
                                        <div class="row">
                                                    <div class="col-md-6 ">
                                                        <div class="row">
                                                            <label for="input-id" class="col-sm-4">Select Agent<span class="text-danger">*</span> </label>
                                                            <div class="col-sm-8">
                                                                <select class="mb-2 form-control country_id afterCheckHide" name="agent_id"  required>
                                                                <option value='' > Select Agent</option>
                                                                @foreach($agents as $agent)
                                                                <option value="{{$agent['id']}}" >{{$agent['name']}}   ({{$agent['company_name']}})</option>
                                                                @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row senSecImg">
                                                    <label for="name" class="col-sm-4">{{ __('Name') }}<span class="text-danger">*</span></label>
                                                    <div class="col-sm-8">    
                                                        <input id="name" type="text" class="mb-2 form-control" name="name" placeholder="Name" value="" required autofocus>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 ">
                                                        <div class="row">
                                                            <label for="input-id" class="col-sm-4">Applying For Country<span class="text-danger">*</span> </label>
                                                            <div class="col-sm-8">
                                                                <select class="mb-2 form-control country_id afterCheckHide" name="country"  required>
                                                                <option value=''> Select country</option>
                                                                @foreach($countries as $country)
                                                                
                                                                <option value="{{$country['id']}}">{{$country['name']}}</option>
                                                            
                                                                
                                                                @endforeach
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row " >
                                                    <div class="col-md-6 float-right"  >
                                                        <div class="row">
                                                            <label for="input-id" class="col-sm-4">Applying for Course Level<span class="text-danger"><small> (Select country before course level)</small> *</span> </label>
                                                            <div class="col-sm-8">
                                                                <select class="mb-2 form-control afterCheckHide qualificationLvl" name="level" id="qualification_id" required>
                                                                    <option value=''> Select Level</option>
                                                                    @foreach($qualifications as $qualification)
                                                                    <option value="{{$qualification['id']}}" {{($data['applingForLevel'] == $qualification['id']) ? 'selected' : ''}}> {{$qualification['name']}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                            <label for="input-id" class="col-sm-2 ">Upload All Documents in one select <span class="text-danger">*</span> </label>
                                            <div class="col-sm-2">
                                                <label class="btn btn-info docBtn">
                                                <i class="fa fa-upload" ></i>
                                                <input type="file" name="allDocuments[]" class="mb-2 hide form-control imgInpDoc imgInp images" accept="application/pdf,image/jpeg,image/png" multiple id="checkImgvalue" onchange="checkFiles(this.files)">
                                                </label>
                                                <div class="error"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class=" displayBlock" id="disSuccess">
                                                    <div id="image_preview"></div>
                                                    
                                                    <span class="text-center imgPassportEr"></span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                                </div>
                                        <div class="">
                                <div class="col-md-12 ">
                                    <div class="form-group ">
                                        <h5>Student Prefrence - Intake Preference/Institute Preference/Program Preference </h5>
                                            
                                        
                                        <!-- <input type="hidden" name="student" class="student" value="yes"> -->
                                        <textarea type="text" style="display: inline; width:80%;" rows="6" placeholder="Enter Preference" name="message" class="mb-2 form-control " required></textarea>
                                        
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-shadow  margin-top-20"  style="background:linear-gradient(#e77817, #e77817);display: inline;margin: 0px 0px 0px 4%;border: none;">Click Here to Submit application for shortlisting
                            </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        </div>
    </div>
</div>
@endsection
@section('addjavascript')
<script type="text/javascript" src="{{ asset('admins/js/ajax.js') }}"></script>

@endsection

