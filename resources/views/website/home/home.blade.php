@extends("master.front.master")

@section("body")

<section>
    <div class="hero-slider position-relative">
      <div class="hero-slider-item py-160" style="background-image: url({{asset("/")}}website/images/banner/banner-1.jpg);"
        data-icon="ti-comments" data-text="Consultation">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="hero-content">
                <h4 class="text-uppercase mb-1" data-duration-in=".5" data-animation-in="fadeInLeft" data-delay-in=".1">We
                  are here to</h4>
                <h1 class="font-weight-bold mb-3" data-duration-in=".5" data-animation-in="fadeInLeft" data-delay-in=".5">
                  Planning Business</h1>
                <p class="text-dark mb-50" data-duration-in=".5" data-animation-in="fadeInLeft" data-delay-in=".9">Lorem
                  ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                  <br> incididunt ut labore et dolore magna aliqua.
                </p>
                <a data-duration-in=".5" data-animation-in="fadeInDown" data-delay-in="1.3" href="about.html"
                  class="btn btn-outline text-uppercase">more details</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hero-slider-item py-160" style="background-image: url({{asset("/")}}website/images/banner/banner-2.jpg);"
        data-icon="ti-bar-chart" data-text="Marketting">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="hero-content">
                <h4 class="text-uppercase mb-1" data-duration-in=".5" data-animation-in="fadeInDown" data-delay-in=".1">
                  Get your</h4>
                <h1 class="font-weight-bold mb-3" data-duration-in=".5" data-animation-in="fadeInDown" data-delay-in=".5">
                  Business Consultant</h1>
                <p class="text-dark mb-50" data-duration-in=".5" data-animation-in="fadeInDown" data-delay-in=".9">Lorem
                  ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                  <br> incididunt ut labore et dolore magna aliqua.
                </p>
                <a data-duration-in=".5" data-animation-in="fadeInDown" data-delay-in="1.3" href="about-2.html"
                  class="btn btn-outline text-uppercase">more details</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hero-slider-item py-160" style="background-image: url({{asset("/")}}website/images/banner/banner-3.jpg);" data-icon="ti-money"
        data-text="Finance">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="hero-content">
                <h4 class="text-uppercase mb-1" data-duration-in=".5" data-animation-in="fadeInLeft" data-delay-in=".1">
                  Start your</h4>
                <h1 class="font-weight-bold mb-3" data-duration-in=".5" data-animation-in="fadeInLeft" data-delay-in=".5">
                  Future Plan</h1>
                <p class="text-dark mb-50" data-duration-in=".5" data-animation-in="fadeInLeft" data-delay-in=".9">Lorem
                  ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                  <br> incididunt ut labore et dolore magna aliqua.
                </p>
                <a data-duration-in=".5" data-animation-in="fadeInDown" data-delay-in="1.3" href="about.html"
                  class="btn btn-outline text-uppercase">more details</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hero-slider-item py-160" style="background-image: url({{asset("/")}}website/images/banner/banner-4.jpg);"
        data-icon="ti-package" data-text="Human Resources">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="hero-content">
                <h4 class="text-uppercase mb-1" data-duration-in=".5" data-animation-in="fadeInDown" data-delay-in=".1">We
                  are always</h4>
                <h1 class="font-weight-bold mb-3" data-duration-in=".5" data-animation-in="fadeInDown" data-delay-in=".5">
                  Be Inspired By Best</h1>
                <p class="text-dark mb-50" data-duration-in=".5" data-animation-in="fadeInDown" data-delay-in=".9">Lorem
                  ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                  <br> incididunt ut labore et dolore magna aliqua.
                </p>
                <a data-duration-in=".5" data-animation-in="fadeInDown" data-delay-in="1.3" href="about-2.html"
                  class="btn btn-outline text-uppercase">more details</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- service -->
  <section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 text-center">
          <h5 class="section-title-sm">Recent Blog</h5>
          <h2 class="section-title section-title-border">Latest Recent Blog</h2>
        </div>
        <!-- service item -->
        @foreach ($recent_blogs as $recent_blog)
       
        <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0 mt-5">
          <div class="card text-center">
            <h4 class="card-title pt-3">{{$recent_blog->main_title}}</h4>
            <div class="card-img-wrapper">
              <img class="card-img-top rounded-0" src="{{asset($recent_blog->image)}}" alt="service-image">
            </div>
            <div class="card-body p-0">
              <i class="square-icon translateY-33 rounded ti-bar-chart"></i>
              <p class="card-text mx-2 mb-0">{{$recent_blog->short_description}}</p>
              <a href="{{route("blog-detail", ["id" => $recent_blog->id])}}" class="btn btn-secondary translateY-25">Read
                More</a>
            </div>
          </div>
        </div>
        @endforeach
        <!-- service item -->
        
      </div>
    </div>
  </section>
  
 
  
  <!-- client logo slider -->
  <section class="bg-white py-4">
    <div class="container">
      <div class="client-logo-slider align-self-center">
        <a href="#" class="text-center d-block outline-0 py-3 px-2"><img class="d-unset"
            src="{{asset("/")}}website/images/client-logo/client-logo-1.png" alt="client-logo"></a>
        <a href="#" class="text-center d-block outline-0 py-3 px-2"><img class="d-unset"
            src="{{asset("/")}}website/images/client-logo/client-logo-2.png" alt="client-logo"></a>
        <a href="#" class="text-center d-block outline-0 py-3 px-2"><img class="d-unset"
            src="{{asset("/")}}website/images/client-logo/client-logo-3.png" alt="client-logo"></a>
        <a href="#" class="text-center d-block outline-0 py-3 px-2"><img class="d-unset"
            src="{{asset("/")}}website/images/client-logo/client-logo-4.png" alt="client-logo"></a>
        <a href="#" class="text-center d-block outline-0 py-3 px-2"><img class="d-unset"
            src="{{asset("/")}}website/images/client-logo/client-logo-5.png" alt="client-logo"></a>
        <a href="#" class="text-center d-block outline-0 py-3 px-2"><img class="d-unset"
            src="{{asset("/")}}website/images/client-logo/client-logo-1.png" alt="client-logo"></a>
        <a href="#" class="text-center d-block outline-0 py-3 px-2"><img class="d-unset"
            src="{{asset("/")}}website/images/client-logo/client-logo-2.png" alt="client-logo"></a>
        <a href="#" class="text-center d-block outline-0 py-3 px-2"><img class="d-unset"
            src="{{asset("/")}}website/images/client-logo/client-logo-3.png" alt="client-logo"></a>
        <a href="#" class="text-center d-block outline-0 py-3 px-2"><img class="d-unset"
            src="{{asset("/")}}website/images/client-logo/client-logo-4.png" alt="client-logo"></a>
        <a href="#" class="text-center d-block outline-0 py-3 px-2"><img class="d-unset"
            src="{{asset("/")}}website/images/client-logo/client-logo-5.png" alt="client-logo"></a>
      </div>
    </div>
  </section>
  <!-- /client logo slider -->
  

@endsection