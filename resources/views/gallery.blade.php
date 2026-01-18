@extends('layouts.app')


@section('content')
    <div class="clearfix" style="clear:both!important;"></div>
    <section class="page-title ptb-50" style="margin-top:100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Gallery</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="active">Gallery 4</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-50">
                <h2 class="section-title text-uppercase">Our Activities</h2>

            </div>
            <div class="portfolio-container text-center">
                {{--<ul class="portfolio-filter brand-filter">--}}
                {{--<li class="active waves-effect waves-light" data-group="all">All</li>--}}
                {{--<li class="waves-effect waves-light" data-group="websites">Websites</li>--}}
                {{--<li class="waves-effect waves-light" data-group="branding">Branding</li>--}}
                {{--<li class="waves-effect waves-light" data-group="marketing">Marketing</li>--}}
                {{--<li class="waves-effect waves-light" data-group="photography">Photography</li>--}}
                {{--</ul>--}}
                <div class="portfolio col-4 mtb-50 gutter">

                    @isset($images)
                        @forelse($images as $image)
                            <div class="portfolio-item" data-groups='["all", "branding", "photography"]'>
                                <div class="portfolio-wrapper">
                                    <div class="thumb">
                                        <div class="bg-overlay"></div>
                                        <img src="{{asset('assets/img/gallery/small/'.$image->getFilename())}}" alt="">
                                        <div class="portfolio-intro">
                                            <div class="action-btn">
                                                <a href="{{asset('assets/img/gallery/big/'.$image->getFilename())}}"
                                                   class="tt-lightbox"
                                                   title=""><i class="fa fa-search"></i></a>
                                            </div>
                                            <h2><a href="#">Innauguration</a></h2>
                                            <p><a href="#">Gallery</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <h3>No images in Gallery</h3>
                        @endforelse
                    @endisset


                </div>
                <div class="load-more-button text-center">
                    <a class="waves-effect waves-light btn btn-large pink"> <i class="fa fa-spinner left"></i> Load More</a>
                </div>
            </div>
        </div>
    </section>
@endsection