<!-- ======= Facts Section ======= -->
<section id="facts" class="facts">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Facts</h2>
            <p>{{ $fact->top_description ?? 'Demo description: This is a placeholder text for the facts section. Update this section with actual data to remove this demo text.' }}</p>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-emoji-smile"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $fact->clients ?? 100 }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Happy Clients</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                <div class="count-box">
                    <i class="bi bi-journal-richtext"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $fact->projects ?? 250 }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Projects</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                <div class="count-box">
                    <i class="bi bi-headset"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $fact->hours_of_support ?? 1500 }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Hours Of Support</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                <div class="count-box">
                    <i class="bi bi-award"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $fact->awards ?? 10 }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Awards</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Facts Section -->
