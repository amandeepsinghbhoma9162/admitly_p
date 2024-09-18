@include('admitoffer/_head')
<style>
  #solutions
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
                <h1 class="title">Solution</h1>
                <p class="mb--20">Solution Here.</p>
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
                    <h4>AI enabled Technology Platform</h4>
                    <ol>
                        <li>Admitly.ai is an AI powered online exchange uniquely designed for international students and student recruiters to apply to the best institutions from around the world in a simple, functional, seamless, and cashless manner.</li>
                        <li>Supernova's AI-based technology serves two objectives – automate the end to end process and develop system intelligence.</li>
                    </ol>

                    <h4>Automation</h4>

                    <ol>
                        <li>Automation will bring all stakeholders - institutions, students, and independent student recruiters under one digital platform facilitating seamless communication and collaboration. It will automate the end to end process.</li>
                    </ol>

                    <h4>Artificial Intelligence</h4>

                    <ol>
                        <li>Artificial Intelligence algorithms creates a highly efficient and effective application solution for students, student recruiters and education providers which makes the student admission application process more accurate, consistent and less human dependent.</li>
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
