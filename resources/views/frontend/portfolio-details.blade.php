@extends('frontend.home.layouts.master')

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('#') }}">Home</a></li>
            <li class="current">{{ $portfolio->title }}</li>
          </ol>
        </nav>
        <h1>Portfolio Details</h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

      <div class="container" data-aos="fade-up">

        <!-- Portfolio Image Slider -->
        <div class="portfolio-details-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              },
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            @foreach ($portfolio->images as $image)
                <div class="swiper-slide">
                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $portfolio->title }} Image">
                </div>
            @endforeach
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-pagination"></div>
        </div>

        <!-- Portfolio Description & Client Feedback -->
        <div class="row justify-content-between gy-4 mt-4">

          <!-- Left Section: Portfolio Details -->
          <div class="col-lg-8" data-aos="fade-up">
            <div class="portfolio-description">
              <h2>{{ $portfolio->title }}</h2>
              <p>{{ $portfolio->client_feedback }}</p>

              <h5 class="mt-5">Client Feedback</h5>
              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>{{ $portfolio->client_feedback ?? 'No testimonial provided.' }}</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <div>
                  <img src="{{ asset('storage/' . $portfolio->client_author_image) }}" class="testimonial-img" alt="{{ $portfolio->client_author }}">
                  <h3>{{ $portfolio->client_author }}</h3>
                  <h4>{{ $portfolio->client_role }}</h4>
                </div>
              </div>

            </div>
          </div>

          <!-- Right Section: Project Information -->
          <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="portfolio-info">
              <h3>Project Information</h3>
              <ul>
                <li><strong>Category:</strong> {{ $portfolio->category }}</li>
                <li><strong>Client:</strong> {{ $portfolio->client_company_name }}</li>
                <li><strong>Project Date:</strong>{{ \Carbon\Carbon::parse($portfolio->project_date)->format('M d, Y') }}</li>
                <li><strong>Project URL:</strong>
                  <a href="{{ $portfolio->project_url }}" target="_blank" rel="noopener noreferrer">{{ $portfolio->project_url }}</a>
                </li>
                <li>
                  <a href="{{ $portfolio->project_url }}" class="btn-visit align-self-start" target="_blank" rel="noopener noreferrer">Visit Website</a>
                </li>
              </ul>
            </div>
          </div>

        </div>

      </div>

    </section>
    <!-- /Portfolio Details Section -->

</main>

@include('frontend.home.layouts.components.footer')
@endsection
