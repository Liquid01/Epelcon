@extends('layouts.members')
@section('page_title')
    My Downlines - Tree
@endsection

@section('content')

    <div class="row" style="">
        <div class="content-wrapper-before gradient-45deg-deep-orange-orange"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">MY DOWNLINE TREE</h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Downlines
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12">
            <div class="container">
                <div class="section ">
                    <div class="card center-align">
                        <div class="card-content" style="padding: 20px 5px;">
                            <a href="{{url()->previous()}}"
                               class=" modal-trigger waves-effect waves-light btn btn-small gradient-45deg-light-blue-cyan z-depth-4 mb-2">
                                Back
                            </a>
                            <a href="{{route('user_downline_tree', auth()->user()->username)}}"
                               class="modal-trigger waves-effect waves-light btn btn-small gradient-45deg-red-pink z-depth-4 mb-2">
                                {{auth()->user()->username}}
                            </a>
                        </div>
                        @include('includes.flash')
                    </div>

                    <!-- DataTables Row grouping -->

                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <div class="card-content">
                                    <h4 class="card-title">My Tree</h4>
                                    <div class="row">
                                        <div class="col s12 center-align">

                                            {{--SHOW ON SMALL SCREEN--}}
                                            <div class="hide-on-large-only hide-on-med-only tree_small">

                                                <div class="row">
                                                    <div class="col s2 offset-s5">
                                                        <a href="{{route('user_downline_tree', $username == null ? auth()->user()->username : $username)}}"
                                                           class="d-container mb-2 tooltipped" data-position="bottom" data-tooltip="I am a tooltip">
                                                            <div class="circle"
                                                                 style="width:30px; border: 1px solid #000; height: 30px; background:yellow; border-radius: 50%; margin-bottom:20px;">
                                                                <img src="{{asset('assets2/img/avatar2.png')}}"
                                                                     class="img-responsive img-circle circle"
                                                                     style="max-width:100%;" alt="">
                                                                <p class="text-center" style="font-size:10px!important; margin-top:8px;">{{$username == null ? auth()->user()->username : $username}}</p>
                                                            </div>

                                                            {{--if the downlines are not in the array, let there be a circle for the following diagrams--}}
                                                        </a>
                                                    </div>
                                                </div>
                                                @isset($first_downlines)
                                                    <div class="row">
                                                        <div class="col s2 offset-s2">
                                                            @if($first_downlines->p1 != null)
                                                                <a href="{{route('user_downline_tree', $first_downlines->p1)}}"
                                                                   class="d-container">
                                                                    <div class="circle circle-downlines"
                                                                         style="max-width:30px; max-height:30px;">
                                                                        <img src="{{asset('assets2/img/avatar.png')}}"
                                                                             class="img-responsive img-circle circle"
                                                                             style="max-width:10px" alt="">
                                                                        <p class="text-center member_downlines">{{substr($first_downlines->p1, 0, 4)}}..</p>
                                                                    </div>

                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);"
                                                                   class="d-container">
                                                                    <div class="circle circle-downlines"
                                                                         style="width: 30px; height: 30px;"></div>
                                                                    <p class="text-center member_downlines" style="margin:-20px 0px 0px -15px;">nil</p>
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <div class="col s2 offset-s4">
                                                            @if($first_downlines->p2 != null)
                                                                <a href="{{route('user_downline_tree', $first_downlines->p2)}}"
                                                                   class="d-container">
                                                                    <div class="circle circle-downlines"
                                                                         style="max-width:30px; max-height:30px;">
                                                                        <img src="{{asset('assets2/img/avatar.png')}}"
                                                                             class="img-responsive img-circle circle"
                                                                             style="max-width:10px" alt="">
                                                                        <p class="text-center member_downlines">{{substr($first_downlines->p2, 0, 4)}}..</p>
                                                                    </div>

                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);"
                                                                   class="d-container">
                                                                    <div class="circle circle-downlines"
                                                                         style="width: 30px; height: 30px;">

                                                                    </div>
                                                                    <p class="text-center member_downlines" style="margin:-20px 0px 0px -15px;">nil</p>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    {{--Level 2--}}
                                                    <div class="row">
                                                        <div class="col s2">
                                                            @if($first_downlines->p3 != null)
                                                                <a href="{{route('user_downline_tree', $first_downlines->p3)}}"
                                                                   class="d-container">
                                                                    <div class="circle circle-downlines"
                                                                         style="max-width:30px; max-height:30px;">
                                                                        <img src="{{asset('assets2/img/avatar.png')}}"
                                                                             class="img-responsive img-circle circle"
                                                                             style="max-width:10px" alt="">
                                                                        <p class="text-center member_downlines">{{substr($first_downlines->p3, 0, 4)}}..</p>
                                                                    </div>

                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);"
                                                                   class="d-container">
                                                                    <div class="circle circle-downlines"
                                                                         style="width: 30px; height: 30px;"></div>
                                                                    <p class="text-center member_downlines" style="margin:-20px 0px 0px -15px;">nil</p>
                                                                </a>
                                                            @endif
                                                        </div>
                                                        {{--p4--}}
                                                        <div class="col s2 offset-s2">
                                                            @if($first_downlines->p4 != null)
                                                                <a href="{{route('user_downline_tree', $first_downlines->p4)}}"
                                                                   class="d-container">
                                                                    <div class="circle circle-downlines"
                                                                         style="max-width:30px; max-height:30px;">
                                                                        <img src="{{asset('assets2/img/avatar.png')}}"
                                                                             class="img-responsive img-circle circle"
                                                                             style="max-width:10px" alt="">
                                                                        <p class="text-center member_downlines">{{substr($first_downlines->p4, 0, 4)}}..</p>
                                                                    </div>

                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);"
                                                                   class="d-container">
                                                                    <div class="circle circle-downlines"
                                                                         style="width: 30px; height: 30px;"></div>
                                                                    <p class="text-center member_downlines" style="margin:-20px 0px 0px -15px;">nil</p>
                                                                </a>
                                                            @endif
                                                        </div>


                                                        <div class="col s2">
                                                            @if($first_downlines->p5 != null)
                                                                <a href="{{route('user_downline_tree', $first_downlines->p5)}}"
                                                                   class="d-container">
                                                                    <div class="circle circle-downlines"
                                                                         style="max-width:30px; max-height:30px;">
                                                                        <img src="{{asset('assets2/img/avatar.png')}}"
                                                                             class="img-responsive img-circle circle"
                                                                             style="max-width:10px" alt="">
                                                                        <p class="text-center member_downlines">{{substr($first_downlines->p5, 0, 4)}}..</p>
                                                                    </div>

                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);"
                                                                   class="d-container">
                                                                    <div class="circle circle-downlines"
                                                                         style="width: 30px; height: 30px;"></div>
                                                                    <p class="text-center member_downlines" style="margin:-20px 0px 0px -15px;">nil</p>
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <div class="col s2 offset-s2">
                                                            @if($first_downlines->p6 != null)
                                                                <a href="{{route('user_downline_tree', $first_downlines->p6)}}"
                                                                   class="d-container">
                                                                    <div class="circle circle-downlines"
                                                                         style="max-width:30px; max-height:30px;">
                                                                        <img src="{{asset('assets2/img/avatar.png')}}"
                                                                             class="img-responsive img-circle circle"
                                                                             style="max-width:10px" alt="">
                                                                        <p class="text-center member_downlines">{{substr($first_downlines->p6, 0, 4)}}..</p>
                                                                    </div>

                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);"
                                                                   class="d-container">
                                                                    <div class="circle circle-downlines"
                                                                         style="width: 30px; height: 30px;"></div>
                                                                    <p class="text-center member_downlines" style="margin:-20px 0px 0px -15px;">nil</p>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endisset
                                            </div>


                                            {{--hide on small--}}
                                            <div class="hide-on-small-only">

                                                <div class="row">
                                                    <div class="col l2 offset-l5 m2 offset-m5">
                                                        <a href="{{route('user_downline_tree', $username == null ? auth()->user()->username : $username)}}"
                                                           class="d-container mb-2 tooltipped" data-position="bottom" data-tooltip="{{$username}}">
                                                            <div class="circle"
                                                                 style="width:70px; border: 1px solid #000; height: 70px; background:yellow; border-radius: 50%; margin-bottom:20px;">
                                                                <img src="{{asset('assets2/img/avatar2.png')}}"
                                                                     class="img-responsive img-circle circle"
                                                                     style="max-width:70px;" alt="">
                                                                <p class="text-center" style="font-size:10px!important;">{{$username == null ? auth()->user()->username : $username}}</p>
                                                            </div>

                                                            {{--if the downlines are not in the array, let there be a circle for the following diagrams--}}
                                                        </a>
                                                    </div>
                                                </div>
                                                @isset($first_downlines)
                                                    <div class="row">
                                                        <div class="col l2 offset-l2 m2 offset-m2">
                                                            @if($first_downlines->p1 != null && $first_downlines->p1 != null)
                                                                {{--@foreach($first_downlines as $downline)--}}
                                                                <a href="{{route('user_downline_tree', $first_downlines->p1)}}"
                                                                   class="d-container tooltipped" data-position="bottom" data-tooltip="I am a tooltip">
                                                                    <div class="circle circle-downlines" style="">
                                                                        <img src="{{asset('assets2/img/avatar.png')}}"
                                                                             class="img-responsive img-circle circle"
                                                                             style="max-width:70px;" alt="">
                                                                        <p class="text-center member_downlines">{{$first_downlines->p1}}</p>
                                                                    </div>

                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);" class="d-container">
                                                                    <div class="circle circle-downlines" style=""></div>
                                                                    <p class="text-center member_downlines" style="margin:-20px 0px 0px -15px;">nil</p>
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <div class="col l2  offset-l4 m2 offset-m4">
                                                            @if($first_downlines->p2 != null && $first_downlines->p2 != null)
                                                                {{--@foreach($first_downlines as $downline)--}}
                                                                <a href="{{route('user_downline_tree', $first_downlines->p2)}}"
                                                                   class="d-container">
                                                                    <div class="circle circle-downlines" style="">
                                                                        <img src="{{asset('assets2/img/avatar.png')}}"
                                                                             class="img-responsive img-circle circle"
                                                                             style="max-width:70px;" alt="">
                                                                        <p class="text-center member_downlines">{{$first_downlines->p2}}</p>
                                                                    </div>

                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);" class="d-container">
                                                                    <div class="circle circle-downlines"
                                                                         style="width:70px;"></div>
                                                                    <p class="text-center member_downlines" style="margin:-20px 0px 0px -15px;">nil</p>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>


                                                    {{--level 2--}}
                                                    <div class="row">
                                                        <div class="col l2 m2 ">
                                                            @if($first_downlines->p3 != null && $first_downlines->p3 != null)
                                                                {{--@foreach($first_downlines as $downline)--}}
                                                                <a href="{{route('user_downline_tree', $first_downlines->p3)}}"
                                                                   class="d-container">
                                                                    <div class="circle circle-downlines" style="">
                                                                        <img src="{{asset('assets2/img/avatar.png')}}"
                                                                             class="img-responsive img-circle circle"
                                                                             style="max-width:70px;" alt="">
                                                                        <p class="text-center member_downlines">{{$first_downlines->p3}}</p>
                                                                    </div>

                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);" class="d-container">
                                                                    <div class="circle circle-downlines" style=""></div>
                                                                    <p class="text-center member_downlines" style="margin:-20px 0px 0px -15px;">nil</p>
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <div class="col l2 offset-l2 m2 offset-m2">
                                                            @if($first_downlines->p4 != null && $first_downlines->p4 != null)
                                                                {{--@foreach($first_downlines as $downline)--}}
                                                                <a href="{{route('user_downline_tree', $first_downlines->p4)}}"
                                                                   class="d-container">
                                                                    <div class="circle circle-downlines" style="">
                                                                        <img src="{{asset('assets2/img/avatar.png')}}"
                                                                             class="img-responsive img-circle circle"
                                                                             style="max-width:70px;" alt="">
                                                                        <p class="text-center member_downlines">{{$first_downlines->p4}}</p>
                                                                    </div>

                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);" class="d-container">
                                                                    <div class="circle circle-downlines"
                                                                         style="width:70px;"></div>
                                                                    <p class="text-center member_downlines" style="margin:-20px 0px 0px -15px;">nil</p>
                                                                </a>
                                                            @endif
                                                        </div>

                                                        {{--p5 & 6--}}
                                                        <div class="col l2 m2 ">
                                                            @if($first_downlines->p5 != null && $first_downlines->p5 != null)
                                                                {{--@foreach($first_downlines as $downline)--}}
                                                                <a href="{{route('user_downline_tree', $first_downlines->p5)}}"
                                                                   class="d-container">
                                                                    <div class="circle circle-downlines" style="">
                                                                        <img src="{{asset('assets2/img/avatar.png')}}"
                                                                             class="img-responsive img-circle circle"
                                                                             style="max-width:70px;" alt="">
                                                                        <p class="text-center member_downlines">{{$first_downlines->p5}}</p>
                                                                    </div>

                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);" class="d-container">
                                                                    <div class="circle circle-downlines" style=""></div>
                                                                    <p class="text-center member_downlines" style="margin:-20px 0px 0px -15px;">nil</p>
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <div class="col l2 offset-l2 m2 offset-m2">
                                                            @if($first_downlines->p6 != null && $first_downlines->p6 != null)
                                                                {{--@foreach($first_downlines as $downline)--}}
                                                                <a href="{{route('user_downline_tree', $first_downlines->p6)}}"
                                                                   class="d-container">
                                                                    <div class="circle circle-downlines" style="">
                                                                        <img src="{{asset('assets2/img/avatar.png')}}"
                                                                             class="img-responsive img-circle circle"
                                                                             style="max-width:70px;" alt="">
                                                                        <p class="text-center member_downlines">{{$first_downlines->p6}}</p>
                                                                    </div>

                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);" class="d-container">
                                                                    <div class="circle circle-downlines"
                                                                         style="width:70px;"></div>
                                                                    <p class="text-center member_downlines" style="margin:-20px 0px 0px -15px;">nil</p>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>


                                                @endisset
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

@endsection
