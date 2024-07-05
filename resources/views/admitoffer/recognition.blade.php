@include('admitoffer._head')
<style>
@media(min-width:1280px)
{
 #about
 {
 color: var(--color-primary);
    background: #ffebe6;
 }
 }
 #about
 {
 color: var(--color-primary);
 }
</style>
<body>

    <!-- ======= Header ======= -->
    
    <!-- End Top Bar -->

    <!-- End Header -->
    @include('admitoffer.header')
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero pricing_hero">
        <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-10">
                <div class="text-center">
                   <h2>Recognition</h2>
                   
                </div>
              </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <main id="main">



        <!-- ======= blue Section ======= -->
        <div class="career_1">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-md-12 col-lg-12">
                 <div class="car_txt">
                 <div class="text-center">
                   
                   <p>At Admitly, we are thrilled and honored to be recognized by Techstars Toronto 2023 for our groundbreaking contributions to the field of AI-based EdTech. This acknowledgment stands as a testament to our unwavering commitment to revolutionizing education through innovative technology solutions.</p>
                   <p>Techstars, renowned for identifying and fostering the most promising startups, has deemed Admitly as a pioneer in the intersection of artificial intelligence and education. This recognition fuels our passion and validates our tireless efforts to redefine the way learning is experienced and delivered.</p>
                   
                   <p>Our journey with Techstar marks a pivotal moment in our mission to transform education worldwide. We extend our heartfelt gratitude to the Techstars team for their invaluable guidance, mentorship, and the opportunity to collaborate with a community of visionaries. As we continue to push the boundaries of what EdTech can achieve, we are inspired by this recognition to propel our mission forward and empower learners globally.</p>
                   
                   <p>Thank you, Techstar, for believing in Admitly's potential to reshape the future of education. Together, we are reshaping the classroom, breaking barriers, and opening doors to a new era of learning possibilities.</p>
                   
                   <img src="{{asset('assets/assets/img/techstar.png')}}">
                  </div>
                   
                 </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End blue Section -->
        
        
        
     



        <!-- End Reason Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <!-- End Footer -->@include('admitoffer.footer')
    <!-- End Footer -->

    

</body>

</html>