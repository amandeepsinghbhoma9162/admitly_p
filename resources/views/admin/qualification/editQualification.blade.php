@extends('admin.layouts.admin') 
@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">Edit Qualification</div>
                <div class="card-body">
                    @include('multiauth::message')
                   
                    <form method="POST" action="{{route('qualification.update',$qualification['id'])}}">
                    @csrf
                    @method('PUT')
                        <div class="form-group row">  
                            <label for="input-id" class="col-sm-2">Qualification Name<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="name" name="name" class="mb-2 form-control" value="{{$qualification['name']}}" required>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="country" class="col-md-2 ">Assign Country</label>

                            <div class="col-md-10">
                                <select name="country" id="country" class="form-control">
                                    <option selected disabled>Select Country</option>
                                        <option value="38" {{ $qualification->country == '38' ? 'selected':'' }}>Canada</option>
                                        <option value="230" {{ $qualification->country == '230' ? 'selected':'' }}>UK</option>
                                        <option value="231" {{ $qualification->country == '231' ? 'selected':'' }}>USA</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-sm">Update</button>
                        <a href="{{route('qualification.index')}}" class="btn btn-sm btn-danger float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection