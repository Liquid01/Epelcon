@extends('layouts.web')


@section('content')
    <!-- .wpo-breadcumb-area start -->
    <div class="wpo-breadcumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wpo-breadcumb-wrap">
                        <h2>EPELCON Stockists</h2>
                        <ul>
                            <li><a href="{{route('homepage')}}">Home</a></li>
                            <li><span>Stockists</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .wpo-breadcumb-area end -->

    <!-- start wpo-blog-pg-section -->
    <section class="wpo-blog-pg-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col col-md-4">
                    <div class="wpo-blog-sidebar wpo-blog-sidebar-2">
                        <div class="widget search-widget">
                            <h3>Search Stockists</h3>
                            <form method="post" action="#!">
                                <div>
                                    <input type="text" name="stockist" class="form-control"
                                           placeholder="Enter Store Name or Username">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="widget category-widget">
                            <h3>Categories</h3>
                            <ul>
                                <li><a href="#">Latest Stockists</a></li>
                                <li><a href="#">Available</a></li>
                                <li><a href="#">Nearest</a></li>
                            </ul>
                        </div>
                        <div class="widget recent-post-widget">
                            <h3>Latest Stockist</h3>
                            {{--                            <div class="posts">--}}
                            {{--                                <div class="post">--}}
                            {{--                                    <div class="img-holder">--}}
                            {{--                                        <img src="{{asset('assets/images/recent-posts/img-1.jpg')}}" alt>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="details">--}}
                            {{--                                        <h4><a href="#">Many Children are suffering a lot for food.</a></h4>--}}
                            {{--                                        <span class="date">22 Sep 2020</span>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                        {{--                        <div class="widget tag-widget">--}}
                        {{--                            <h3>Tags</h3>--}}
                        {{--                            <ul>--}}
                        {{--                                <li><a href="#">Donations</a></li>--}}
                        {{--                                <li><a href="#">Charity</a></li>--}}
                        {{--                                <li><a href="#">Help</a></li>--}}
                        {{--                                <li><a href="#">Non Profit</a></li>--}}
                        {{--                                <li><a href="#">Poor People</a></li>--}}
                        {{--                                <li><a href="#">Helping Hand</a></li>--}}
                        {{--                                <li><a href="#">Video</a></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
                <div class="col col-md-8">
                    <div class="wpo-wpo-blog-content">
                        <div class="row">
                            @php
                                $n=0;
                            @endphp

                            @if(count($stores) > 0)
                                @foreach($stores as $store)
                                    <div class="col-md-4 col-sm-6 col-12" style="height: 300px;">
                                        <div class="wpo-event-item">
                                            {{--                                        <div class="wpo-event-img">--}}
                                            {{--                                            <img src="{{asset('assets/images/stockists/epelcon-stockist.png')}}"--}}
                                            {{--                                                 alt="">--}}
                                            {{--                                            <div class="thumb-text">--}}
                                            {{--                                                <span style="">ON</span>--}}
                                            {{--                                                <span>STOCK</span>--}}
                                            {{--                                            </div>--}}
                                            {{--                                        </div>--}}
                                            <div class="wpo-event-text">
                                                {{--                                            <h6>{{$store->user->username}}</h6>--}}
                                                <h6>{{$store->name}}</h6>
                                                <div>
                                                    <p style="font-size: 13px;"><i class="fi flaticon-pin"></i>
                                                        {{substr($store->address1. ' '. $store->address2 . ' '. $store->city, 0, 80)}}
                                                        ...
                                                        <br>
                                                        {{$store->state. ', '. $store->country}}.
                                                    </p>

                                                    <p style="font-size: 13px;">

                                                        <i class="fi fa fa-phone" aria-hidden="true"></i>
                                                        {{$store->phone}} <br>
                                                        <i class="fi fa fa-phone" aria-hidden="true"></i>
                                                        {{$store->phone2?$store->phone2:'Nil'}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if (++$n % 3 == 0)
                                        <div class='clearfix'></div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div>{{$stores->links()}}</div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end wpo-blog-pg-section -->
@endsection