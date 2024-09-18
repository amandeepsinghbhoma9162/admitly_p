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
                    Event Agents List &nbsp;
                    <select class="" id="ChangeEvent">
                            <option value="1" {{ ( 1 == $eventType) ? 'selected' : '' }}>Chandigarh</option>
                            <option value="2" {{ ( 2 == $eventType) ? 'selected' : '' }}>Jalandhar</option>
                            <option value="3" {{ ( 3 == $eventType) ? 'selected' : '' }}>Hyderabad</option>
                            <option value="4" {{ ( 4 == $eventType) ? 'selected' : '' }}>Nepal</option>
                        </select>
                    <span class="float-right">
                        <!-- <a href="{{route('agents.index')}}" class="btn btn-sm btn-danger float-right">Back</a> -->
                    </span>
                </div>
                <div class="card-body">
                    @include('multiauth::message')
                    <table  data-order='[[ 0, "desc" ]]' class="mb-0 table tableID">
                        <thead>
                            <tr>
                                <th>ID</th> 
                                <th>Name</th> 
                                <th>Company Name</th> 
                                <th>Mobile</th> 
                                <th>Email</th> 
                                <th>Country/City</th> 
                                <th>Referred By</th> 
                                <th>Applied at</th> 
                                <th>Action</th> 
                            
                            </tr>
                        </thead>
                        <tbody class="appendQualTest ">
                        @foreach ($agents as $agent)
                        
                        <tr class="text-center">
                            <td class="capitalize text-left"  >
                                <b>{{ $agent->id }}</b><br>
                                
                            </td>
                            
                            <td class="capitalize text-left"  >
                                <b>{{ $agent['firstname'] }} {{ $agent['lastname'] }}</b><br>
                                
                            </td>

                            <td class="capitalize text-left"  >

                                <b>{{ $agent['organization'] }}</b><br>
                                
                            </td>
                            <td class="capitalize text-left"  >
                                <b>{{ $agent['phone'] }}</b><br>
                                
                            </td>
                            <td class="capitalize text-left"  >
                                <b>{{ $agent['email'] }}</b><br>
                                
                            </td>

                            <td class="capitalize">

                                <b>City: {{ $agent['city'] }}</b><br>
                                
                            </td>
                            <td class="capitalize">

                                <b>{{ $agent['accountManager'] }}</b><br>
                                
                            </td>
                            
                            <td class="capitalize text-left"  >
                                <b>@if($agent['created_at'])
                                {{ Carbon\Carbon::parse($agent['created_at'])->format('d-M-Y h:s A') }}
                                @endif</b>
                            </td>
                            <td class="capitalize text-left"  >
                                <a href="{{ route('event.agent.delete',$agent['id']) }}" class="btn btn-sm btn-danger mr-3">Delete</a>
                                
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
@section('addjavascript')
<script type="text/javascript">
    

    $(document).on('change','#ChangeEvent',function(){

    var ChangeEvent = $('#ChangeEvent').val();
        window.location.href = 'https://admitoffer.com/admin/agents/event/list/'+ChangeEvent;
    });
</script>
@endsection