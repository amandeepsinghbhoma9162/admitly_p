<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admitly</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/assets/css/main.css')}}" rel="stylesheet">
</head>

<body>


    <main id="main">



        <!-- ======= blue Section ======= -->
        
        <!-- End blue Section -->
        <!-- ======= blue Section ======= -->
        <section class="login_section">
            <div class="container-fluid p0">

                <div class="row g-5 align-items-center">
                
                <div class="col-lg-6">
                        <div class="login-bg max-width-auto">
                            
                            
                            <img src="{{asset('assets/assets/img/logo.png')}}" alt="Admitly" style="max-width: 43%;">
                            <h3 class="title">Agent Login</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li><small>{{ $error }}</small></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('agent.login') }}" method="post" id="contact-form">
                              @csrf
                        <div class="rounded-0">
                            
                            <div class="card-body">

                                <!--Body-->
 
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required="">
                                        @if ($errors->has('email'))
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        
                                        <input type="password" id="inputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required="">
                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                
                                

                                <div class="text-left">
                                <!--<button data-sitekey="Your_reCaptcha_Public_Key" data-callback="onSubmit" data-action="submit"  class="g-recaptcha btn3">Submit</button>  -->
                                <button data-callback="onSubmit" data-action="submit"  class="g-recaptcha btn3">Login</button> 
                                    
                                </div>
                                <div id="message"></div>
                            </div>
                            <div class="col-md-6 form-group v-center text-right login_links"><a href="{{ route('agent.password.request') }}" class="psforgt">Forgot Password?</a> </div>
                            <div class="float-right login_links" style="text-align: right; margin-top: -45px;" >
                            <a href="{{ route('agent.registers') }}" class="btn-main fb-btn"><i class="fab fa-facebook-f"></i>Sign Up</a></div>
                            </div>
                            
                        </div>
                    </form>
                        </div>
                        
                        
                    <div class="col-lg-6 bg_agent_img">
                        <div>
                            <div class=""><img class="w-100 radius-6" src="{{asset('assets/assets/img/img_1.png')}}" alt="Contact Images"></div>
                        </div>
                    </div>

                    
                    </div>
                </div>


            </div>

            </div>
        </section>
        





    </main>
</body>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e550274298c395d1ce9b15e/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</html> 
