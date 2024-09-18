@extends('admin.layouts.admin')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Student</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('studentfiles.update',$student['id'])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="form-group row">    
                        <label for="name" class="col-sm-2">{{ __('First Name') }}<span class="text-danger">*</span></label>
                    <div class="col-sm-10">    
                        <input id="name" type="text" class="mb-2 form-control" name="firstName" value="{{ $student['firstName'] }}" required autofocus>
                            
                        </div>    
                    </div>
                    <div class="form-group row">    
                        <label for="name" class="col-sm-2">{{ __('Middle Name') }}<span class="text-danger">*</span></label>
                    <div class="col-sm-10">    
                        <input id="name" type="text" class="mb-2 form-control" name="middleName" value="{{ $student['middleName'] }}" >
                            
                        </div>    
                    </div>
                    <div class="form-group row">    
                        <label for="name" class="col-sm-2">{{ __('Last Name') }}<span class="text-danger">*</span></label>
                    <div class="col-sm-10">    
                        <input id="name" type="text" class="mb-2 form-control" name="lastName" value="{{ $student['lastName'] }}"  autofocus>
                            
                        </div>    
                    </div>  
                       
                    <div class="form-group row">
                            <label for="email" class="col-sm-2">{{ __('E-Mail Address') }}<span class="text-danger">*</span></label>
                        <div class="col-sm-10"> 
                            <input id="email" type="email" class="mb-2 form-control" name="email" value="{{ $student['email'] }}" >
                            
                        </div>    
                    </div>   
                    <div class="form-group row">
                            <label for="phone" class="col-sm-2">Mobile<span class="text-danger">*</span></label>
                        <div class="col-sm-10"> 
                            <input id="phone" type="number" class="mb-2 form-control" name="mobile" value="{{ $student['mobileNo'] }}" >
                            
                        </div>    
                    </div>   
                      
                    <div class="form-group row"> 
                            <label for="gender" class="col-sm-2 ">Gender<span class="text-danger">*</span> </label>
                        <div class="col-sm-10"> 
                            <select  id="gender"  class="mb-2 form-control" name="gender" required>
                               
                                <option value="male" {{ ( $student["gender"] == 'male') ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ ( $student["gender"] == 'female') ? 'selected' : '' }}>Female</option>
                        
                               
                            </select>
                        </div>    
                    </div>
                    <div class="form-group row"> 
                            <label for="gender" class="col-sm-2 ">Marital Status<span class="text-danger">*</span> </label>
                        <div class="col-sm-10"> 
                            <select  id="gender"  class="mb-2 form-control" name="maritalStatus" required>
                               
                                <option value="yes" {{ ( $student["maritalStatus"] == 'yes') ? 'selected' : '' }}>Single</option>
                                <option value="no" {{ ( $student["maritalStatus"] == 'no') ? 'selected' : '' }}>Married</option>
                        
                               
                            </select>
                        </div>    
                    </div>

                    <div class="form-group row"> 
                            <label for="input-id" class="col-sm-2 ">IELTS Score<span class="text-danger">*</span> </label>
                        <div class="col-sm-10"> 
                            <input type="hidden" name="ieltsScorID" value="{{$studentEnglishTests['id']}}">
                            <select  id="ilets_score"  class="mb-2 form-control" name="ilets_score" required>
                                @foreach($iletsScores as $iletsScore)
                                    @if($studentEnglishTests)
                                    <option value="{{$iletsScore['id']}}" {{ ( $iletsScore->id == $studentEnglishTests->ieltstotalScores['id']) ? 'selected' : '' }}>{{$iletsScore['name']}}</option>
                                    @else
                                    <option value="{{$iletsScore['id']}}" >{{$iletsScore['name']}}</option>
                                    @endif
                        
                                @endforeach
                            </select>
                        </div>    
                    </div>
                    <div class="form-group row"  >
                                                            <label for="input-id" class="col-sm-2">Applying for Course Level<span class="text-danger"><small> (Select country before course level)</small> *</span> </label>
                                                        <div class="col">
                                                            <div class="col-sm-13">
                                                                <select class="mb-2 form-control afterCheckHide qualificationLvl" name="apply_qualification_level" id="qualification_id" required>
                                                                <option value=''> Select Level</option>
                                                                @foreach($qualifications as $qualification)
                                                                <option value="{{$qualification['id']}}" {{($data['applingForLevel'] == $qualification['id']) ? 'selected' : ''}}> {{$qualification['name']}}</option>
                                                                @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>  
                           
                    <button type="submit" class="btn btn-info btn-sm">Save</button>
                    <a href="{{route('studentfiles.index')}}" class="btn btn-sm btn-danger float-right">Back</a>
                    </form>     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
