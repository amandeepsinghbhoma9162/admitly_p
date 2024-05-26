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
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
  

<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.4/metisMenu.css" rel="stylesheet"> -->
<link href="{{ asset('css/main.css') }}" rel="stylesheet">


<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<link href="{{ asset('css/agentui.css') }}" rel="stylesheet">
<link href="{{ asset('css/own.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@if(!Route::is('student.create') && !Route::is('student.edit') && !Route::is('quick.shortlisting.create') )    
  <!-- <link href="{{ asset('css/dmo.css') }}" rel="stylesheet"> -->
@endif

<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
    <!--  --></head>
<body oncontextmenu="return false;">
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header closed-sidebar" >
    @include('agent/components/header')
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
    @include('agent/components/setting') 
    <?php
     
        $isLogin = auth('agent')->user();
    $agent = auth('agent')->user();
        ?>
    @if($isLogin)
        <div class="ui-theme-settings">
<button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning" style="color: #7bab66!important;">
<i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
</button>
<div class="theme-settings__inner">
<div class="scrollbar-container ps ps--active-y">
<div class="theme-settings__options-wrapper">
<h3 class="themeoptions-heading">Contact Us</h3>
<div class="p-3">
<ul class="list-group">
<li class="list-group-item">
<div class="widget-content p-0">
<div class="widget-content-wrapper">
<div class="widget-content-left mr-3">
<div class="switch has-switch switch-container-class" data-class="">
<div class="switch-animate ">
<div class="btn btn-success" role="button" style="width: 56.5px; height: 33.1875px;"><div class="toggle-group"><i class="fa fa-phone"></i></div></div>
</div>
</div>
</div>
<div class="widget-content-left">
<div class="widget-heading">{{$agent->accountManager['name']}}</div>
<div class="widget-subheading"><a href="tel:{{$agent->accountManager['mobile']}}">+91: {{$agent->accountManager['mobile']}}</a>
<input type="hidden" id="pingval" value="{{base64_encode($agent->id)}}">
</div>
</div>
</div>
</div>
</li>
</ul>
</div>
<h3 class="themeoptions-heading">
<div><small>Just click on ping button, Concerned person will contact you shortly.</small></div>
<button type="button" class="btn-pill btn-shadow btn-wide ml-auto active btn btn-focus btn-sm" id="ping">Ping</button>
<p class="text-success hide pingmsg">Thank you | We will contact you shortly.</p>
</h3>
</div>
<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 649px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 359px;"></div></div></div>
</div>
</div>
        <div class="app-main">
        @include('agent/components/sidebar')
        @endif 
        <div class="app-main__outer" id="app"><br>
        @yield('content')
    </div>
</div>
<div class="modal"><!-- Place at bottom of page --></div>
<div class="modal1"><!-- Place at bottom of page --></div>
@include('agent/components/footer')
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$body = $("body");

// $(document).on({
//     ajaxStart: function() { $body.addClass("loading");    },
//      ajaxStop: function() { $body.removeClass("loading"); }    
// });
</script>
<!-- <script src="{{ asset('js/app.js') }}" ></script> -->
<script type="text/javascript" src="{{ asset('admins/js/main.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script
  async
  src="https://pay.google.com/gp/p/js/pay.js"
  onload="console.log('TODO: add onload function')">
</script>
<script type="text/javascript" src="{{ asset('js/agent.js') }}"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
<script type="text/javascript" src="{{ asset('admins/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('admins/js/ajax.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script type="text/javascript" src="{{ asset('admins/js/location.js') }}"></script>
<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script type="text/javascript">
    document.onkeydown = function(e) {
      if(event.keyCode == 123) {
         return false;
      }
      if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
         return false;
      }
      if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
         return false;
      }
      if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
         return false;
      }
      if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
         return false;
      }
    }

    document.addEventListener('contextmenu', function(e) {
      e.preventDefault();
    });
</script>

 @yield('addjavascript')



</div>



</body>
</html> 