<!-- ======= Skills Section ======= -->
<section id="skills" class="skills section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Skills</h2>
            <p>{{ $skillDescription ?? 'No description available.' }}</p>
        </div>

        <div class="row skills-content">
            <div class="col-lg-6">
                @foreach ($skills->take(ceil($skills->count() / 2)) as $skill) <!-- Show first half of the skills -->
                    <div class="progress">
                        <span class="skill">{{ $skill->name }} <i class="val">{{ $skill->proficiency }}%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->proficiency }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->proficiency }}%;"></div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-lg-6">
                @foreach ($skills->slice(ceil($skills->count() / 2)) as $skill) <!-- Show second half of the skills -->
                    <div class="progress">
                        <span class="skill">{{ $skill->name }} <i class="val">{{ $skill->proficiency }}%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->proficiency }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->proficiency }}%;"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section><!-- End Skills Section -->
