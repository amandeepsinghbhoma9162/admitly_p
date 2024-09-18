@extends('admin.layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    users List &nbsp;
                </div>
                <div class="card-body">
                    @include('multiauth::message')
                    <table  data-order='[[ 0, "desc" ]]' class="mb-0 table tableID">
                        <thead>
                            <tr>
                                <th>Id</th> 
                                <!-- <th>Agent</th>  -->
                                <th>Name</th> 
                                <th>Email</th> 
                                <!-- <th>Company Name</th>  -->
                                <th>Mobile</th> 
                            </tr>
                        </thead>
                        <tbody class="appendQualTest ">
                        @foreach ($users as $user)
                        
                        <tr class="text-center">
                            <td class="capitalize text-left"  >
                                {{ $user->id }}
                            </td>
                            <td class="capitalize text-left"  >
                                {{ $user->name }}
                            </td>
                            <td class="capitalize text-left"  >
                                {{ $user->email }}
                            </td>
                            <td class="capitalize text-left"  >
                                {{ $user->mobile }}
                            </td>
                            <td class="capitalize text-left"  >
                                <a class="btn btn-primary" href="{{route('admin.adminteam.view', $user->id )}}">view</a>
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