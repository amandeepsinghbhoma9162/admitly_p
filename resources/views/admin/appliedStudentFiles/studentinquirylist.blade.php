@extends('admin.layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    All Applied Students List &nbsp;
                    <!-- <span class="float-right">
                        <a href="{{route('studentfiles.create')}}" class="btn btn-sm btn-success">Apply New Student File</a>
                        </span> -->
                    <span class="float-right">
                        <!-- <a href="{{route('studentfiles.index')}}" class="btn btn-sm btn-danger float-right">Back</a> -->
                    </span>
                </div>
                <div class="card-body">
                    @include('multiauth::message')
                    <table data-order='[[ 0, "desc" ]]' class="align-middle text-truncate mb-0 table table-borderless table-hover tableID" >
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Mobile</th>
                                <th class="text-center">Country</th>
                                <th class="text-center">IELTS</th>
                                <th class="text-center">Reffer By</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $user =Auth::guard('admin')->user();
                                       
                                
                                ?>
                            @foreach($students as $student)
                            
                        
                            <tr>
                                <td class="text-center">
                                    <div class="badge badge-pill badge-danger num_1">{{ $student->id }}</div>
                                </td>
                                <td class="text-center">
                                    <div class="">{{ $student->name }}</div>
                                </td>
                                <td class="text-center">
                                    <div class="">{{ $student->email }}</div>
                                </td>
                                <td class="text-center">
                                    <div class="">{{ $student->phone }}</div>
                                </td>
                                <td class="text-center">
                                    <div class="">{{ $student->country }}</div>
                                </td>
                                <td class="text-center">
                                    <div class="">{{ $student->ielts }}</div>
                                </td>
                                <td class="text-center">
                                    <div class="">{{ $student->reffer_by }}</div>
                                </td>
                                
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('addjavascript')
<script src="{{ asset('js/app.js') }}" ></script>
@endsection