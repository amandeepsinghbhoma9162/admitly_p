@extends('agent.layouts.app')
@section('content')
@include('admitoffer/_head')
<style>
    #gallery
    {
    color:#e77817 !important;
    }
    /* when not active use specificity to override the !important on border-(color) */
    .nav-tabs .nav-link:not(.active) {
    border-color: transparent !important;
    }
    #myTab li a{
        background: #f5d8da;
    }
    .nav-tabs .active {
        background: #e1000a!important;
        color: white!important;
    }


.link-preview:hover + .dwnldlink{
display: block!important;
}
.dwnldlink{
    width: 100.6%;
    background: #d2c8c8;
    color: white;
    height: 37px;
    margin-bottom: 10px;
    font-size: 21px;
    display: block;
    border-radius: 0px 0px 15px 15px;
}
  .gal img {
    width: 341px;
  }
</style>
<body>
    <!--==========================
        Header
        ============================-->

    <!--==========================
        Slider Section
        ============================-->
    <main id="main">
        <!--==========================
            Span1 Section
            ============================-->
        <div class="span1" >
            <div class="container">
                <div class="heading text-center">
                    <h2><strong>Media & Resources</strong></h2>
                    <div class="line"></div>
                </div>
                <div class="container h-100 py-2">
                    <ul class="nav nav-tabs border-0" id="myTab" role="tablist" style="margin: 0px 40%;">
                        <li class="nav-item">
                            <a class="nav-link border btn border-warning border-bottom-0 active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Flyers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border btn border-danger border-bottom-0" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Prospectus</a>
                        </li>
                    </ul>
                    <div class="tab-content h-75">
                        <div class="tab-pane h-100 p-3 active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="gal text-center">
                                        <div class="row">
                                        @foreach($images as $image)
                                        <div class="col-4">
                                          
                                        <a href="{{asset($image['path'])}}" class="link-preview" data-lightbox="prospectus"><img src="{{asset($image['path'])}}"></a>
                                        <a href="{{asset($image['path'])}}" class="dwnldlink" target="_blank" download> <i class="fa fa-download"></i></a>

                                        
                                        </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane h-100 p-3 " id="messages" role="tabpanel" aria-labelledby="messages-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="gal text-center">
                                        @foreach($portfoliaos as $portfoliao)
                                        
                                        <div class="col-12">
                                          <div class="app-page-title">
                                            <div class="page-title-wrapper">
                                            <div class="page-title-heading">
                                            <div class="" style="width: 70px;">
                                            <img src="https://admitoffer.com/images/site/pdfIcon.png" style="width: 100%;border: none;">
                                            </div>
                                            <div style="min-width: 300px;">
                                            {{$portfoliao['title']}}
                                            <div class="page-title-subheading">
                                              @if($portfoliao['type'] == '1')
                                              Image
                                              @else
                                              Prospectus
                                              @endif
                                            </div>
                                            </div>
                                            <div style="min-width: 300px;">
                                            @if($portfoliao['country_id'] == '38')
                                            Canada <img src="https://admitoffer.com/uploads/country/flag/48793b41c7bff410dd5c6f98162db0e2.png" style="width: 40px;border: none;">
                                            @else
                                            UK <img src="https://admitoffer.com/uploads/country/flag/a00ba1c4edcccdb0a69261b5a153dac6.png" style="width: 40px;border: none;">
                                            @endif
                                            <div class="page-title-subheading">
                                              &nbsp;
                                            </div>
                                            </div>
                                            </div>
                                            <div class="page-title-actions">
                                            <a href="{{asset($portfoliao['path'])}}" class="" style="background: orange; color: white; padding: 15px;" target="_blank" download> <i class="fa fa-download" style="font-size: 20px;"></i></a>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--==========================
            About span2
            ============================-->
        <!--==========================
            span3 Section
            ============================-->
    </main>
   

   <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- Uncomment below i you want to use a preloader -->

  <!-- <div id="preloader"></div> -->

<!-- Default Statcounter code for Admit Offer
https://admitoffer.com/ -->
<script type="text/javascript">
var sc_project=12202186; 
var sc_invisible=1; 
var sc_security="f15af0d0"; 
var sc_https=1; 
var sc_remove_link=1; 
</script>
<script type="text/javascript"
src="https://www.statcounter.com/counter/counter.js"
async></script>
<noscript><div class="statcounter"><img class="statcounter"
src="https://c.statcounter.com/12202186/0/f15af0d0/1/"
alt="real time web analytics"></div></noscript>
<!-- End of Statcounter Code -->

  <!-- JavaScript Libraries -->

  <script src="{{asset('admitoffer/lib/jquery/jquery.min.js')}}"></script>

  <script src="{{asset('admitoffer/lib/jquery/jquery-migrate.min.js')}}"></script>

  <script src="{{asset('admitoffer/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{asset('admitoffer/lib/easing/easing.min.js')}}"></script>

  <script src="{{asset('admitoffer/lib/superfish/hoverIntent.js')}}"></script>

  <script src="{{asset('admitoffer/lib/superfish/superfish.min.js')}}"></script>

  <script src="{{asset('admitoffer/lib/wow/wow.min.js')}}"></script>

  <script src="{{asset('admitoffer/lib/waypoints/waypoints.min.js')}}"></script>

  <script src="{{asset('admitoffer/lib/counterup/counterup.min.js')}}"></script>

  <script src="{{asset('admitoffer/lib/owlcarousel/owl.carousel2.js')}}"></script>

  <script src="{{asset('admitoffer/lib/isotope/isotope.pkgd.min.js')}}"></script>

  <script src="{{asset('admitoffer/lib/lightbox/js/lightbox.min.js')}}"></script>

  <script src="{{asset('admitoffer/lib/touchSwipe/jquery.touchSwipe.min.js')}}"></script>

  <script src="{{asset('admitoffer/js/classie.js')}}"></script>

  <script src="{{asset('admitoffer/js/pathLoader.js')}}"></script>

  <!-- Contact Form JavaScript File -->

  <script src="{{asset('admitoffer/contactform/contactform.js')}}"></script>

  <script src="{{asset('admitoffer/js/modernizr.custom.js')}}"></script>



  <!-- Template Main Javascript File -->

  <script src="{{asset('admitoffer/js/main.js')}}"></script>


</body>
</html>
@endsection