<!-- ======= Skills Section ======= -->
<section id="skills" class="skills section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Skills</h2>
            <p>{{ $skillDescription ?? 'No description available.' }}</p>
        </div>

        @if ($skills->count() > 1) <!-- Corrected condition -->
        <div class="row skills-content">
            <div class="col-lg-6">
                @foreach ($skills->take(ceil($skills->count() / 2)) as $skill) <!-- First half of skills -->
                    <div class="progress">
                        <span class="skill">{{ $skill->name }} <i class="val">{{ $skill->proficiency }}%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->proficiency }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->proficiency }}%;"></div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-lg-6">
                @foreach ($skills->slice(ceil($skills->count() / 2)) as $skill) <!-- Second half of skills -->
                    <div class="progress">
                        <span class="skill">{{ $skill->name }} <i class="val">{{ $skill->proficiency }}%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->proficiency }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->proficiency }}%;"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @else
        <!-- Fallback Skills when no dynamic data is available -->
        <div class="row skills-content skills-animation">
            <div class="col-lg-6">
                <div class="progress">
                    <span class="skill"><span>HTML</span> <i class="val">100%</i></span>
                    <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
                <div class="progress">
                    <span class="skill"><span>CSS</span> <i class="val">90%</i></span>
                    <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                    </div>
                </div>
                <div class="progress">
                    <span class="skill"><span>JavaScript</span> <i class="val">75%</i></span>
                    <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="progress">
                    <span class="skill"><span>PHP</span> <i class="val">80%</i></span>
                    <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                    </div>
                </div>
                <div class="progress">
                    <span class="skill"><span>WordPress/CMS</span> <i class="val">90%</i></span>
                    <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                    </div>
                </div>
                <div class="progress">
                    <span class="skill"><span>Photoshop</span> <i class="val">55%</i></span>
                    <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%;"></div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- End Skills Section -->
