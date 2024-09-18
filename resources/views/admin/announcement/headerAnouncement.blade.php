@extends('admin.layouts.admin') 
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Header Announcement</div>
                <div class="card-body">
                    @include('multiauth::message')
                   
                    <form method="POST" action="{{route('header.announcement.update')}}">
                    @csrf
                    @method('PUT')
                        <div class="form-group row">
                            <label for="input-id" class="col-sm-2">Is visible? </label>
                                <label class="switch col-sm-10">
                                  <input type="checkbox" name="status" {{($announcement['status'] == '1') ? 'checked' : ''}} value="1">
                                  <span class="slider round"></span>
                                </label>
                        </div>
                        <div class="form-group row">
                            <label for="input-id" class="col-sm-2">Header Announcement<span class="text-danger">*</span> </label> 
                            <div class="col-sm-10">
                                <input type="text" placeholder="Announcement" name="name" class="mb-2 form-control" value="{{$announcement['name']}}" required>
                                <input type="text" placeholder="link" name="link" class="mb-2 form-control" value="{{$announcement['link']}}" >
                                
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-sm">Update</button>
                        <a href="{{route('announcement.index')}}" class="btn btn-sm btn-danger float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection