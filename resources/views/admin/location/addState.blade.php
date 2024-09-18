@extends('admin.layouts.admin') 
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">Add New State</div>
                <div class="card-body">
                    @include('multiauth::message')
                    <form method="POST" action="{{route('admin.saveState')}}">
                    @csrf
                    <div class="form-group row">
                        <label for="role" class="col-sm-2">Select Country<span class="text-danger">*</span></label>
                        <div class="col-sm-10">    
                        <select class="mb-2 form-control" name="country_id" required>
                                <option> Select country</option>
                                @foreach($countries as $country)
                                    <option value="{{$country['id']}}"> {{$country['name']}}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input-id" class="col-sm-2">State Name<span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="name" name="name" class="mb-2 form-control" required>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-info btn-sm">Save</button>
                        <a href="{{route('admin.state.list')}}" class="btn btn-sm btn-danger float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection