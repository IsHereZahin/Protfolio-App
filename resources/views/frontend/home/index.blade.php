@extends('frontend.home.layouts.master')
@section('content')
    {{-- navbar --}}
    @include('frontend.home.section.hero')
    <main id="main">
        @include('frontend.home.section.about')
        @include('frontend.home.section.facts')
        @include('frontend.home.section.skill')
        @include('frontend.home.section.resume')
        @include('frontend.home.section.portfolio')
        @include('frontend.home.section.services')
        @include('frontend.home.section.testimonials')
        @include('frontend.home.section.contact')
    </main>
@endsection
