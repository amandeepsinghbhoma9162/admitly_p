<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Admit Offer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{ asset('css/stroke.css')}}" rel="stylesheet">
        <script src="https://use.fontawesome.com/72451ebe5b.js"></script>
        <link href="https://use.fontawesome.com/72451ebe5b.css" media="all" rel="stylesheet">
        <link href="{{ asset('css/signin.css')}}" rel="stylesheet">
        <link href="{{ asset('css/custom.css')}}" rel="stylesheet">
        <link href="{{ asset('css/signup.css')}}" rel="stylesheet">
        <link href="{{ asset('css/own.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
    </head>
    <style>
    .blahSize {
        display: none;
        width: 100px;
        height: 100px;
        padding: 8px;
        border-radius: unset;
        border: 2px solid #eaeaea;
        margin-bottom: 10px;
    }
    .blah {
        border-radius: unset;
    }
    </style>
    <body class="text-center signUpbody">
        @if(Session::has('success'))
            <div class="btn btn-success popOver float-right ">
                <div class="btn btn-success">
                    <strong class="text-white">Heads Up!</strong><span class="text-white"> {!!Session::get('success')!!}</span>
                </div>
            </div>
        @endif
        <div class="container ">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-10 offset-lg-1">
                    <div class="sec1">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-12 col-lg-12 part1 border-radius10">
                                <a href="{{route('agent.login')}}" class="btn btn-danger float-right registerBackBtn"><i class="fa fa-arrow-left"></i> Back</a>
                                <div class="login_form">
                                    <h4>Welcome To</h4>
                                    <a href="{{route('agent.login')}}"><img src="{{ asset('images/logo.png')}}"></a>&nbsp;<span style="    font-size: 30px;
    font-weight: 600;
    color: #e7781769;
    padding: 20px;"> </span>&nbsp;
                                    <a href="{{route('agent.login')}}"><img src="{{ asset('images/eagleLogoe.png')}}"></a>
                                    <div class="small_txt">
                                        <p>Register for most advanced Overseas Education Admission Portal.</p>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li><small>{{ $error }}</small></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form class="form-signin signUp" enctype="multipart/form-data" method="POST" action="{{ route('agent.eagle.signup.store') }}" aria-label="{{ __('Register') }}">
                                        @csrf
                                        <div class="login_input">  
                                            <i class="icon icon-house"></i>
                                            <label for="name" class="sr-only">Institution Name </label>  
                                            <input id="name" type="text" class="form-control{{ $errors->has('college_name') ? ' is-invalid' : '' }}" name="college_name" value="{{ old('college_name') }}"  placeholder="institution Name" required autofocus>
                                            @if ($errors->has('college_name'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('college_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="login_input">  
                                            <i class="icon icon-User"></i>
                                            <label for="name" class="sr-only">Name </label>  
                                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  placeholder="Name" required autofocus>
                                            @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                         <!-- <div class="login_input">  
                                            <i class="icon icon-house"></i>
                                            <label for="name" class="sr-only">Institution </label>  
                                            <input id="name" type="text" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" value="{{ old('company_name') }}"  placeholder="Institution"  autofocus>
                                            @if ($errors->has('company_name'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('company_name') }}</strong>
                                            </span>
                                            @endif
                                        </div> -->
                                        
                                       
                                        <div class="login_input">
                                            <i class="icon icon-mail"></i>
                                            <label for="inputEmail" class="sr-only">Email address</label>
                                            <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email address" name="email" value="{{ old('email') }}" required="">
                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="login_input">
                                            <i class="fa fa-phone"></i>
                                            <label for="mobile" class="sr-only">Phone</label>
                                            <input  type="number" id="mobile" placeholder="Phone"  class="form-control{{ $errors->has('mobileno') ? ' is-invalid' : '' }}" name="mobileno" value="{{ old('mobileno') }}" required>
                                            @if ($errors->has('mobileno'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('mobileno') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        
                                        <h3 style="color:#b5b3b3;">Registered Address</h3>
                                        <div class="login_input">
                                            <i class="fa fa-map-marker"></i>
                                            <label for="mobile" class="sr-only">Select Country</label>
                                            <select class="form-control" name="country_id" id="country_id" placeholder="Select Country" required>
                                                <option value=''> Select Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{$country['id']}}"> {{$country['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="login_input">
                                            <i class="fa fa-map-marker"></i>
                                            <label for="mobile" class="sr-only">Select State</label>
                                            <select class="mb-2 form-control" placeholder="Select state" name="state_id" id="state_id"  required>
                                                <option value=''> Select State</option>
                                            </select>
                                        </div>
                                        <div class="login_input">
                                            <i class="fa fa-map-marker"></i>
                                            <label for="mobile" class="sr-only">Select City</label>
                                            <select class=" form-control" name="city_id" placeholder="Select city" id="city_id"  required>
                                                <option value=''> Select City</option>
                                            </select>
                                        </div>
                                        <div class="login_input">
                                            <i class="icon icon-address"></i>
                                            <label for="inputPassword" class="sr-only">Address</label>
                                            <textarea class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Address" name="address" style="height: 86px;padding:10px;vertical-align: middle;" required></textarea>
                                            @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        
                                        <div class="login_input">
                                            <i class="icon icon-ClosedLock"></i>
                                            <label for="inputPassword" class="sr-only">Password</label>
                                            <input type="password" id="inputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required="">
                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="login_input">
                                            <i class="icon icon-ClosedLock"></i>
                                            <label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
                                            <input type="password" id="inputConfirmPassword" class="form-control{{ $errors->has('ConfirmPassword') ? ' is-invalid' : '' }}" placeholder="Confirm Password" name="password_confirmation" required="">
                                            @if ($errors->has('password_confirmation'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        
                                        <div class="checkbox mb-3 float-left small_txt hide ShowOnlyChd" >
                                           
                                                <label class="containerCheckBox"><small style="color:#b1b1b1" ><span style="font-size: 12px; color: #b1b1b1; margin-bottom: 0;"></span>Do you have SSP office certificate ?</span></small>
                                                    <input id="gender" type="checkbox" name="sspoffice" class="ifChdReq mb-2 displayNone"    >   
                                                    <span class="checkmarked"></span>
                                                </label>
                                        </div>
                                        
                                        <button class="btn btn-lg  btn-block btn2" id="checkprivacy" type="submit" >Register</button>
                                        <!-- <p class="text-center text-danger mt-2">All Documents are required*</p> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-------- sec1 end --------->
                </div>
            </div>
            <div class="row loginRegisterFooter" >
                <div class="col-md-12">
                    <div class="footer text-center" >
                        <div class="small_txt">
                            <!-- <p>© Copyright 2019 . All Rights Reserved by  Admit Offer Technologies Ltd.</p> -->
                            <p>© Copyright 2019 . All Rights Reserved by  Supernova Edu Technologies Inc.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="{{ asset('admins/js/custom.js')}}" ></script>
        <script type="text/javascript" src="{{ asset('admins/js/location.js')}}" ></script>
    </body>
</html>