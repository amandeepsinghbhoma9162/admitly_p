<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8" />
<title>Admitly.ai - Higher Education Redefined.</title>

<link href="images/favicon.png" rel="icon">

<link href="{{ asset('admitoffer/theme/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('admitoffer/theme/css/fonts.css') }}" rel="stylesheet">
<link href="{{ asset('admitoffer/theme/css/darkmode.css') }}" rel="stylesheet">
<link href="{{ asset('admitoffer/theme/css/demo-css.css') }}" rel="stylesheet">
<link href="{{ asset('admitoffer/theme/css/gdpr-cookie.css') }}" rel="stylesheet">
<link href="{{ asset('admitoffer/theme/css/ihavecookie.css') }}" rel="stylesheet">
<link href="{{ asset('admitoffer/theme/css/plugin.min.css') }}" rel="stylesheet">
<link href="{{ asset('admitoffer/theme/css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('admitoffer/theme/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('admitoffer/theme/css/swiper.min.css') }}" rel="stylesheet">
</head>
<body>

<header class="header-pr nav-bg-w main-header navfix fixed-top menu-white">
<div class="container-fluid m-pad">
<div class="menu-header">
<div class="dsk-logo"><a class="nav-brand" href="index.html">
<img src="{{asset('admitoffer/img/logo.png')}}" alt="Logo" class="mega-white-logo" />
<img src="{{asset('admitoffer/img/logo.png')}}" alt="Logo" class="mega-darks-logo" />
</a>
</div>
<div class="custom-nav" role="navigation">
<ul class="nav-list">
<li class="sbmenu">
<a href="{{route('home')}}" class="menu-links">Home</a>
</li>
<li class="sbmenu">
<a href="{{route('aboutus')}}" class="menu-links">About Us</a>
</li>
<li class="sbmenu">
<a href="{{route('contactus')}}" class="menu-links">Contact Us</a>
</li>
<li class="sbmenu rpdropdown">
<a href="{{route('gallery')}}" class="menu-links">Gallery</a>
</li>
<li class="sbmenu rpdropdown">
<a href="#" class="menu-links">Solution</a>
</li>
</ul>

<ul class="nav-list right-end-btn">
<!-- <li class="hidemobile"><a data-bs-toggle="" href="" class="btn-round- btn-br bg-btn2"><i class="fas fa-phone-alt"></i></a></li> -->
<li class="hidemobile"><a href="{{route('agent.login')}}" class="btn-br bg-btn3 btshad-b2 lnk">Agent Login <span class="circle"></span></a> </li>
<!-- <li class="hidedesktop darkmodeswitch"><div class="switch-wrapper"> <label class="switch" for=""> <input type="checkbox" id="" /> <span class="slider round"></span> </label> </div> </li> -->
<li class="hidedesktop"><a data-bs-toggle="" href="#" class="btn-round- btn-br bg-btn2"><i class="fas fa-phone-alt"></i></a></li>
<li class="navm- hidedesktop"> <a class="toggle" href="#"><span></span></a></li>
</ul>
</div>
</div>

<nav id="main-nav">
<ul class="first-nav">
<li>
<a href="#">Home</a>
<ul>
<li>
<a href="#">Multi-Page Demo</a>
</li>
<li>
<a href="#">One-Page Demo</a></li>
<li>
<a href="#">Pages</a></li>
<li>
<a href="#">Shortcodes</a></li>
<li>
<a href="#">Portfolio</a></li>
<li>
<a href="#">Blog</a>
</li>
</ul>
<ul class="bottom-nav">

</ul>
</nav>
</div>
</header>

<!-- <div class="popup-modal1">
<div class="modal" id="menu-popup">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<div class="common-heading">
<h4 class="mt0 mb0">Write a Message</h4>
</div>
<button type="button" class="closes" data-bs-dismiss="modal">&times;</button>
</div>

<div class="modal-body">
<div class="form-block fdgn2 mt10 mb10">
<form action="#" method="post" name="feedback-form">
<div class="fieldsets row">
<div class="col-md-12"><input type="text" placeholder="Full Name" name="name"></div>
<div class="col-md-12"><input type="email" placeholder="Email Address" name="email"></div>
<div class="col-md-12"><input type="number" placeholder="Contact Number" name="phone"></div>
<div class="col-md-12"><input type="text" placeholder="Subject" name="subject"></div>
<div class="col-md-12"><textarea placeholder="Message" name="message"></textarea></div>
</div>
<div class="fieldsets mt20 pb20">
<button type="submit" name="submit" class="lnk btn-main bg-btn" data-bs-dismiss="modal">Submit <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div> -->



<section class="breadcrumb-area banner-3">
<div class="text-block">
<div class="container">
<div class="row">
<div class="col-lg-12 v-center">
<div class="bread-inner">
<div class="bread-menu">
<ul>
<li><a href="index-2.html">Home</a></li>
<li><a href="#">Gallery</a></li>
</ul>
</div>
<div class="bread-title">
<h2>Gallery</h2>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="portfolio-page pad-tb">
<div class="container">
<div class="row justify-content-left">
<div class="col-lg-6">
<div class="common-heading pp">
<span>Our Work</span>
<h2>Gallery</h2>
</div>
</div>
<div class="col-lg-6 v-center">
<div class="filters">
<ul class="filter-menu">
<!-- <li data-filter="*" class="is-checked">All</li>
<li data-filter=".website">Website</li>
<li data-filter=".app">Mobile App</li>
<li data-filter=".graphic">Graphic</li> -->
</ul>
</div>
</div>
</div>
<div class="row card-list">
<div class="col-lg-4 col-md-6 grid-sizer"></div>
<div class="col-lg-4 col-sm-6 single-card-item app">
<div class="isotope_item hover-scale">
<div class="item-image">
<a href="#"><img src="{{asset('admitoffer/img/gallery/29.jpg')}}" alt="portfolio" class="img-fluid" /> </a>
</div>
<!-- <div class="item-info">
<h4><a href="#">Creative App</a></h4>
<p>ios, design</p>
</div> -->
</div>
</div>
<div class="col-lg-4 col-sm-6 single-card-item graphic">
<div class="isotope_item hover-scale">
<div class="item-image">
<a href="#"><img src="{{asset('admitoffer/img/gallery/thumb/1.JPG')}}" alt="image" class="img-fluid" /> </a>
</div>
<!-- <div class="item-info">
<h4><a href="#">Brochure Design</a></h4>
<p>Graphic, Print</p>
</div> -->
</div>
</div>
<div class="col-lg-4 col-sm-6 single-card-item website">
<div class="isotope_item hover-scale">
<div class="item-image">
<a href="#"><img src="{{asset('admitoffer/img/gallery/thumb/2.JPG')}}" alt="image" class="img-fluid" /> </a>
</div>
<!-- <div class="item-info">
<h4><a href="#">Ecommerce Development</a></h4>
<p>Web Application</p>
</div> -->
</div>
</div>
<div class="col-lg-4 col-sm-6 single-card-item app">
<div class="isotope_item hover-scale">
<div class="item-image">
<a href="#"><img src="{{asset('admitoffer/img/gallery/thumb/14.jpg')}}" alt="image" class="img-fluid" /> </a>
</div>
<!-- <div class="item-info">
<h4><a href="#">Icon Pack</a></h4>
<p>Android & iOs, Design</p>
</div> -->
</div>
</div>
<div class="col-lg-4 col-sm-6 single-card-item graphic">
<div class="isotope_item hover-scale">
<div class="item-image">
<a href="#"><img src="{{asset('admitoffer/img/gallery/16.jpg')}}" alt="image" class="img-fluid" /> </a>
</div>
<!-- <div class="item-info">
<h4><a href="#">Smart Watch</a></h4>
<p>UI/UX Design</p>
</div> -->
</div>
</div>
<div class="col-lg-4 col-sm-6 single-card-item graphic">
<div class="isotope_item hover-scale">
<div class="item-image">
<a href="#"><img src="{{asset('admitoffer/img/gallery/thumb/17.jpg')}}" alt="image" class="img-fluid" /> </a>
</div>
<!-- <div class="item-info">
<h4><a href="#">Brochure Design</a></h4>
<p>Graphic, Print</p>
</div> -->
</div>
</div>
<div class="col-lg-4 col-sm-6 single-card-item website">
<div class="isotope_item hover-scale">
<div class="item-image">
<a href="#"><img src="{{asset('admitoffer/img/gallery/thumb/17.jpg')}}" alt="image" class="img-fluid" /> </a>
</div>
<!-- <div class="item-info">
<h4><a href="#">Packaging Design</a></h4>
<p>Graphic, Print</p>
</div> -->
</div>
</div>
<div class="col-lg-4 col-sm-6 single-card-item app">
<div class="isotope_item hover-scale">
<div class="item-image">
<a href="#"><img src="{{asset('admitoffer/img/gallery/thumb/18.jpg')}}" alt="image" class="img-fluid" /> </a>
</div>
<!-- <div class="item-info">
<h4><a href="#">Restaurant App</a></h4>
<p>Android App</p>
</div> -->
</div>
</div>
<div class="col-lg-4 col-sm-6 single-card-item  website">
<div class="isotope_item hover-scale">
<div class="item-image">
<a href="#"><img src="{{asset('admitoffer/img/gallery/thumb/19.jpg')}}" alt="image" class="img-fluid" /> </a>
</div>
<!-- <div class="item-info">
<h4><a href="#">Portfolio Website</a></h4>
<p>Web Design</p>
</div> -->
</div>
</div>
</div>
</div>
</section>


<footer>
<!-- <div class="footer-row1">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="email-subs">
<h3>Get New Insights Weekly</h3>
<p>News letter dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt. Enter your email</p>
</div>
</div>
<div class="col-lg-6 v-center">
<div class="email-subs-form">
<form>
<input type="email" placeholder="Email Your Address" name="emails">
<button type="submit" name="submit" class="lnk btn-main bg-btn">Subscribe <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></button>
</form>
</div>
</div>
</div>
</div>
</div> -->
<div class="footer-row2">
<div class="container">
<div class="row justify-content-between">
<div class="col-lg-3 col-sm-6  ftr-brand-pp">
<a class="navbar-brand mt30 mb25 f-dark-logo" href="#"> <img src="{{asset('admitoffer/img/logo.png')}}" alt="Logo" /></a>
<a class="navbar-brand mt30 mb25 f-white-logo" href="#"> <img src="{{asset('admitoffer/img/logo.png')}}" alt="Logo" /></a>
<p>Admitly.ai is an AI powered online exchange uniquely designed for international students and student recruiters to apply to the best institutions from around the world in a simple, functional, seamless, and cashless manner</p>
<a href="{{route('agent.registers')}}" class="btn-main bg-btn3 lnk mt20">Become Partner <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></a>
</div>
<div class="col-lg-3 col-sm-6">
<h5>Contact Us</h5>
<ul class="footer-address-list ftr-details">
<li>
<span><i class="fas fa-envelope"></i></span>
<p>Email <span> <a href="#"><span >contact@admitoffer.com</span></a></span></p>
</li>
<li>
<span><i class="fas fa-phone-alt"></i></span>
<p>Phone <span> <a href="tel:(+91) 7087078585">(+91) 7087078585</a></span></p>
</li>
<li>
<span><i class="fas fa-map-marker-alt"></i></span>
<p>Address <span> Genesis Centre, 100 Signal Hill Rd #0100, St. John's, NL A1A 1B3, Canada</span></p>
</li>
</ul>
</div>
<div class="col-lg-2 col-sm-6">
<h5>Company</h5>
<ul class="footer-address-list link-hover">
<li><a href="get-quote.html">Contact</a></li>
<li><a href="javascript:void(0)">Customer's FAQ</a></li>
<li><a href="javascript:void(0)">Refund Policy</a></li>
<li><a href="javascript:void(0)">Privacy Policy</a></li>
<li><a href="javascript:void(0)">Terms and Conditions</a></li>
<li><a href="javascript:void(0)">License & Copyright</a></li>
</ul>
</div>
<!-- <div class="col-lg-4 col-sm-6 footer-blog-">
<h5>Latest Blogs</h5>
<div class="single-blog-">
<div class="post-thumb"><a href="#"><img src="images/blog/blog-small.jpg" alt="blog"></a></div>
<div class="content">
<p class="post-meta"><span class="post-date"><i class="far fa-clock"></i>April 15, 2020</span></p>
<h4 class="title"><a href="#">We Provide you Best &amp; Creative Consulting Service</a></h4>
</div>
</div>
<div class="single-blog-">
<div class="post-thumb"><a href="#"><img src="images/blog/blog-small.jpg" alt="blog"></a></div>
<div class="content">
<p class="post-meta"><span class="post-date"><i class="far fa-clock"></i>April 15, 2020</span></p>
<h4 class="title"><a href="#">We Provide you Best &amp; Creative Consulting Service</a></h4>
</div>
</div>
</div> -->
</div>
</div>
</div>
<div class="footer-row3">
<div class="copyright">
<div class="container">
<div class="row">
<div class="col-lg-12">
<!-- <div class="footer-social-media-icons">
<a href="javascript:void(0)" target="blank"><i class="fab fa-facebook"></i></a>
<a href="javascript:void(0)" target="blank"><i class="fab fa-twitter"></i></a>
<a href="javascript:void(0)" target="blank"><i class="fab fa-instagram"></i></a>
<a href="javascript:void(0)" target="blank"><i class="fab fa-linkedin"></i></a>
<a href="javascript:void(0)" target="blank"><i class="fab fa-youtube"></i></a>
<a href="javascript:void(0)" target="blank"><i class="fab fa-pinterest-p"></i></a>
<a href="javascript:void(0)" target="blank"><i class="fab fa-vimeo-v"></i></a>
<a href="javascript:void(0)" target="blank"><i class="fab fa-dribbble"></i></a>
<a href="javascript:void(0)" target="blank"><i class="fab fa-behance"></i></a>
</div> -->
<div class="footer-">
<p>© 2023. All Rights Reserved By <a href="#" target="blank">Admission Overseas Ltd.</a></p>
</div>
</div>
</div>
</div>
</div>
</div>
</footer>


<script src="{{asset('admitoffer/theme/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<script src="{{asset('admitoffer/theme/js/jquery.min.js')}}"></script>
<script src="{{asset('admitoffer/theme/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admitoffer/theme/js/plugin.min.js')}}"></script>
<script src="{{asset('admitoffer/theme/js/preloader.js')}}"></script>

<script src="{{asset('admitoffer/theme/js/main.js')}}"></script>
</body>

</html>