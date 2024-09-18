@extends('admin.layouts.admin')
@section('content')
<style type="text/css">
    table td{
    font-size: 16px!important;
    color: white;
    }
</style>

@if(auth()->user()->roles[0]['name'] != 'super')
@if(!$todayData)
<button type="button" class="btn btn-primary hide openPop " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<div class="modal fade mt-5 mb-5 pb-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog mb-5" role="document">
        <div class="modal-content mb-5" style="min-width: 600px;">
            <form method="POST" action="{{route('teamreport.store')}}">
                @csrf
                <div class="modal-header bg-white" >
                    <h5 class="modal-title" id="exampleModalLabel">Attendance &nbsp; <i class="fa fa-file-invoice"></i> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                         </div>   
                        <div class="col-md-6">
                            <label>Time</label>            
                            <input type="time" name="time" class="form-control" placeholder="Time" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="number" name="emails" class="form-control" placeholder="emails" >
                            <input type="number" name="aus_applications" class="form-control" placeholder="AUS applications">
                            <input type="number" name="uk_payments" class="form-control" placeholder="UK payments" >
                            <input type="number" name="canada_offers" class="form-control" placeholder="Canada offers" >
                            
                        </div>
                        <div class="col-md-4">
                            <input type="number" name="canada_applications" class="form-control" placeholder="Canada applications">
                            
                            <input type="number" name="aus_payments" class="form-control" placeholder="AUS payments" >
                            <input type="number" name="uk_offers" class="form-control" placeholder="UK offers" >
                            <input type="text" name="remarks" class="form-control" placeholder="Remarks" >
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="background: linear-gradient(#e77817, #D80D05);border-color: #e35712;">Submit</button>
                </div>
            </form>
        </div>
        <!-- shortlisting -->

    </div>
</div>
@endif
@endif
@endsection
@section('addjavascript')
<script src="{{ asset('js/app.js') }}" ></script>
<script >
    $(document).ready(function(){
       $('.openPop').click(); 
       $('.modal-backdrop').css('position','inherit');
       setTimeout(function(){$('.modal-backdrop').css('position','inherit');},1000);
    });
    
    
    
    
</script>
@endsection