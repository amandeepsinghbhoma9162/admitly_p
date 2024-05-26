@extends('admin.layouts.admin') 
@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">Add Media</div>
                <div class="card-body">
                    @include('multiauth::message')
                    <form method="POST" action="{{route('media.store')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row">
                            <label for="input-id" class="col-sm-2">Country<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="country_id" required="">
                                    <option value="230">UK</option>
                                    <option value="38">Canada</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-id" class="col-sm-2">Title<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="Title" name="title" class="mb-2 form-control" required>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="input-id" class="col-sm-2">Type<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="type" required="">
                                    <option value="1">Image</option>
                                    <option value="2">Prospectus</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="input-id" class="col-sm-2">File<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                               
                                <input type="file" name="file" class="mb-2 form-control" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-sm">Save</button>
                        <a href="{{route('media.index')}}" class="btn btn-sm btn-danger float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection