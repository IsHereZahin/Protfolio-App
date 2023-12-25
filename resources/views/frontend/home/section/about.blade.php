    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>About</h2>
            <p>{{ $about->top_desc ?? ''}}</p>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <img src="{{ asset('images/about') }}/{{ $about->image ?? ''}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 pt-4 pt-lg-0 content">
              <h3>{{ $about->headline ?? ''}}</h3>
              <p class="fst-italic">{{ $about->sort_desc ?? ''}}</p>
              <div class="row">
                <div class="col-lg-6">
                  <ul>
                    <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>{{ $about->birthday ?? ''}}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>{{ $about->website ?? ''}}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{ $about->phone ?? ''}}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>{{ $about->city ?? ''}}</span></li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul>
                    <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{ $about->age ?? ''}}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>{{ $about->degree ?? ''}}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{ $about->email ?? ''}}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>{{ $about->freelance ?? ''}}</span></li>
                  </ul>
                </div>
              </div>
              <p>{{ $about->long_desc ?? ''}}</p>
            </div>
        </div>
    </div>
</section><!-- End About Section -->
