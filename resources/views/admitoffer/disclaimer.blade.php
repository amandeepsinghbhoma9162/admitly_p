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
                   <h2>Disclaimer</h2>                  
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
                     <p>Welcome to Admitly, the AI-powered Edtech startup designed to assist you in your journey towards overseas admissions. As you explore our website and its various features, we want to ensure that you have a clear understanding of the terms and conditions related to the use of our platform. Please take a moment to read the following disclaimer carefully.</p>                    
                      
                      <h4>Logo Usage:</h4>

                      <p>Admitly may display logos, trademarks, or other proprietary symbols of educational institutions, universities, and colleges on its website. These logos are used solely for representation purposes and do not imply any endorsement, partnership, or affiliation between Admitly and these institutions. The logos are the property of their respective owners.</p>
                      
                      <h4>Accuracy of Information:</h4>
                      <p>While we strive to provide accurate and up-to-date information about educational institutions, programs, admission requirements, and related content, we cannot guarantee the absolute accuracy of the information presented on our website. Admission criteria, deadlines, and other details may change, and it's advisable to verify information directly from the institutions' official sources.</p>
                      
                      <h4>Third-Party Links:</h4>
                      <p>Admitly may provide links to third-party websites, resources, or content that we believe may be relevant to your overseas admission journey. However, we do not have control over the content, accuracy, or security of these external websites. Clicking on these links is at your own risk, and Admitly is not responsible for any damages or losses that may occur from using these external resources.</p>
                      
                      <h4>Personal Responsibility:</h4>
                      <p>Your use of the Admitly platform is solely at your discretion and risk. While we strive to offer valuable insights and guidance, we do not guarantee admissions to any educational institution. It's important to understand that the final decision for admission rests with the respective institutions, and Admitly cannot be held liable for any outcomes related to the admission process.</p>

                      <h4>Consultation:</h4>
                      <p>The information and guidance provided by Admitly, including but not limited to blog posts, articles, AI-generated responses, and other content, are not a substitute for professional advice. For personalized and accurate advice regarding your overseas admission journey, it's recommended to consult with educational consultants, counselors, or relevant experts.</p>

                      <h4>Privacy and Data Security:</h4>
                      <p>Admitly takes your privacy seriously and follows best practices to protect your personal information. However, the security of data transmitted over the internet cannot be guaranteed. By using our website, you acknowledge and accept the inherent risks associated with online data transmission.</p>

                      <h4>Changes to Disclaimer:</h4>
                      <p>Admitly reserves the right to modify or update this disclaimer at any time without prior notice. It's your responsibility to review this page periodically to stay informed about any changes.</p>

                      <p>By using the Admitly platform, you indicate your understanding and acceptance of the terms outlined in this disclaimer. If you have any questions or concerns, please feel free to contact us at: <a href= "mailto:info@admitly.ai"> info@admitly.ai</a></p>

                      <p> Last updated: 15 June 2023. <br>Thank you for choosing Admitly to be a part of your overseas admission journey!</p>
                      
                      
                      
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