<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Admitly</title>
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
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
    </head>
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
                                <a href="{{route('agent.login')}}" class="btn btn-danger float-right btn-default-color registerBackBtn"><i class="fa fa-arrow-left"></i> Back</a>
                                <div class="login_form">
                                    <a href="{{route('agent.login')}}"><img style="width: 25%" src="{{ asset('images/logo.png')}}"></a>
                                    <div class="small_txt">
                                        <!-- <p>Log in to most advanced Overseas Education Admission Portal.</p> -->
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
                                  <style type="text/css">
                                    .text-center{
                                        text-align: center;
                                    }
                                    .width-30{
                                        width: 30%;
                                    }
                                    .jumbotron{
                                            background-color: #ffffff;
                                    }
                                    .jumbotron h1{
                                                font-size: 33px;
                                            color: #e77817;
                                            text-transform: uppercase;
                                            font-weight: 600;
                                            margin-bottom: 25px;
                                    }
                                    .jumbotron .lead{
                                                font-size: 17px;
                                    }

                                    .jumbotron p a {
                                                  color: #e77817;
                                    }
                                    .jumbotron p .btn-sm
                                    {
                                        margin-top: 20px;
                                        box-shadow: none;
                                        font-size: 17px;
                                        padding: 10px 30px;
                                        background-image: linear-gradient(-90deg, #a61a0a, #ff4104);
                                        color: #fff; 
                                        border:none;
                                    }
                                </style>
                                <div class="jumbotron ">
                                  <div class="text-center" ><img class="text-center width-30" src="{{asset('images/site/check.gif')}}"></div>
                                  
                                  <div class="row">
                                    <div class="col-sm-12 col-md-10 offset-md-1">

                                        <h1 class=" text-center">Thanks for registering with us.</h1>
                                      <h5 class="lead text-center"><strong>“We will evaluate your documents and our team will get back to you soon, In the mean while please find below your contract, print it, sign it, stamp it (company stamp) and email it to <span class="text-warning">contact@admitly.ai</span>.” </h5>
                                      <hr>
                                      <p class="text-center">
                                        Having trouble? <a href="{{route('contactus')}}">Contact us</a>
                                      </p>
                                      <h3 class="text-center">
                                        Admitly Contract <a href="{{route('agent.createPdf',base64_encode($id))}}" target="_blank">Download Contract</a>
                                    </h3>
                                      <p class="lead text-center">
                                        <a class="btn btn-primary btn-sm btn-default-color" href="{{route('agent.login')}}" role="button">Back to login</a>
                                      </p>

                                    </div>
                                  </div>
                                  <div class="small_txt"><p>Connect with us on social media</p></div>
                                    <div class="social_m">
                                        <ul>
                                            <li> <a href="https://www.facebook.com/Admit-Offer-104241471171700/?modal=admin_todo_tour" ><i class="fa fa-facebook padding-top-10"></i></a></li>
                                            <li> <a href="https://www.instagram.com/admitoffer/" ><i class="fa fa-instagram padding-top-10"></i></a></li>
                                        </ul>
                                    </div>
                                  
                                </div>
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
                            <p>© Copyright 2019 . All Rights Reserved by Supernova Edu Technologies Inc.</p>
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