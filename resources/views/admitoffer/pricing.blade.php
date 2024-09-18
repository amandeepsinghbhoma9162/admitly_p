@include('admitoffer._head')
<style>
@media(min-width:1280px)
{
 #pricing
 {
 color: var(--color-primary);
    background: #ffebe6;
 }
 }
 #pricing
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
                   <h2>Pricing</h2>
                   
                </div>
              </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <main id="main">



        <!-- ======= blue Section ======= -->
        <div class="pricing_1 rbt-pricing-area">
          <div class="container">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6"></div>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="pricing-bill-btn pricing-billing-duration text-start text-md-end" id="pricing_btn">
                  <ul>
                            <li class="nav-item">
                                <button class="nav-link yearly-plan-btn active" type="button" onClick="yearly()" id="yearly">Yearly Plan</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link monthly-plan-btn" type="button" onClick="monthly()" id="monthly">Monthly Plan</button>
                            </li>
                        </ul>
                </div>
              </div>
            </div>
            
            <div class="row mt-5">
                <!-- Start Single Pricing  -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                    <div class="pricing-table style-2">
                        <div class="pricing-header">
                            <h3 class="title">Basic Plan</h3>
                            <span class="rbt-badge mb-3">Free for a Month</span>
                            <div class="price-wrap">
                                <div class="yearly-pricing" id="yearly-pricing">
                                    <span class="amount">$30.99</span>
                                    <span class="duration">/yearly</span>
                                </div>
                                <div class="monthly-pricing" id="monthly-pricing">
                                    <span class="amount">$10.00</span>
                                    <span class="duration">/monthly</span>
                                </div>
                            </div>
                        </div>

                        <div class="pricing-btn">
                            <a class="rbt-btn bg-primary-opacity hover-icon-reverse w-100" href="#">
                                <div class="icon-reverse-wrapper">
                                    <span class="btn-text">Join Course Plan</span>
                                    <span class="btn-icon"><i class="bi bi-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="bi bi-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>

                        <div class="pricing-body">
                            <ul class="list-item">
                                <li><i class="bi bi-check2"></i> Unlimited Access Courses</li>
                                <li><i class="bi bi-check2"></i> Certificate After Completion</li>
                                <li class="off"><i class="bi bi-x-lg"></i> 24/7 Dedicated Support</li>
                                <li class="off"><i class="bi bi-x-lg"></i> Unlimited Emails</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Pricing  -->

                <!-- Start Single Pricing  -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                    <div class="pricing-table style-2 active">
                        <div class="pricing-header">
                            <div class="pricing-badge"><span>Popular</span></div>
                            <h3 class="title">Standard Plan</h3>
                            <span class="rbt-badge mb-3">Most Popular</span>
                            <div class="price-wrap">
                                <div class="yearly-pricing" id="yearly-pricing2">
                                    <span class="amount">$100.99</span>
                                    <span class="duration">/yearly</span>
                                </div>
                                <div class="monthly-pricing" id="monthly-pricing2">
                                    <span class="amount">$20.00</span>
                                    <span class="duration">/monthly</span>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-btn">
                            <a class="rbt-btn hover-icon-reverse w-100" href="#">
                                <div class="icon-reverse-wrapper">
                                    <span class="btn-text">Join Course Plan</span>
                                    <span class="btn-icon"><i class="bi bi-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="bi bi-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>

                        <div class="pricing-body">
                            <ul class="list-item">
                                <li><i class="bi bi-check2"></i> Unlimited Access Courses</li>
                                <li><i class="bi bi-check2"></i> Certificate After Completion</li>
                                <li><i class="bi bi-check2"></i> High Resolution Videos</li>
                                <li><i class="bi bi-check2"></i> 24/7 Dedicated Support</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- End Single Pricing  -->

                <!-- Start Single Pricing  -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                    <div class="pricing-table style-2">
                        <div class="pricing-header">
                            <h3 class="title">Exclusive Plan</h3>
                            <span class="rbt-badge mb-3">Free for a Month</span>
                            <div class="price-wrap">
                                <div class="yearly-pricing" id="yearly-pricing3">
                                    <span class="amount">$99.99</span>
                                    <span class="duration">/yearly</span>
                                </div>
                                <div class="monthly-pricing" id="monthly-pricing3">
                                    <span class="amount">$39.00</span>
                                    <span class="duration">/monthly</span>
                                </div>
                            </div>
                        </div>

                        <div class="pricing-btn">
                            <a class="rbt-btn bg-primary-opacity hover-icon-reverse w-100" href="#">
                                <div class="icon-reverse-wrapper">
                                    <span class="btn-text">Join Course Plan</span>
                                    <span class="btn-icon"><i class="bi bi-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="bi bi-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>

                        <div class="pricing-body">
                            <ul class="list-item">
                                <li><i class="bi bi-check2"></i> Unlimited Access Courses</li>
                                <li><i class="bi bi-check2"></i> Certificate After Completion</li>
                                <li class="off"><i class="bi bi-x-lg"></i> 24/7 Dedicated Support</li>
                                <li class="off"><i class="bi bi-x-lg"></i> Unlimited Emails</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- End Single Pricing  -->
            </div>
            
          </div>
        </div>
        <!-- End blue Section -->
        
        
        
     



        <!-- End Reason Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <!-- End Footer -->
      @include('admitoffer.footer')
    <!-- End Footer -->

    

</body>

</html>