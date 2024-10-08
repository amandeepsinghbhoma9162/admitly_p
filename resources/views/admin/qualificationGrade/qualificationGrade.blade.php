@extends('admin.layouts.admin') 
@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                Qualification Grades &nbsp;
                    <span class="float-right">
                        <a href="{{route('studentQualificationGrades.create')}}" class="btn btn-sm btn-success">Add Qualification Grade</a>
                    </span>
                </div>
                <div class="card-body">
                    @include('multiauth::message')
                    <ul class="list-group">
                        @foreach ($qualificationGrades as $qualificationGrade)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $qualificationGrade->qualification_grade }}
                            <div class="float-right">
                                <!-- <a href="#" class="btn btn-sm btn-secondary mr-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $qualificationGrade->id }}').submit();">Delete</a>
                                <form id="delete-form-{{ $qualificationGrade->id }}" action="{{ route('studentQualificationGrades.destroy',[$qualificationGrade->id]) }}" method="POST" style="display: none;">
                                    @csrf @method('delete')
                                </form> -->

                                <a href="{{route('studentQualificationGrades.edit',base64_encode($qualificationGrade->id))}}" class="btn btn-sm btn-info mr-3">Edit</a>
                            </div>
                        </li>
                        @endforeach @if($qualificationGrades->count()==0)
                        <p class="text-center">No Qualification Grade created Yet.</p>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection