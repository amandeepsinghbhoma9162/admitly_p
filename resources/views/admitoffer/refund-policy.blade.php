@include('admitoffer._head')
<style>
@media(min-width:1280px)
{
 #policy
 {
 color: var(--color-primary);
    background: #ffebe6;
 }
 }
 #policy
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
    <section id="hero" class="hero privacy_hero">
        <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-10">
                <div class="p_heading text-center">
                   <h2>Refund Policy</h2>                  
                </div>
              </div>
            </div>
        </div>

        
		


        </div>
    </section>
    <!-- End Hero Section -->

    <main id="main">
 
        <div class="privacy">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-10">
                <div class="privacy_txt">
                   <div class="privacy_img"><img src="{{asset('assets/assets/img/privacy_banner.jpg')}}"></div>
                   <div class="p_txt">
                     <p>Admitly is strongly committed to protecting your privacy and complying with your choices. Both personal and non-personal information collected is safeguarded according to the highest privacy and data protection standards adopted worldwide.</p>
                     <p>Admitlyhas a refund policy for its partner agents who make online application through its ‘Admit Offer’ portal with effective date from 10 February 2021.</p>

                     <p>Admitlythanks for its partner agents for making applications on our application portal at www.admitly.ai  operated by Admit Offer.</p>

                     <p>We offer a full application fees refund for application fees paid on our website if those applications are not applied to the respected university/college by Admitlyor those application fees not paid to the respected university/college by Admitlythat our Partner Agents have applied from us; you can get your application fees money back from us if the application stands not applied to the respective university/college. In such a case, you are eligible for a full reimbursement within 20 calendar days of your application fees paid on our website. </p>

                     <p>After the 20-day period you will no longer be eligible and won't be able to receive a application fees refund. We encourage our agent partners to try the service in the first two weeks after their application fees payment to ensure it fits your needs.</p>

                     <p>If you have any additional questions or would like to request a refund, feel free to contact us at – <a href= "mailto:info@admitly.ai"> info@admitly.ai</a></p>
                      
                      
                      
                      
                   </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <!-- End Footer -->
      @include('admitoffer.footer')
    <!-- End Footer -->

    

</body>

</html>