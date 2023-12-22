  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center" style="background: url('{{ asset('Images/hero') }}/{{ $hero->image }}') top right no-repeat;" >
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <h1>{{ $hero->name }}</h1>
      <p>I'm
        <span class="typed" data-typed-items="
          @foreach ($herotitle as $title)
            {{ $title->herotitle }},
          @endforeach
        "></span>
      </p>


      <div class="social-links">
        <a href="{{ $hero->twitter_url }}" target="blank" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="{{ $hero->fb_url }}" target="blank" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="{{ $hero->in_url }}" target="blank" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="{{ $hero->sk_url }}" target="blank" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="{{ $hero->ln_url }}" target="blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </section><!-- End Hero -->
