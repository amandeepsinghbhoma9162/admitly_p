@extends('admin.layouts.admin') 
@section('content')
<style type="text/css">
      .btn-success{
    color: whhite!important;
    background: #ed3d0b!important;
    border-color: #ed3d0b!important;
  }
</style>
<div class="container" style="font-size: 15px; ">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    Roles &nbsp;
                    <span class="float-right">
                        <a href="{{ route('admin.role.create') }}" class="btn btn-sm btn-success">New Role</a>
                    </span>
                </div>

                <div class="card-body" style="font-size: 15px!important;">
                     @include('multiauth::message')
                    <table  data-order='[[ 0, "desc" ]]' class="mb-0 table tableID">
                        <thead>
                        </thead>
                        <tbody class="appendQualTest ">
                            @foreach ($roles as $role)
                            <tr>
                            <th scope="row capitalize">{{ $role->name }}</th>
                        <td class="badge badge-warning badge-pill" style="color: #6b7385!important; background: #f6f6f6!important;display: inline-block; height: 30px; line-height: 30px; padding: 0 22px; background: #f6f6f6; font-size: 14px; letter-spacing: 0.3px; border-radius: 6px; margin-top: 16px;">
                            {{ $role->admins->count() }} {{ ucfirst(config('multiauth.prefix')) }}
                        </td>
                        <td class="float-right">
                            <a href="{{ route('admin.role.edit',$role->id) }}" class="btn btn-sm btn-info mr-3">Edit</a>
                        </td>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection