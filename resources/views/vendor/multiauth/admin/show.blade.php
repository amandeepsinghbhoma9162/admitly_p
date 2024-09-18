@extends('admin.layouts.admin') 
@section('content')
<style type="text/css">
    .btn-success{
    color: whhite!important;
    background: #ed3d0b!important;
    border-color: #ed3d0b!important;
  }
</style>
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    User List &nbsp;
                    <span class="float-right">
                        <a href="{{route('admin.register')}}" class="btn btn-sm btn-success">New {{ ucfirst(config('multiauth.prefix')) }}</a>
                    </span>
                </div>
                <div class="card-body">
    @include('multiauth::message')
                     @include('multiauth::message')
                    <table  data-order='[[ 0, "desc" ]]' class="mb-0 table tableID">
                        <thead>
                        </thead>
                        <tbody class="appendQualTest " style="font-size: 15px!important;">
                            @foreach ($admins as $admin)
                            <tr>
                            <th scope="row capitalize">{{ $admin->name }}</th>
                        <td class="" >
                            @foreach ($admin->roles as $role)
                                        <span class="badge-warning badge-pill ml-2" style="color: #6b7385!important; background: #f6f6f6!important;display: inline-block; height: 30px; line-height: 30px; padding: 0 22px; background: #f6f6f6; font-size: 14px; letter-spacing: 0.3px; border-radius: 6px;">
                                            {{ $role->name }}
                                        </span> @endforeach
                                                    </td>
                        <td>
                            {{ $admin->active? 'Active' : 'Inactive' }}
                        </td>
                        <td class="float-right">
                            
                                <a href="{{route('admin.edit',[$admin->id])}}" class="btn btn-sm btn-info mr-3">Edit</a>
                        </td>                        
                        @endforeach @if($admins->count()==0)
                        <p>No {{ config('multiauth.prefix') }} created Yet, only super {{ config('multiauth.prefix') }} is available.</p>
                        @endif
                    </tbody>
                </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection