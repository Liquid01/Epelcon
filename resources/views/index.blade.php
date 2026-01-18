@extends('layouts.web')

@section('content')
    <!-- start of hero -->
    @include('home.slider')
    <!-- end of hero slider -->
    <!-- wpo-mission-area start -->
    @include('home.mission')
    <!-- wpo-mission-area end -->
    <!-- wpo-about-area start -->
    @include('home.about')
    <!-- wpo-about-area end -->

    <!-- wpo-case-area start -->
{{--    <section class="section-padding" id="team_wrapper">--}}

{{--    </section>--}}

    <!-- wpo-case-area end -->
    <!-- .wpo-counter-area start -->
{{--    @include('home.counter')--}}
    <!-- .wpo-counter-area end -->
    <!-- wpo-team-area start -->
    @include('home.team')
    <!-- wpo-team-area end -->
    <!-- world area start -->
    @include('home.world')
    <!-- world area end -->
    <!-- wpo-event-area start -->
    @include('home.events')
    <!-- wpo-event-area end -->
    <!-- wpo-cta-area start -->
    @include('home.action')
    <!-- wpo-cta-area end -->
    <!-- wpo-blog-area start -->
{{--    @include('home.blog')--}}
    <!-- wpo-blog-area end -->

@endsection
@section('index_script')
    <script>
        var observer = new IntersectionObserver(function(entries) {
            // isIntersecting is true when element and viewport are overlapping
            // isIntersecting is false when element and viewport don't overlap
            if(entries[0].isIntersecting === true)
                $.get("videos", function(data, status){
                    $("#team_wrapper").html(data);
                });
        }, { threshold: [0] });

        observer.observe(document.querySelector("#team_wrapper"));
    </script>
@endsection
