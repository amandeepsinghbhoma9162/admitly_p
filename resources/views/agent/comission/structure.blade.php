@extends('agent.layouts.app')
@section('content')
<style type="text/css">
 
   #formTab td{
    border-right: 1px solid white;
  }
  #formTab tr{
        background: #f1eded!important;
        border-bottom: 1px solid #da251d! important;
  }
  #formTab .table{
        margin-bottom: 0rem! important;
  }
  #formTab .h3,h3,h4{
    text-align: center;
    padding: 10px;
    color: white;
    margin-bottom: 0;
  }
</style>
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
           
                <div class="card-body" id="formTab">
                    <div id="validation-errors">
                    </div>
                    <!-- start -->
                    <div class="h3">
                   	 <h2 style="font-weight: 600;">Commission Structure</h2>
                    </div>
                        {!!$commission['commission']!!}
                              
                          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection