@include('admitoffer/_head')
<style>
  #privacy
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
  
  
    <div class="rbt-overlay-page-wrapper">

        <div class="breadcrumb-image-container breadcrumb-style-max-width">
            <div class="breadcrumb-image-wrapper">
                <img src="{{asset('admitly/images/bg-image-10.jpg')}}" alt="Education Images">
            </div>
            <div class="breadcrumb-content-top text-center">
                <h1 class="title">Refund Policy</h1>
                <p class="mb--20">Refund Policy Here.</p>
                <ul class="page-list">
                    <li class="rbt-breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li>
                        <!-- <div class="icon-right"><i class="feather-chevron-right"></i></div> -->
                    </li>
                    <!-- <li class="rbt-breadcrumb-item active">Purchase Guide</li> -->
                </ul>
            </div>
        </div>


        <div class="rbt-putchase-guide-area breadcrumb-style-max-width rbt-section-gapBottom">
            <div class="rbt-article-content-wrapper">
                <div class="post-thumbnail mb--30 position-relative wp-block-image alignwide">
                    <img class="w-100" src="{{asset('admitly/images/blog-card-01.jpg')}}" alt="Blog Images">
                </div>
                <div class="content">
                    <h4>Admitly Refund Policy</h4>
                    <ol>
                        <li>Admitly.ai has a refund policy for its partner agents who make online application through its ‘Admit Offer’ portal with effective date from 10 February 2021.</li>
                        <li>We offer a full application fees refund for application fees paid on our website if those applications are not applied to the respected university/college by Admit Offer or those application fees not paid to the respected university/college by Admit Offer that our Partner Agents have applied from us; you can get your application fees money back from us if the application stands not applied to the respective university/college. In such a case, you are eligible for a full reimbursement within 20 calendar days of your application fees paid on our website. </li>
                        <li>After the 20-day period you will no longer be eligible and won't be able to receive a application fees refund. We encourage our agent partners to try the service in the first two weeks after their application fees payment to ensure it fits your needs.</li>
                    </ol>
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
