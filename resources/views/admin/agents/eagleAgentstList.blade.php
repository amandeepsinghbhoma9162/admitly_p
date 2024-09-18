@extends('admin.layouts.admin') 
@section('content')
<?php
    $user = auth('admin')->user()->roles()->pluck('name');
?>
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   Eagle Agents List &nbsp;
                    <!-- <span class="float-right">
                        <a href="{{route('agents.create')}}" class="btn btn-sm btn-success">Add New Agent</a>
                    </span> -->
                    <span class="float-right">
                        <!-- <a href="{{route('agents.index')}}" class="btn btn-sm btn-danger float-right">Back</a> -->
                    </span>
                </div>
                <div class="card-body">
                    @include('multiauth::message')
                    <table  data-order='[[ 0, "desc" ]]' class="mb-0 table tableID">
                        <thead>
                            <tr>
                                <th>Id</th> 
                                <!-- <th>Agent</th>  -->
                                <th>Name</th> 
                                <th>Company Name</th> 
                                <th>Institution Name</th> 
                                <th>Mobile</th> 
                                <th>Email</th> 
                                <th>Country/City</th> 
                                <!-- <th>Applications</th>  -->
                                <!-- <th>Account Manager</th>  -->
                                <!-- <th>Last Login</th>  -->
                                <!-- <th>Status</th>  -->
                                <th>Applied at</th> 
                            
                            </tr>
                        </thead>
                        <tbody class="appendQualTest ">
                        @foreach ($agents as $agent)
                        
                        <tr class="text-center">
                            <td class="capitalize text-left"  >
                                {{ $agent->id }}
                            </td>
                            <!-- <td class="capitalize"  >
                                <div class="agntImg">
                                    <img src="{{asset($agent->attachment['path'].'/'.$agent->attachment['name'])}}" >
                                </div>
                                
                            </td> -->
                            <td class="capitalize text-left"  >
                                Amandeep Singh
                            </td>

                            <td class="capitalize text-left"  >
                                {{ $agent->company_name }}
                            </td>
                            <td class="capitalize text-left"  >
                                {{ $agent->college_name }}
                            </td>
                            <td class="capitalize text-left"  >
                                {{ $agent->mobileno }}
                            </td>
                            <td class="capitalize text-left"  >
                                {{ $agent->email }}
                            </td>

                            <td class="capitalize">
                                {{$agent->country['name']}}/{{$agent->city['name']}}
                            </td>
                            <!-- <td class="capitalize">
                                    @if($agent->studentsApp)
                                    {{$agent->studentsApp->count()}}
                                    @endif
                            </td> -->
                           <!--  <td class="capitalize">
                                {{$agent->accountManager['name']}}
                            </td> -->
                             <!-- <td class="capitalize text-left"  >
                                @if($agent->last_login)
                                {{ Carbon\Carbon::parse($agent->last_login)->format('d-M-Y h:s A') }}
                                @endif
                            </td>
                            @if($agent['status'] == '0')
                            <td class="capitalize badge badge-warning badge-pill mt-10">
                                    Deactivate
                            </td>
                            @endif
                            @if($agent['status'] == '1')
                            <td class="capitalize badge badge-success badge-pill mt-10">
                                Activated
                            </td>
                            @endif -->
                            <td class="capitalize text-left"  >
                                @if($agent->created_at)
                                {{ Carbon\Carbon::parse($agent->created_at)->format('d-M-Y h:s A') }}
                                @endif
                            </td>
                            
                        </tr>
                        @endforeach @if($agents->count()==0)
                        <p class="text-center">No Agent created Yet.</p>
                        @endif
                        </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection