@extends('admin.layouts.admin') 
@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Media</div>
                <div class="card-body">
                    @include('multiauth::message')
                   
                    <form method="POST" action="{{route('media.update',$media['id'])}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="form-group row">
                            <label for="input-id" class="col-sm-2">Country<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="country_id" required="">
                                    <option value="230" {{ ($media['country_id']) == '230' ? 'selected' : '' }}>UK</option>
                                    <option value="38" {{ ($media['country_id']) == '38' ? 'selected' : '' }}>Canada</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-id" class="col-sm-2">Title<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="Title" name="title" class="mb-2 form-control" value="{{$media['title']}}" required>
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-id" class="col-sm-2">Type<span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                                <select class="form-control" name="type" required="">
                                    <option value="1" {{ ($media['type']) == '1' ? 'selected' : '' }}>Image</option>
                                    <option value="2" {{ ($media['type']) == '2' ? 'selected' : '' }}>Prospectus</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-id" class="col-sm-2">File<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                               
                                <input type="file" name="file" class="mb-2 form-control" >
                                <img src="{{asset($media['path'])}}" width="100px">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-sm">Update</button>
                        <a href="{{route('media.index')}}" class="btn btn-sm btn-danger float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection