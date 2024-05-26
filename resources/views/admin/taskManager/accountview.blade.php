@extends('admin.layouts.admin') 
@section('content')
<style type="text/css">
    .btn-info{
        color: #fff;
        background-color: #ed3d0b!important;
    }
</style>
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   Account Managers
                </div>
                <div class="card-body">
                    @include('multiauth::message')
                    <ul class="list-group">
                        @foreach ($adminsArray as $admin)
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="font-size: 15px!important;">
                            {{ $admin->name }}
                            <div class="float-right">
                                
                              <a href="{{route('taskmanager.edit',base64_encode($admin->id))}}" class="btn btn-info">View</a>
                                
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection