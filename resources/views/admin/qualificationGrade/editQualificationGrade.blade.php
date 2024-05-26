@extends('admin.layouts.admin') 
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">Edit Course Level</div>
                <div class="card-body">
                    @include('multiauth::message')
                   
                    <form method="POST" action="{{route('studentQualificationGrades.update',$qualificationGrade['id'])}}">
                    @csrf
                    @method('PUT')
                    <!-- <div class="form-group row">
                        <label for="input-id" class="col-sm-2">Qualification Level<span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <select  class="mb-2 form-control" name="qualification">
                                <option>select Qualification Level</option>
                                @foreach($qualifications as $qualification)
                                <option value="{{$qualification['id']}}" {{ ($qualification['id'] == $qualificationGrade['qualification_level']) ? 'selected' : '' }}>{{$qualification['name']}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label for="input-id" class="col-sm-2">Qualification Grade<span class="text-danger">*</span></label>
                        <div class="col-sm-10">    
                             <input type="text" placeholder="grade" name="qualificationGrade" class="mb-2 form-control" value="{{$qualificationGrade['qualification_grade']}}" required>
                            
                        </div>
                    </div>
                        <button type="submit" class="btn btn-info btn-sm">Update</button>
                        <a href="{{route('studentQualificationGrades.index')}}" class="btn btn-sm btn-danger float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection