@extends('layouts.admin')

@section('content')
    <!-- BEGIN: Page Main-->
    {{--<div id=    "main">--}}
    <div class="row">
        <div class="content-wrapper-before black"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">Member Details</h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('allMembers')}}">Members</a>
                            </li>
                            <li class="breadcrumb-item active">User Profile Page
                            </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <div class="row user-profile mt-1">
                    <img class="responsive-img" alt="" src="{{asset('backassets/images/gallery/chat-bg-small.jpg')}}">
                </div>
                <div class="section" style="" id="user-profile">
                    <div class="row">
                        <!-- User Profile Feed -->
                        <div class="row user-section-negative-margin">
                            <div class="row">
                                <div class="col s12 center-align">
                                    <span class="hidden" style="display:none;">{{$image = auth()->user()->image == null? 'avatar2.png':auth()->user()->image}}</span>
                                    {{--                                    {{app('current_user')->image == null? $image='avatar2.png':$image=app('current_user')->image}}--}}
                                    <img class="responsive-img circle z-depth-5" width="200"
                                         src="{{asset('assets/img/'.$image)}}" alt="Profile Pix">
                                    <br>
                                </div>
                            </div>
                            <div class="col s12 l6 offset-l4 mt-5">
                                <div class="col s6">
                                    <h6>Stage</h6>
                                    <h5 class="m-0">
                                        <a href="#">{{$member->stage}}</a>
                                    </h5>
                                </div>
                                <div class="col s6">
                                    <h6>Level</h6>
                                    <h5 class="m-0"><a
                                                href="#">{{$member->level}}</a>
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col l3 offset-l4 s12">
                                    <p class="m-0">Balance</p>
                                    <p class="m-0"><a href="#">Cash: {{$rewards == null ? '0': $rewards->cash}}</a> | <a
                                                href="#">Shopping</a> {{$rewards == null? '0' : $rewards->shopping}}</p>
                                </div>
                            </div>
                            <hr>

                        </div>
                        <!-- User Post Feed -->
                        <div class="row">
                            <div class="row">
                                <div class="card user-card-negative-margin z-depth-0" id="feed">
                                    <div class="card-content card-border-gray">
                                        <div class="row">
                                            <div class="col s12">
                                                <h5>{{$member->firstname .' '. $member->lastname}}</h5>
                                                <div class="rov">
                                                    <a href="{{route('admin_check_member_matrix', $member->username)}}" class="btn btn-primary">Matrix</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12">
                                                <ul class="tabs card-border-gray mt-4">
                                                    <li class="tab col m3 s6 p-0"><a class="active" href="#test1">
                                                            <i class="material-icons vertical-align-middle">crop_portrait</i>
                                                            Info
                                                        </a>
                                                    </li>
                                                    <li class="tab col m3 s6 p-0"><a class="active" href="#test2">
                                                            <i class="material-icons vertical-align-middle">bookmark_border</i>
                                                            Account
                                                        </a>
                                                    </li>
                                                    <li class="tab col m3 s6 p-0"><a href="#test3">
                                                            <i class="material-icons vertical-align-middle">date_range</i>
                                                            Events
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul class="tab-content tabs-content">
                                                    <li class="tab-pane active" id="test1">
                                                        <div id="Form-advance" class="card card card-default scrollspy">
                                                            <div class="card-content">
                                                                <div class="row">
                                                                    <div class="col m8 s8 l8">
                                                                        <h4 class="card-title"
                                                                            style="display: inline!important;">My
                                                                            Profile</h4>
                                                                    </div>
                                                                    <div class="col m4 s4 l4">
                                                                        <div class=""
                                                                             style="display: inline!important;">
                                                                            <button class="btn btn-raised pull-right edit_profile   btn-lg button-primary">
                                                                                Edit
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                @include('includes.flash')
                                                                <form class="col s12 disabled_form" method="post" action="{{route('update_user_profile', $member->username)}}">
                                                                    @csrf
                                                                    <div class="row">

                                                                        <div class="input-field col m6 s12">
                                                                            <input id="firstname" name="firstname"
                                                                                   value="{{$member->firstname}}"
                                                                                   type="text" class="{{ $errors->has('firstname') ? ' is-invalid' : '' }}">
                                                                            <label for="first_name">First Name</label>
                                                                            @if ($errors->has('firstname'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('firstname') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="input-field col m6 s12">
                                                                            <input id="lastname" class="{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname"
                                                                                   value="{{$member->lastname}}"
                                                                                   type="text">
                                                                            <label for="last_name">Last Name</label>
                                                                            @if ($errors->has('lastname'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('lastname') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="email" name="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                                                   value="{{$member->email}}"
                                                                                   type="email">
                                                                            <label for="email" class="active">Email
                                                                            </label>
                                                                            @if ($errors->has('email'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('email') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="username" disabled class="{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                                                   value="{{$member->username}}"
                                                                                   type="text">
                                                                            <label for="username" class="active">Username</label>
                                                                            @if ($errors->has('username'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('username') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="input-field col s6">
                                                                            <input id="password" disabled class="{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                                                   value="{{$member->getAuthPassword()}}"
                                                                                   type="password">
                                                                            <label for="password" class="active">Password</label>
                                                                        </div>
                                                                        <div class="input-field col s6">
                                                                            <h6><a href="{{route('change_password', $member->username)}}">Change Password</a></h6>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <select name="bank_id"  class="{{ $errors->has('bank_id') ? ' is-invalid' : '' }} browser-default" id="bank_id">
                                                                                <option>Select Bank</option>
                                                                                @foreach(\App\Bank::all() as $key => $bank)
                                                                                    <option {{$bank->id == $member->bank_id? 'selected':''}} value="{{$bank->id}}">{{$bank->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @if ($errors->has('bank_id'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('bank_id') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="input-field col s12">
                                                                            <input id="bankaccountname" class="{{ $errors->has('bankaccountname') ? ' is-invalid' : '' }}"
                                                                                   name="bankaccountname"
                                                                                   value="{{$member->bank_account_name}}"
                                                                                   type="text">
                                                                            <label for="bankaccountname" class="active">Bank
                                                                                Account Name</label>
                                                                            @if ($errors->has('bankaccountname'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('bankaccountname') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="bankaccountnumber"
                                                                                   name="bankaccountnumber" class="{{ $errors->has('bankaccountnumber') ? ' is-invalid' : '' }}"
                                                                                   value="{{$member->bank_account_number}}"
                                                                                   type="text">
                                                                            <label for="bankaccountnumber"
                                                                                   class="active">Bank Account
                                                                                Number</label>
                                                                            @if ($errors->has('bankaccountnumber'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('bankaccountnumber') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="phone_number" name="phone_number" class="{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                                                                   value="{{$member->phone_number}}"
                                                                                   type="text">
                                                                            <label for="phone_number" class="active">Phone
                                                                                Number</label>
                                                                            @if ($errors->has('phone_number'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('phone_number') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input id="address" name="address" class="{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                                                                   value="{{$member->address . " " . $member->address2}}"
                                                                                   type="text">
                                                                            <label for="address" class="active">Full
                                                                                Address</label>
                                                                            @if ($errors->has('address'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('address') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col s12 file-field input-field">
                                                                            <div class="file-path-wrapper">
                                                                                <button class="btn btn-lg update_button btn-block float-right">
                                                                                    Update
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="tab-pane " id="test2">
                                                        <div class="col s12 m12 l12">
                                                            <div id="Form-advance"
                                                                 class="card card card-default scrollspy">
                                                                <div class="card-content">
                                                                    <h4 class="card-title">Updating...</h4>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="tab-pane " id="test3">
                                                        <div class="col s12 m12 l12">
                                                            <div id="Form-advance"
                                                                 class="card card card-default scrollspy">
                                                                <div class="card-content">
                                                                    <h4 class="card-title">Updating...</h4>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <hr class="mt-5">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Today Highlight -->
                        {{--<div class="col s12 m12 l3 hide-on-med-and-down">--}}
                            {{--<div class="row mt-5">--}}
                                {{--<div class="col s12">--}}
                                    {{--<h6>Upcoming Events</h6>--}}
                                    {{--<img class="responsive-img card-border z-depth-2 mt-2"--}}
                                         {{--src="{{asset('backassets/images/gallery/post-3.png')}}"--}}
                                         {{--alt="">--}}
                                    {{--<p><a href="#">When Leaders Gather Meeting</a></p>--}}
                                    {{--<p>Our WLGM Meetings and other events are coming up here soon. <br>...Stay tuned.--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<hr class="mt-5">--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Page Main-->
@endsection
