<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Admitly</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/assets/img/favicon.png')}}" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an admitoffer panel.">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />

  <link href="https://admitly.ai/css/bootstrap-icons.css" rel="stylesheet">
  <link href="https://admitly.ai/css/agentui.css" rel="stylesheet">
  <link href="https://admitly.ai/css/own.css" rel="stylesheet">
  <link href="https://admitly.ai/css/custom.css" rel="stylesheet">
 <link href="https://admitly.ai/css/main.css" rel="stylesheet">
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.4/metisMenu.css" rel="stylesheet"> -->
<link href="{{ asset('css/main.css') }}" rel="stylesheet"></head>
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<link href="{{ asset('css/own.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/agentui.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('css/dmo.css') }}" rel="stylesheet"> -->
<link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">
<style>
    .ps__thumb-y {
        width: 5px!important;
    }
    .ps--active-x>.ps__rail-x, .ps--active-y>.ps__rail-y {
    width: 5px;
}
.widget-heading{
    color: black!important;
}
</style>
</head>
<body style=" color: black!important;">
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header closed-sidebar" >
    @include('admin/components/header')
    @if(Session::has('success'))
        <div class="btn btn-success popOver">
            <strong>{!!Session::get('success')!!}</strong> 
        </div>
    @endif
    @if(Session::has('error'))
        <div class="btn btn-danger popOver">
            <strong>{!!Session::get('error')!!}</strong> 
        </div>
    @endif
    @include('admin/components/setting') 
    <?php
        $isLogin = \Auth::user();
        $roleType = config('multiauth.prefix');
        if($roleType =="admin"){
            $isLogin = auth('admin')->user();
        }
        ?>
    @if($isLogin)
        <div class="app-main">
        @include('admin/components/sidebar')
    @endif 
        <div class="app-main__outer" id="app"><br>
            @yield('content')
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('admins/js/main.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('admins/js/location.js') }}"></script>
<script>
$(document).on('click','#btnSubmit',function(){

    var text = $('#searchboxtext').val();
    if(!text){
        alert('Please fill search box');
        return false;
    }
    window.location.href = '/admin/find/student/'+text;
 });        
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="{{ asset('admins/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('admins/js/admin.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script >
     $(window).load(function(){
        $.ajaxSetup({
            statusCode: {
                419: function(){
                        location.reload(); 
                    }
            }
        });
    });
</script>
<!-- <script src="{{asset('js/app.js') }}" ></script> -->
@yield('addjavascript')


</div>



</body>
</html>