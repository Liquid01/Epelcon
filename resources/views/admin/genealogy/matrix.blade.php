@extends('layouts.admin')
@section('page_title')
    My Stage Natrix
@endsection


@section('content')
    <div class="content-wrapper-before black"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0">{{strtoupper($user->username)}}'S MATRIX</h5>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('member_details', $user->username)}}">Details</a>
                        </li>
                        <li class="breadcrumb-item active"> Matrix
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="row hide-on-large-only hide-on-med-only show-on-small tree_small_stage">
        <div class="col s12 m12 l12">
            <div id="swipeable-tabs" class="card card card-default scrollspy">
                <div class="card card-hero">
                    <h4 class="header center">Stage {{$user->stage}} Matrix</h4>
                    <div class="row">
                        <div class="col s12">
                            <center>
                                <a href="javascript:void(0);">
                                    <img src="{{asset('assets/img/avatar2.png')}}" alt=""
                                         class="img-responsive">
                                    <br>
                                    {{$user->username}}
                                </a>
                            </center>
                            <ul id="tabs-swipe-demo" class="tabs">
                                <li class="tab col m6"><a class="active" href="#test-swipe-1">Left</a></li>
                                <li class="tab col m6"><a href="#test-swipe-2">Right</a></li>
                            </ul>
                            <div id="test-swipe-1" class="col s12 carousel carousel-item white white-text"
                                 style="background-color: white;">
                                <div class="col s12 mt-1"></div>
                                <div class="black-text">LEFT LEG</div>
                                <div class="tree" style="">
                                    <ul>
                                        <li>
                                            @if($stage_matrix->p1 != null)
                                                <a href="javascript:void(0);">
                                                    <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                         class="img-responsive">
                                                    <br>
                                                    {{$stage_matrix->p1}}
                                                </a>
                                            @else
                                                <a href="javascript:void(0);">
                                                    <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                    <div>nil</div>
                                                </a>
                                            @endif
                                            <ul>
                                                <li>
                                                    @if($stage_matrix->p3 != null)
                                                        <a href="javascript:void(0);">
                                                            <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                                 class="img-responsive">
                                                            <br>
                                                            {{$stage_matrix->p3}}
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0);">
                                                            <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                            <div>nil</div>
                                                        </a>
                                                    @endif
                                                    <ul>
                                                        <li>
                                                            @if($stage_matrix->p7 != null)
                                                                <a href="javascript:void(0);">
                                                                    <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                                         class="img-responsive">
                                                                    <br>
                                                                    {{$stage_matrix->p7}}
                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);">
                                                                    <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                                    <div>nil</div>
                                                                </a>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            @if($stage_matrix->p8 != null)
                                                                <a href="javascript:void(0);">
                                                                    <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                                         class="img-responsive">
                                                                    <br>
                                                                    {{$stage_matrix->p8}}
                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);">
                                                                    <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                                    <div>nil</div>
                                                                </a>
                                                            @endif
                                                        </li>
                                                    </ul>
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
                                                            <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                            <div>nil</div>
                                                        </a>
                                                    @endif
                                                    <ul>
                                                        <li>
                                                            @if($stage_matrix->p9 != null)
                                                                <a href="javascript:void(0);">
                                                                    <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                                         class="img-responsive">
                                                                    <br>
                                                                    {{$stage_matrix->p9}}
                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);">
                                                                    <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                                    <div>nil</div>
                                                                </a>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            @if($stage_matrix->p10 != null)
                                                                <a href="javascript:void(0);">
                                                                    <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                                         class="img-responsive">
                                                                    <br>
                                                                    {{$stage_matrix->p10}}
                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);">
                                                                    <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                                    <div>nil</div>
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
                            <div id="test-swipe-2" class="col s12 carousel carousel-item white white-text">
                                <div class="col s12 mt-1"></div>
                                <p class="black-text">RIGHT LEG</p>
                                <div class="tree" style="">
                                    <ul>
                                        <li>
                                            @if($stage_matrix->p2 != null)
                                                <a href="javascript:void(0);">
                                                    <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                         class="img-responsive">
                                                    <br>
                                                    {{$stage_matrix->p2}}
                                                </a>
                                            @else
                                                <a href="javascript:void(0);">
                                                    <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                    <div>nil</div>
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
                                                            <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                            <div>nil</div>
                                                        </a>
                                                    @endif
                                                    <ul>
                                                        <li>
                                                            @if($stage_matrix->p11 != null)
                                                                <a href="javascript:void(0);">
                                                                    <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                                         class="img-responsive">
                                                                    <br>
                                                                    {{$stage_matrix->p11}}
                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);">
                                                                    <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                                    <div>nil</div>
                                                                </a>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            @if($stage_matrix->p12 != null)
                                                                <a href="javascript:void(0);">
                                                                    <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                                         class="img-responsive">
                                                                    <br>
                                                                    {{$stage_matrix->p12}}
                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);">
                                                                    <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                                    <div>nil</div>
                                                                </a>
                                                            @endif
                                                        </li>
                                                    </ul>
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
                                                            <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                            <div>nil</div>
                                                        </a>
                                                    @endif
                                                    <ul>
                                                        <li>
                                                            @if($stage_matrix->p13 != null)
                                                                <a href="javascript:void(0);">
                                                                    <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                                         class="img-responsive">
                                                                    <br>
                                                                    {{$stage_matrix->p13}}
                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);">
                                                                    <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                                    <div>nil</div>
                                                                </a>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            @if($stage_matrix->p14 != null)
                                                                <a href="javascript:void(0);">
                                                                    <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                                         class="img-responsive">
                                                                    <br>
                                                                    {{$stage_matrix->p14}}
                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);">
                                                                    <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                                    <div>nil</div>
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
    </div>

    <center>
        <div class="container mt-50 hide-on-small-only">
            <div class="card card-hero pb-3">
                <div class="mb-3">
                    <h5>Stage  {{$user->stage}} Matrix</h5>
                    <div class="tree" >
                        <ul>
                            <li>
                                <a href="javascript:void(0);">
                                    <img src="{{asset('assets/img/avatar2.png')}}" alt=""
                                         class="img-responsive">
                                    <br>
                                    {{$user->username}}
                                </a>
                                <ul>
                                    <li>
                                        @if($stage_matrix->p1 != null)
                                            <a href="javascript:void(0);">
                                                <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                     class="img-responsive">
                                                <br>
                                                {{$stage_matrix->p1}}
                                            </a>
                                        @else
                                            <a href="javascript:void(0);">
                                                <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                <div>nil</div>
                                            </a>
                                        @endif
                                        <ul>
                                            <li>
                                                @if($stage_matrix->p3 != null)
                                                    <a href="javascript:void(0);">
                                                        <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                             class="img-responsive">
                                                        <br>
                                                        {{$stage_matrix->p3}}
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0);">
                                                        <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                        <div>nil</div>
                                                    </a>
                                                @endif
                                                <ul>
                                                    <li>
                                                        @if($stage_matrix->p7 != null)
                                                            <a href="javascript:void(0);">
                                                                <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                                     class="img-responsive">
                                                                <br>
                                                                {{$stage_matrix->p7}}
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0);">
                                                                <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                                <div>nil</div>
                                                            </a>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        @if($stage_matrix->p8 != null)
                                                            <a href="javascript:void(0);">
                                                                <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                                     class="img-responsive">
                                                                <br>
                                                                {{$stage_matrix->p8}}
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0);">
                                                                <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                                <div>nil</div>
                                                            </a>
                                                        @endif
                                                    </li>
                                                </ul>
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
                                                        <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                        <div>nil</div>
                                                    </a>
                                                @endif
                                                <ul>
                                                    <li>
                                                        @if($stage_matrix->p9 != null)
                                                            <a href="javascript:void(0);">
                                                                <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                                     class="img-responsive">
                                                                <br>
                                                                {{$stage_matrix->p9}}
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0);">
                                                                <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                                <div>nil</div>
                                                            </a>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        @if($stage_matrix->p10 != null)
                                                            <a href="javascript:void(0);">
                                                                <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                                     class="img-responsive">
                                                                <br>
                                                                {{$stage_matrix->p10}}
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0);">
                                                                <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                                <div>nil</div>
                                                            </a>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        @if($stage_matrix->p2 != null)
                                            <a href="javascript:void(0);">
                                                <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                     class="img-responsive">
                                                <br>
                                                {{$stage_matrix->p2}}
                                            </a>
                                        @else
                                            <a href="javascript:void(0);">
                                                <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                <div>nil</div>
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
                                                        <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                        <div>nil</div>
                                                    </a>
                                                @endif
                                                <ul>
                                                    <li>
                                                        @if($stage_matrix->p11 != null)
                                                            <a href="javascript:void(0);">
                                                                <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                                     class="img-responsive">
                                                                <br>
                                                                {{$stage_matrix->p11}}
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0);">
                                                                <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                                <div>nil</div>
                                                            </a>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        @if($stage_matrix->p12 != null)
                                                            <a href="javascript:void(0);">
                                                                <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                                     class="img-responsive">
                                                                <br>
                                                                {{$stage_matrix->p12}}
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0);">
                                                                <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                                <div>nil</div>
                                                            </a>
                                                        @endif
                                                    </li>
                                                </ul>
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
                                                        <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                        <div>nil</div>
                                                    </a>
                                                @endif
                                                <ul>
                                                    <li>
                                                        @if($stage_matrix->p13 != null)
                                                            <a href="javascript:void(0);">
                                                                <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                                     class="img-responsive">
                                                                <br>
                                                                {{$stage_matrix->p13}}
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0);">
                                                                <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                                <div>nil</div>
                                                            </a>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        @if($stage_matrix->p41 != null)
                                                            <a href="javascript:void(0);">
                                                                <img src="{{asset('assets/img/avatar.png')}}" alt=""
                                                                     class="img-responsive">
                                                                <br>
                                                                {{$stage_matrix->p14}}
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0);">
                                                                <i class="material-icons dp48 stage_matrix_icon">account_circle</i>
                                                                <div>nil</div>
                                                            </a>
                                                        @endif
                                                    </li>
                                                </ul>
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

    </center>

@endsection
<!-- END: Page Main-->
