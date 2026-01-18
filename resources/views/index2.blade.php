
@extends('layouts.app')

@section('page_title')
    a practical experience of success through self and business development.
@endsection

@section('content')
    <!-- Header starts
======================================= -->
    @include('home.banner')
    <!-- End of .banner -->

    <!-- about-us
    ======================================= -->
    @include('home.about')
    <!-- End of .about-us -->

    <!-- Services starts
    ======================================= -->
    @include('home.services')
    <!-- End of .services -->

    <!-- featured-projects
    ======================================= -->
    @include('home.featured_projects')
    <!-- End of .featured-projects -->

    <!-- case-study starts
    ======================================= -->
    @include('home.case_study')
    <!-- End of .case-study -->

    <!-- Partners starts
    ======================================= -->
    @include('home.partners')
    <!-- End of .partners -->

    <!-- Latest-news starts
    ======================================= -->
    @include('home.latest_news')
    <!-- End of .latest-news -->

    <!-- Newsletter starts
    ======================================= -->
    @include('home.newsletter')
    <!-- End of .newsletter -->
@endsection
