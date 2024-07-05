@include('admitoffer/_head')
<style>
  #about
  {
  color:#e77817 !important;
  }
</style>
<body>
  <!--==========================
    Header
  ============================-->
  @include('admitoffer/header')

  <!--==========================
    Slider Section
  ============================-->
  
 <div class="slider-area rbt-banner-5 height-750 bg_image bg_image--3" data-gradient-overlay="7">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner text-center">
                        <h1 class="title display-one">Start Your
                            <span>Career &amp; </span>
                            <span>Pursue</span> Your Passion.
                        </h1>
                        <p class="description">We help our clients succeed by creating brand identities, digital
                            experiences, and print materials.</p>
                        <div class="rbt-button-group">
                            <a class="rbt-btn btn-white hover-icon-reverse" href="#">
                                <div class="icon-reverse-wrapper">
                                    <span class="btn-text">View Our Program</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </div>
                            </a>
                            <a class="rbt-btn btn-border hover-icon-reverse color-white" href="{{route('contactus')}}">
                                <div class="icon-reverse-wrapper">
                                    <span class="btn-text">Contact Us</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rbt-about-area about-style-1 bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row g-5 align-items-start">
                <div class="col-lg-6">
                    <div class="content">
                        <h2 class="title mb--0 sal-animate" data-sal="slide-up" data-sal-duration="700">About the University we are creative preapre you for your career supportive.</h2>
                    </div>
                </div>
                <div class="col-lg-6 sal-animate" data-sal="slide-up" data-sal-duration="700">
                    <p class="mb--40 mb_sm--20">Admilty is an advanced online platform for international student recruitment, providing a wide range of services to enhance the enrollment process. Our platform offers Gen-AI counseling support, employs anti-counterfeit AI technology to prevent document falsification, and provides a suite of innovative services such as university application immunity, free document verification, video assessment mock interviews, and much more. With a strong focus on promoting diversity and maintaining high-quality student enrollments, Admilty is dedicated to revolutionizing the international student recruitment landscape.</p>
                    <div class="readmore-btn">
                        <a class="rbt-moderbt-btn" href="#">
                            <span class="moderbt-btn-text">University Overview</span>
                            <i class="feather-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!--==========================
    Footer
  ============================-->
  @include('admitoffer/footer')

 
</body>
</html>
