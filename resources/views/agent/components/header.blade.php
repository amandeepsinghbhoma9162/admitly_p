<?php
  
    $isLogin = auth('agent')->user();
?>
@if($isLogin)
<div class="app-header header-shadow" >
    <div class="app-header__logo">
        <div class="logo-src"><a href="{{route('agent.dashboard')}}"> <img style="margin-top: -20px;" src="{{asset('images/logo.png')}}" width= '175px';></a></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav" style="color: #fff;
    background-color: #da251d;
    border-color: #da251d;">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    
    <div class="app-header__content">
        <div class="app-header-left">
            <!-- <div class="search-wrapper">
                <div class="input-holder">
                    <input type="text" class="search-input" placeholder="Type to search">
                    <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
            </div> -->
            <ul class="header-menu nav">
                <li class="nav-item">
                    <a href="{{route('search.index')}}" class="nav-link">
                        <i class="nav-link-icon fa fa-search"> </i>
                        Search Course
                    </a>
                </li>
                <!-- <li class="btn-group nav-item">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-link-icon fa fa-edit"></i>
                        Projects
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="nav-link-icon fa fa-cog"></i>
                        Settings
                    </a>
                </li> -->
            </ul>        
        </div>
        
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        @php $messages = Notify::messages();@endphp
                        @php $notifications = Notify::notifications();@endphp
                        @php $announcements = Notify::announcements();@endphp
                        <div class="widget-content-left mr-50 notifmsg">
                            <div class="">
                                <a data-toggle="dropdown" aria-haspopup="true" class="p-0 btn">
                                    
                                    <span class="msgCountAppend">
                                        @if($messages->count() > 0)
                                        <span class="msgCount" >{{$messages->count()}}</span>
                                        @endif
                                    </span >
                                    <i class="fas fa-envelope-square fa-2x ml-2 opacity-8" style="color:#e77817"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right appendMessageMsg">
                                    <h5 class="text-center">({{$messages->count()}}) Messages</h5>
                                    <!-- <div>
                                        <h6 class="">Mark Read All</h6>
                                    </div> -->
                                    <?php $j = 0; ?>
                                    @foreach($messages as $message) 
                                     
                                    @if($j++ == 5)
                                        @break
                                    @endif
                                        
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a class="onClickNotif" href="{{route('student.notify.update',$message['id'])}}">
                                        <p class="padding-10px onClickNotif font-size-12">
                                            <input type="hidden" class="notifyID" value="{{$message['id']}}">
                                            {{$message['message']}}
                                        </p>
                                    </a>
                                    @endforeach
                                    @if($notifications->count() > 0)
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a href="{{route('notification.messages.list')}}"><h6 class="text-center">View All</h6></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left mr-50 notifbell">
                            <div class="">
                                <a data-toggle="dropdown" aria-haspopup="true" class="p-0 btn">
                                    
                                    <span class="bellCountAppend">
                                        @if($notifications->count() > 0)
                                        <span class="bellCount" >{{$notifications->count()}}</span>
                                        @endif
                                    </span >
                                    <i class="fas fa-bell fa-2x ml-2 opacity-8" style="color:#e77817"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right appendMessage">
                                    <h5 class="text-center">({{$notifications->count()}}) Notifications</h5>
                                    <!-- <div>
                                        <h6 class="">Mark Read All</h6>
                                    </div> -->
                                    <?php $i = 0; ?>
                                    @foreach($notifications as $notification) 
                                     
                                    @if($i++ == 5)
                                        @break
                                    @endif
                                        
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a class="onClickNotif" href="{{route('student.notify.update',$notification['id'])}}">
                                        <p class="padding-10px onClickNotif font-size-12">
                                            <input type="hidden" class="notifyID" value="{{$notification['id']}}">
                                            {{$notification['message']}}
                                        </p>
                                    </a>
                                    @endforeach
                                    @if($notifications->count() > 0)
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <a href="{{route('notification.list')}}"><h6 class="text-center">View All</h6></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    @if($isLogin->attachment)
                                    
                                    <img width="42" class="rounded-circle" src="{{asset($isLogin->attachment['path'].'/'.$isLogin->attachment['name'])}}" alt="">
                                    @else
                                    <img width="42" class="rounded-circle" src="/images/avatars/5.png" alt="">
                                    @endif
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-292px, 44px, 0px);">
                                <div class="dropdown-menu-header">
                                    <div class="dropdown-menu-header-inner bg-info">
                                        <div class="menu-header-image opacity-2" style="background-image: url('/assets/site/city3.jpg');"></div>
                                        <div class="menu-header-content text-left">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <img width="42" class="rounded-circle" src="assets/site/1.jpg" alt="">
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">{{ Auth::guard('agent')->user()->name }}
                                                        </div>
                                                        <div class="widget-subheading opacity-8">({{ Auth::guard('agent')->user()->company_name }} )
                                                        </div>
                                                        <h5>
                                                        AO UIC :- AO{{ Auth::guard('agent')->user()->id}}
                                                        </h5>
                                                    </div>
                                                    <div class="widget-content-right mr-2">
                                                        <a  href="{{ route('agent.logout') }}" tabindex="0" class="btn-pill btn-shadow btn-shine btn btn-focus" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                                {{ __('Logout') }}
                                                        </a>
                                                        <form id="logout-form" action="{{ route('agent.logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="scroll-area-xs" style="height: 150px;">
                                    <div class="scrollbar-container ps">
                                        <ul class="nav flex-column">
                                            <li class="nav-item-header nav-item">Activity
                                            </li>
                                           
                                            <li class="nav-item">
                                                <a href="{{route('agent.change.password')}}" class="nav-link">Change Password
                                                </a>
                                            </li><li class="nav-item">
                                                <a href="{{ route('user.profile') }}" class="nav-link">My Account
                                                </a>
                                            </li>
                                            
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" class="nav-link">Settings
                                                    <div class="ml-auto badge badge-success">New
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('notification.messages.list')}}" class="nav-link">Messages
                                                    <div class="ml-auto badge badge-warning">512
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" class="nav-link">Logs
                                                </a>
                                            </li>
                                        </ul>
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                                </div>
                                <ul class="nav flex-column">
                                    <li class="nav-item-divider mb-0 nav-item"></li>
                                </ul>
                                <div class="grid-menu grid-menu-2col">
                                    <div class="no-gutters row">
                                        <div class="col-sm-6">
                                            <a href="{{route('notification.messages.list')}}" class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-warning">
                                                <i class="pe-7s-chat icon-gradient bg-amy-crisp btn-icon-wrapper mb-2"></i>
                                                Message Inbox
                                            </a>
                                        </div>
                                        <div class="col-sm-6">
                                            <button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">
                                                <i class="pe-7s-ticket icon-gradient bg-love-kiss btn-icon-wrapper mb-2"></i>
                                                <b>Support Tickets</b>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav flex-column">
                                    <li class="nav-item-divider nav-item">
                                    </li>
                                    <li class="nav-item-btn text-center nav-item">
                                        <a href="{{route('notification.messages.list')}}" class="btn-wide btn btn-primary btn-sm" style="background-color: #7862a2!important; border-color: #7862a2!important; ">
                                            Open Messages
                                        </a>
                                    </li>
                                </ul>
                            </div>




                            
                            </div>
                        </div>
                        <div class="widget-content-left  ml-3 header-user-info dasFontWeight500">
                            <div class="widget-heading" style="color: black;">
                             Welcome {{ Auth::guard('agent')->user()->name }} <small> <!--({{ config('multiauth.prefix') }}) --></small>
                            </div>
                         
                        </div>
                        <div class="widget-content-right header-user-info ml-3">
                            <!-- <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                            </button> -->
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>
@if($announcements['status'] == 1)
<div class="app-header header-shadow" style="top: 61px; padding: 0px!important; margin: 0px; height: 30px;z-index: 8;background: #f3f3f3;">
<div class="app-header__content">
<marquee> <img src="{{asset('images/spekar.png')}}" width="40px;" style="animation: blink .5s step-end infinite alternate; transition: color .15s,background-color .15s,border-color .15s,box-shadow .15s;" >&nbsp; <span style="background: white;
    padding: 5px;
    color: #7bab66;
    border-radius: 10px;
    font-weight: 800;">{{$announcements['name']}} @if($announcements['link'])<a href="{{$announcements['link']}}"  target= "_blank">Click here..</a> for more details. @endif </span></marquee>
</div>
</div>
@endif


@endif
        