<section id="resume" class="resume">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Resume</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
            <div class="col-lg-6">
                @if ($summary)
                    <h3 class="resume-title">Summary</h3>
                    <div class="resume-item pb-0">
                        <h4>{{ $summary->title }}</h4>
                        <p>{!! $summary->description !!}</p>
                    </div>
                @endif

                @if ($education)
                    <h3 class="resume-title">Education</h3>
                    @foreach ($education as $data)
                    <div class="resume-item">
                        <h4>{{ $data->degree }}</h4>
                        <h5>{{ $data->start_date }} - {{ $data->end_date ?? 'Present' }}</h5>
                        <p><em>{{ $data->institution }}</em></p>
                        <p>{!! $data->description !!}</p>
                    </div>
                    @endforeach
                @endif
            </div>

            <div class="col-lg-6">
                @if ($experience)
                    <h3 class="resume-title">Professional Experience</h3>
                    @foreach ($experience as $job)
                    <div class="resume-item">
                        <h4>{{ $job->position }}</h4>
                        <h5>{{ $job->start_date }} - {{ $job->end_date ?? 'Present' }}</h5>
                        <p><em>{{ $job->company }}</em></p>
                        <ul>
                            <li>{!! $job->description !!}</li>
                        </ul>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
</section>
