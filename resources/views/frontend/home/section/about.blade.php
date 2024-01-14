    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>About</h2>
                <p>{{ $about->top_desc ?? 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.' }}</p>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <img src="{{ $about ? asset('images/about/' . $about->image) : asset('assets/img/profile-img.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 content">
                    <h3>{{ $about->headline ?? 'UI/UX Designer &amp; Web Developer.' }}</h3>
                    <p class="fst-italic">{{ $about->sort_desc ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' }}</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>{{ $about->birthday ?? '1 May 1995' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>{{ $about->website ?? 'www.example.com' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{ $about->phone ?? '+123 456 7890' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>{{ $about->city ?? 'New York, USA' }}</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{ $about->age ?? '30' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>{{ $about->degree ?? 'Master' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{ $about->email ?? 'email@example.com' }}</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>{{ $about->freelance ?? 'Available' }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <p>{{ $about->long_desc ?? 'Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis. Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.' }}</p>
                </div>
            </div>

    </div>
</section><!-- End About Section -->
