<?php
$studentUser =Auth::guard('student')->check();
$agentLogin =Auth::guard('agent')->check();
$localSearch =\Request::is('local/search'); 
?>
@if($agentLogin)
    <style>
        .beforeLogin{
            display: none!important;
        }
    </style>
@endif
<style>
  .stepsMainBar{
        margin: 40px 0px 60px 0px;
    }
    .stepsTopBar{
        background: #ede7f6;
        width: 100%;
        padding: 0px;
        height: 10px;
    }
    .stepsTopBar .step1 {
        width: 150px;
        margin: -18px 0px 0px 0px;
    }
    .stepsTopBar .step1 label{
        width: 45px;
    background: #7bab66;
    text-align: center;
    border-radius: 50%;
    color: white;
    height: 45px;
    padding: 2.2%;
    box-shadow: 1px 0.4px 2px #00000087;
    border: 2px solid #7bab66;
    font-size: 25px!important;
    float: right;
    }
    .stepsTopBar .step2 {
        width: 150px;
        margin: -18px 0px 0px 0px;
    }
    .stepsTopBar .step2 label{
        width: 45px;
    background: #7bab66;
    text-align: center;
    border-radius: 50%;
    color: white;
    height: 45px;
    padding: 2.2%;
    box-shadow: 1px 0.4px 2px #00000087;
    border: 2px solid #7bab66;
    font-size: 25px!important;
    float: right;
    }
    .stepsTopBar .step3 {
        width: 150px;
        margin: -18px 0px 0px 0px;
    }
    .stepsTopBar .step3 label{
        width: 45px;
    background: white;
    text-align: center;
    border-radius: 50%;
    color: #5a76d7;
    height: 45px;
    padding: 2.2%;
    box-shadow: 1px 0.4px 2px #00000087;
    border: 2px solid #7bab66;
    font-size: 25px!important;
    float: right;
    }
    label{
        font-size:15px!important; 
    }
    .stepsHead{
        width: 250px;
    }
    .stepsHead p{
        float: right;
    text-align: center;
    width: 100%;
    }
    .navbar{
        margin-left: 38%!important;
    }
</style>
@if($localSearch)

    @include('admitoffer._head')

<style>
@media(min-width:1280px)
{
 #home
 {
 color: var(--color-primary);
    background: #ffebe6;
 }
 }
 #home
 {
 color: var(--color-primary);
 }
</style>

<body>
@include('admitoffer.header')
<style>
    
    .app-theme-white.app-container{
        background: white!important;
    }
    .app-main__inner{
        display: none;
    }
    .isItetsClass{
        background: white!important;
        box-shadow: 0.5px 1px 4px #4665d338;
    }
    .search .bgColorGray{
        background-color: #4665d30f!important;
    }
    .search .form-control{
        border: 2px solid #4665d338!important;
        border-radius: 5px;
    }
    .input-holder{
        border: 2px solid #4665d338!important;
        border-radius: 5px;
        background: white!important;
    }
    .app-main__outer .backToHome a {
        background: linear-gradient(to right,#673AB7 0,#2196F3 100%)!important;
    box-shadow: 0 10px 15px 0 rgba(56,0,189,.2)!important;
    line-height: 48px!important;
    border-radius: 100px!important;
    padding: 0 20px;
    border:none!important;
    }
    .app-main__outer .vertical-nav-menu i.metismenu-icon{
        color: #4665d3;
    }
    .app-main__outer .QuickBtn a{
    font-size: 16px!important;
    font-weight: 400!important;
    font-family: Poppins,sans-serif!important;
    padding: 0 32px!important;
    line-height: 56px!important;
    text-align: center!important;
    outline: 0!important;
    border: none!important;
    border-radius: 100px!important;
    display: inline-block!important;
    position: relative!important;
    visibility: visible!important;
    animation-delay: 0.6s!important;
    animation-name: zoomInDown!important;
    background: linear-gradient(to right,#f92c8b 0,#b02cd6 100%)!important;
    box-shadow: 0 10px 15px 0 rgba(175,0,202,.2)!important;
    margin-bottom: 10px;
    }

    .searchListBody .mainBgColor{
        color: #ed3d0b;
    }
    .searchListBody .filterCourseSetting{
        color: #544d4ded!important;
    }
    #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.navbar a, .navbar a:focus {
    font-weight: 300!important;
    
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}


</style>
<!-- <div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<img src="{{asset('admitoffer/img/welcometoAO.jpg')}}" id="myImg"  alt="Snow" style="width:100%;max-width:300px;display: none;"> -->

    
@endif

@extends(($studentUser === false) ? 'agent.layouts.app' : 'applicant.layouts.app')
@section('content')
<style >
.closed-sidebar .app-sidebar:hover {
     flex: 0 0 280px!important; 
     width: 280px!important; 
}
.closed-sidebar .app-sidebar: {
     flex: 0 0 280px!important; 
     width: 280px!important; 
    position: static!important;
}
.positionUnset {
     flex: 0 0 280px!important; 
     width: 280px!important; 
    position: static!important;
}
.app-sidebar{
    position: static!important;
}
</style>
<div class="app-main__inner" style="flex: none;">
  <div class="stepsMainBar">
            <div class="stepsTopBar">
            <div class="row">
                <div class="col-md-4">
                    <div class="step1">
                        <label>1</label>
                    </div>
                    <div class="stepsHead">
                        <p>Basic Details</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step2">
                        <label>2</label>
                    </div>
                    <div class="stepsHead">
                        <p>Shortlist Programs</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step3">
                        <label>3</label>
                        <div class="stepsHead">
                        <p>Verify & Final Submit</p>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="app-page-title row">

            <div class="page-title-wrapper col-md-6">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-search icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Search For Your Course &nbsp;

                        <div class="page-title-subheading">This is a search about course requirements
                        </div>
                    </div>
                </div>
                        
            </div>

            <?php
            $student = Session::get('student');
            ?>
            @if($student)
            <div class="col-md-6" id="searchStudentBarId">
            <div class="row searchStudentBar float-left" id="searchStudentBarId">
                
                <div class="col-md-7 capitalize">
                    <h6 class="pad-t-b-10">{{$student['firstName']}} {{$student['lastName']}}</h6>
                </div>
                <div class="col-md-5 faDiv capitalize">
                    <a href="{{route('session.status','remove')}}" class="btn btn-danger btn-default-color">Back</a>
                </div>
            </div>

            @if($studentUser === true)
            <div class=" float-right" >
                
                <a class="btn btn-info btn-default-color {{($student->appliedStudentFiles->count() == 0 ) ? 'hide' : ''}}" id="subRequest" style="border: none;background: white;" href="{{route('EditStudent.show',base64_encode($student['id']))}}">Continue <i class="fa fa-arrow-right"></i></a> 
            </div>
             @else
            <div class=" float-right" >
                 @if($student)
                <div>
                <a class="btn btn-info btn-default-color" style="border: none;background: #e77817; position: fixed; top: 140px; right: 12px; z-index: 9999;padding: 20px; font-size: 18px;" href="{{route('student.show',base64_encode($student['id']))}}">Click Here For Skip Program Selection <i class="fa fa-arrow-right"></i>
                    <div>
                        
                    <small>Let Admitly select appropriate programs for you</small>
                    </div>
                </a>
                </div>
                <br>
                @endif
                <a class="btn btn-info btn-default-color {{($student->appliedStudentFiles->count() == 0 ) ? 'hide' : ''}}" id="subRequest" style="border: none;background: white;" href="{{route('student.show',base64_encode($student['id']))}}">Continue <i class="fa fa-arrow-right"></i></a> 
            </div>
            @endif
            @if($studentUser === true)
            <div class="applyContinueBtn float-right" >
                
                <a class="btn btn-info btn-default-color {{($student->appliedStudentFiles->count() == 0 ) ? 'hide' : ''}}" id="subRequests" href="{{route('EditStudent.show',base64_encode($student['id']))}}" style="background: #e77817;">Continue <i class="fa fa-arrow-right"></i></a> 
            </div>
            @else
            
            <div class="applyContinueBtn float-right" >
                
                <a class="btn btn-info btn-default-color {{($student->appliedStudentFiles->count() == 0 ) ? 'hide' : ''}}" id="subRequests" href="{{route('student.show',base64_encode($student['id']))}}" style="background: #e77817;">Continue <i class="fa fa-arrow-right"></i></a> 
            </div>
            @endif
            </div>
            @endif
                
           
        </div>    
        
    </div>
    @if($localSearch)
 <!-- 
            <div style="position: fixed;right: 0;top:40%;z-index: 9999999;">
                
            <div class="QuickBtn">
                
            <a href="{{route('quick.shortlisting.create')}}" class="btn btn-warning" style="float:right;background:#da251d;border: 1px solid #da251d;color:white;" ><i class="fa fa-plus"></i> Quick Shortlist</a>
            </div>
            <br>
            <div class="backToHome" id="searchStudentBarId">
                <a href="{{route('home')}}" class="btn btn-danger" style="float:right;background:#da251d;border: 1px solid #da251d;" >Back to home</a>&nbsp;
                
            </div>
            </div> -->
            @endif
           
    <!-- <div class="col-md-12">
        <div class="row">
            <div class="bg-Img">
                <h1>Find Course</h1>
            </div>
        </div>
    </div> -->


        <searchcources-component></searchcources-component>
    <!-- <p  class="text-center">NOTE: <small>This is an approximate yearly fees. The fees may vary. Final Fees should be verified from institute website OR It will be mentioined on the offer letter. </small> </p> -->
    

  <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-12 footer-info">
                    <a href="index.php" class="logo d-flex align-items-center">
                        <img src="{{asset('assets/assets/img/logo.png')}}" style="max-width: 70%!important;">
                    </a>
                    <p></p>

                    <div class="social-links d-flex mt-0 mb-3 justify-content-left" style="margin-top: 7%!important;">
                        
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.linkedin.com/company/admitlyai/" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4 style="color: #7862a2;">Company</h4>
              <ul style="color: #0000008f;list-style: none; margin-left: -35px;">
                <li><a style="color: #0000008f;" href="{{route('aboutus')}}">About</a></li>
                <!-- <li><a href="{{route('disclaimer')}}">Disclaimer</a></li> -->
                <li><a style="color: #0000008f;" href="{{route('refund_policy')}}">Refund policy</a></li>
                <li><a style="color: #0000008f;" href="{{route('termsandconditions')}}">Terms of service</a></li>
                <li><a style="color: #0000008f;" href="{{route('privacy_policy')}}">Privacy policy</a></li>
                <!--<li><a href="{{route('pricing')}}" id="pricing">Pricing</a></li>-->
                <li><a style="color: #0000008f;" href="{{route('blog')}}" id="blog">Blog</a></li>
                <li><a style="color: #0000008f;" href="{{route('myteam')}}" >Team</a></li>
                  </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4 style="color: #7862a2;">Info</h4>
              <ul style="color: #0000008f; list-style: none; margin-left: -35px;">
                <li><a style="color: #0000008f;" href="{{route('careers')}}">Careers</a></li>
                            <!-- <li><a style="color: #0000008f;" href="{{route('event')}}">Events</a></li> -->
                            <li><a style="color: #0000008f;" href="{{route('contactus')}}">Contact us</a></li>
                            <!-- <li><a href="{{route('recognition')}}">Recognition</a></li> -->
                            <li><a style="color: #0000008f;" href="{{route('pressreleases')}}">Press Releases</a></li>
                            <li><a style="color: #0000008f;" href="{{route('for-students')}}">Students</a></li>
                            <li><a style="color: #0000008f;" href="{{route('for-recruiters')}}">Agents</a></li>
                            <li><a style="color: #0000008f;" href="{{route('for-instituties')}}">School</a></li>
                  </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-contact text-left text-md-start">
                    <h4 style="color: #7862a2;">Contact Us</h4>
              <p>
                        <strong style="color: #0000008f;">Phone:</strong> +1 6474676611<br>
                        <strong style="color: #0000008f;">Email To:</strong><a href="mailto:contact@admitly.ai"> contact@admitly.ai</a><br>
                    </p>
                    <p>
                        <strong style="color: #0000008f;">HO Address:</strong> Admission Overseas Ltd, OneEleven, 325 Front St W, Toronto ON M5V 2Y1 <br><br>

                    </p>
                    

                </div>

            </div>
        </div>

        <!-- <div class="footer2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="copyright text-center">
                            &copy; Copyright 2023. All Rights Reserved by Admission Overseas Ltd
                        </div>
                    </div>
                   
                </div>
            </div>
        </div> -->

    </footer>          
@endsection
@section('addjavascript')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.app-container').removeClass('closed-sidebar');
        });
    </script>
        <script src="{{ asset('js/app.js') }}" ></script>

        <script>
            $(document).ready(function(){
                $('#myImg').click();
            });
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
setTimeout(function() {
    $(span).click();
}, 5000);
</script>

        <noscript>
            <script src="{{ asset('admins/js/ajax.js') }}" ></script>
            <script src="{{ asset('admins/js/admin.js') }}" ></script>
        </noscript>
@endsection