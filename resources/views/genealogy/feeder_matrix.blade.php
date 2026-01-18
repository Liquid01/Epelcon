@extends('layouts.members')

@section('page_title')

    My Feeder Matrix

@endsection

@section('content')

    <div class="container ">

        <div class="content-wrapper-before black"></div>

        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">

            <!-- Search for small screen-->

            <div class="container">

                <div class="row">

                    <div class="col s10 m6 l6">

                        <h5 class="breadcrumbs-title mt-0 mb-0">MY MATRIX</h5>

                        <ol class="breadcrumbs mb-0">

                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>

                            </li>

                            <li class="breadcrumb-item white-text active">My Matrix

                            </li>

                        </ol>

                    </div>

                </div>

            </div>

        </div>



        <div class="container mt-50">

            <div class="card pb-3">

                <div class="">



                    {{--big and med screen feeder matrix--}}

                    <div class=" hide-on-small-only hide-on-med-only">

                        <div class="col l10  offset-l2 m11 offset-m1">

                            <div class="tree" style="">

                                <ul>

                                    <li>

                                        <a href="#">

                                            <img src="{{asset('assets/img/avatar2.png')}}" alt="" class="img-responsive">

                                            <br>

                                            {{auth()->user()->username}}

                                        </a>

                                        <ul>

                                            <li>

                                                {{--POSITION 1--}}



                                                @if($stage_matrix->p1 != null)

                                                    <a href="{{route('get_stage_matrix', $stage_matrix->p1)}}">

                                                        <img src="{{asset('assets/img/avatar.png')}}" alt=""

                                                             class="img-responsive">

                                                        <br>

                                                        {{$stage_matrix->p1}}

                                                    </a>

                                                @else

                                                    <a href="javascript:void(0);">

                                                        <i class="material-icons dp48 matrix-icon">account_circle</i>

                                                        <div>Nil</div>

                                                    </a>

                                                @endif

                                                <ul>

                                                    <li>

                                                        @if($stage_matrix->p3 != null)

                                                            {{--<a href="{{route('get_stage_matrix', $stage_matrix->p1)}}">--}}

                                                            <a href="javascript:void(0);">

                                                                <img src="{{asset('assets/img/avatar.png')}}" alt=""

                                                                     class="img-responsive">

                                                                <br>

                                                                {{$stage_matrix->p3}}

                                                            </a>

                                                        @else

                                                            <a href="javascript:void(0);">



                                                                <i class="material-icons dp48 matrix-icon">account_circle</i>

                                                                <div>Nil</div>

                                                            </a>

                                                        @endif

                                                    </li>

                                                    <li>

                                                        @if($stage_matrix->p4 != null)

                                                            <a href="javascript:void(0);">

                                                                <img src="{{asset('assets/img/avatar.png')}}" alt=""

                                                                     class="img-responsive">

                                                                <br>

                                                                {{$stage_matrix->p4}}

                                                            </a>

                                                        @else

                                                            <a href="javascript:void(0);">

                                                                <i class="material-icons dp48 matrix-icon">account_circle</i>

                                                                <div>Nil</div>

                                                            </a>

                                                        @endif

                                                    </li>

                                                </ul>

                                            </li>

                                            <li>

                                                {{--POSITION 2--}}

                                                @if($stage_matrix->p2 != null)

                                                    <a href="javascript:void(0);">

                                                        <img src="{{asset('assets/img/avatar.png')}}" alt=""

                                                             class="img-responsive">

                                                        <br>

                                                        {{$stage_matrix->p2}}

                                                    </a>

                                                    </a>

                                                @else

                                                    <a href="javascript:void(0);">

                                                        <i class="material-icons dp48 matrix-icon">account_circle</i>

                                                        <div>Nil</div>

                                                    </a>

                                                @endif

                                                <ul>

                                                    <li>

                                                        @if($stage_matrix->p5 != null)

                                                            <a href="javascript:void(0);">

                                                                <img src="{{asset('assets/img/avatar.png')}}" alt=""

                                                                     class="img-responsive">

                                                                <br>

                                                                {{$stage_matrix->p5}}

                                                            </a>

                                                        @else

                                                            <a href="javascript:void(0);">



                                                                <i class="material-icons dp48 matrix-icon">account_circle</i>

                                                                <div>Nil</div>

                                                            </a>

                                                        @endif

                                                    </li>

                                                    <li>

                                                        @if($stage_matrix->p6 != null)

                                                            <a href="javascript:void(0);">

                                                                <img src="{{asset('assets/img/avatar.png')}}" alt=""

                                                                     class="img-responsive">

                                                                <br>

                                                                {{$stage_matrix->p6}}

                                                            </a>

                                                        @else

                                                            <a href="javascript:void(0);">

                                                                <i class="material-icons dp48 matrix-icon">account_circle</i>

                                                                <div>Nil</div>

                                                            </a>



                                                        @endif

                                                    </li>

                                                </ul>

                                            </li>

                                        </ul>

                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>



                    {{--small Screen Feeder Matrix--}}

                    <div class=" hide-on-med-only hide-on-large-only">

                        <div class="col s12" style="text-align:center; padding:0px!important;">

                            <div class="tree small_tree" style="display:inline">

                                <ul>

                                    <li>

                                        <a href="#">

                                            <img src="{{asset('assets/img/avatar2.png')}}" alt="" class="img-responsive">

                                            <br>

                                            {{auth()->user()->username}}

                                        </a>

                                        <ul>

                                            <li>

                                                {{--POSITION 1--}}



                                                @if($stage_matrix->p1 != null)

{{--                                                    <a href="{{route('get_stage_matrix', $stage_matrix->p1)}}">--}}

                                                    <a href="javascript:void(0);">

                                                        <img src="{{asset('assets/img/avatar.png')}}" alt="" class="img-responsive">

                                                        <br>

                                                        {{$stage_matrix->p1}}

                                                    </a>

                                                @else

                                                    <a href="javascript:void(0);">

                                                        <i class="material-icons dp48 matrix-icon">account_circle</i>

                                                        <div>Nil</div>

                                                    </a>

                                                @endif

                                                <ul>

                                                    <li>

                                                        @if($stage_matrix->p3 != null)

                                                            <a href="javascript:void(0);">

                                                                <img src="{{asset('assets/img/avatar.png')}}" alt="" class="img-responsive">

                                                                <br>

                                                                {{$stage_matrix->p3}}

                                                            </a>

                                                        @else

                                                            <a href="javascript:void(0);">

                                                                <i class="material-icons dp48 matrix-icon">account_circle</i>

                                                                <div>Nil</div>

                                                            </a>

                                                        @endif

                                                    </li>

                                                    <li>

                                                        @if($stage_matrix->p4 != null)

                                                            <a href="javascript:void(0);">

                                                                <img src="{{asset('assets/img/avatar.png')}}" alt="" class="img-responsive">

                                                                <br>

                                                                {{$stage_matrix->p4}}

                                                            </a>

                                                        @else

                                                            <a href="javascript:void(0);">

                                                                <i class="material-icons dp48 matrix-icon">account_circle</i>

                                                                <div>Nil</div>

                                                            </a>

                                                        @endif

                                                    </li>

                                                </ul>

                                            </li>

                                            <li>

                                                {{--POSITION 2--}}

                                                @if($stage_matrix->p2 != null)

                                                    <a href="javascript:void(0);">

                                                        <img src="{{asset('assets/img/avatar.png')}}" alt="" class="img-responsive">

                                                        <br>

                                                        {{$stage_matrix->p2}}

                                                    </a>

                                                @else

                                                    <a href="javascript:void(0);">

                                                        <i class="material-icons dp48 matrix-icon">account_circle</i>

                                                        <div>Nil</div>

                                                    </a>

                                                @endif

                                                <ul>

                                                    <li>

                                                        @if($stage_matrix->p5 != null)

                                                            <a href="javascript:void(0);">

                                                                <img src="{{asset('assets/img/avatar.png')}}" alt="" class="img-responsive">

                                                                <br>

                                                                {{$stage_matrix->p5}}

                                                            </a>

                                                        @else

                                                            <a href="javascript:void(0);">

                                                                <i class="material-icons dp48 matrix-icon">account_circle</i>

                                                                <div>Nil</div>

                                                            </a>

                                                        @endif

                                                    </li>

                                                    <li>

                                                        @if($stage_matrix->p6 != null)

                                                            <a href="javascript:void(0);">

                                                                <img src="{{asset('assets/img/avatar.png')}}" alt="" class="img-responsive">

                                                                <br>

                                                                {{$stage_matrix->p6}}

                                                            </a>

                                                        @else

                                                            <a href="javascript:void(0);">

                                                                <i class="material-icons dp48 matrix-icon">account_circle</i>

                                                                <div>Nil</div>

                                                            </a>



                                                        @endif

                                                    </li>

                                                </ul>

                                            </li>

                                        </ul>

                                    </li>

                                </ul>

                            </div>

                        </div>

                    </div>



                </div>

            </div>



        </div>







    </div>



@endsection

<!-- END: Page Main-->
