@extends('layouts.members')
@section('page_title')
    My Profile
@endsection
@section('content')
    <!-- BEGIN: Page Main-->
    {{--<div id=    "main">--}}
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="content-wrapper-before black"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">My Profile</h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Account</a>
                            </li>
                            <li class="breadcrumb-item active">My Profile
                            </li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="col s12" style="padding:0px 0px;">
            <div class="container">
                <div class="row user-profile mt-1">
                    <img class="responsive-img" alt="" src="{{asset('backassets/images/gallery/chat-bg-small.jpg')}}">
                </div>
                <div class="section" id="user-profile">
                    <div class="row">
                        <!-- User Profile Feed -->
                        <div class="col s12 m4 l4 user-section-negative-margin">
                            <div class="row">
                                <div class="col s12 center-align">
                                    <span class="hidden"
                                          style="display:none;">{{$image = auth()->user()->image == null? 'avatar2.png':auth()->user()->image}}</span>
                                    {{--                                    {{app('current_user')->image == null? $image='avatar2.png':$image=app('current_user')->image}}--}}
                                    <img class="responsive-img circle z-depth-5 hide-on-small-only profile_img"
                                         style="max-width: 140px; margin-top:102px;"
                                         src="{{asset('public/upload/profile/thumb/'.urlencode($image))}}"
                                         alt="Profile Pix">

                                    <a class="btn-floating mb-1 btn-small waves-effect waves-light   hide-on-small-only edit_profile_pix"
                                       href="javascript:void(0);" data-target="dropdown2">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <br>
                                    <img class="responsive-img circle z-depth-5 hide-on-large-only hide-on-med-only profile_img"
                                         style="max-width: 80px; margin-top:100px;"
                                         src="{{asset('public/upload/profile/thumb/'.$image)}}" alt="Profile Pix">

                                    <div class="profile-demo" style="display: none;"></div>

                                    <a class="btn-floating mb-1 btn-small waves-effect waves-light  hide-on-large-only hide-on-med-only edit_profile_pix"
                                       href="javascript:void(0);" data-target="dropdown2">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <br>
                                    @csrf
                                    <input style="color:black!important" type="file" id="profile_pix_input"
                                           name="profile_pix"
                                           style="visibility: hidden;">
                                    <button class="btn btn-success" style="display:none;" id="upload_profile_pix">
                                        Upload
                                    </button>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col s4">
                                    <h6>Refferals</h6>
                                    <h5 class="m-0">
                                        <a href="#">{{\App\User::where('sponsor', auth()->user()->username)->count()}}</a>
                                    </h5>
                                </div>
                                <div class="col s4">
                                    <h6>Downlines</h6>
                                    <h5 class="m-0">
                                        <a href="#" id="downline_count">0</a>
                                    </h5>
                                </div>
                                <div class="col s4">
                                    <h6>RANK</h6>
                                    <h5 class="m-0"><a href="#">{{auth()->user()->stage}}</a>
                                    </h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col s12">
                                    <p class="m-0">Balance</p>
                                    <p class="m-0">
                                        <a href="#">Cash:
                                            &#x20a6;{{number_format($rewards == null ? '0': $rewards->cash, 2)}}</a> |
                                        {{--                                        <a href="#">Shop: &#x20a6;{{$rewards == null? '0' : $rewards->shopping*400}}</a> |--}}
                                        <a href="#">Left PVs: {{$rewards == null? '0' : $rewards->left_pvs}}</a> |
                                        <a href="#">Right PVs: {{$rewards == null? '0' : $rewards->right_pvs}}</a>
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <!-- User Post Feed -->
                        <div class="col s12 m8 l8">
                            <div class="row">
                                <div class="card user-card-negative-margin z-depth-0" id="feed">
                                    <div class="card-content card-border-gray" style="padding:10px;">
                                        <div class="row">
                                            <div class="col s12">
                                                <h5>{{auth()->user()->firstname .' '. auth()->user()->lastname}}</h5>
                                                <p>Rating:&nbsp;
                                                    <span class="amber-text">
                                                    <strong></strong>
                                                        <span class="material-icons star-width vertical-align-middle">star_full</span>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col s12">
                                                <ul class="tabs card-border-gray mt-4">
                                                    <li class="tab col m3 s6 p-0"><a class="active" href="#info">
                                                            <i class="material-icons vertical-align-middle">crop_portrait</i>
                                                            Info
                                                        </a>
                                                    </li>
                                                    <li class="tab col m3 s6 p-0"><a class="active" href="#account">
                                                            <i class="material-icons vertical-align-middle">bookmark_border</i>
                                                            Account
                                                        </a>
                                                    </li>
                                                    <li class="tab col m3 s6 p-0"><a href="#security">
                                                            <i class="material-icons vertical-align-middle">date_range</i>
                                                            Security
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul class="tab-content tabs-content">

                                                    {{-- INFO TAB --}}
                                                    <li class="tab-pane active" id="info">
                                                        <div id="Form-advance" class="card card card-default scrollspy">
                                                            <div class="card-content" style="padding:10px;">
                                                                <div class="row">
                                                                    <div class="col m8 s8 l8">
                                                                        <h4 class="card-title"
                                                                            style="display: inline!important;">My
                                                                            Profile</h4>
                                                                    </div>
                                                                    <div class="col m4 s4 l4">
                                                                        <div class=""
                                                                             style="display: inline!important;">
                                                                            {{--                                                                            <button class="btn btn-raised pull-right edit_profile   btn-lg button-primary">--}}
                                                                            {{--                                                                                Edit--}}
                                                                            {{--                                                                            </button>--}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                @include('includes.flash')
                                                                <form class="col s12 profile_update_form" method="post"
                                                                      action="{{route('update_profile', auth()->user()->username)}}">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="input-field col m6 s12">
                                                                            <input style="color:black!important"
                                                                                   id="firstname" name="firstname"
                                                                                   value="{{auth()->user()->firstname}}"
                                                                                   type="text"
                                                                                   required
                                                                                   class="{{ $errors->has('firstname') ? ' is-invalid' : '' }}">
                                                                            <label for="first_name">First Name</label>
                                                                            @if ($errors->has('firstname'))
                                                                                <span class="invalid-feedback red-text text-danger"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('firstname') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="input-field col m6 s12">
                                                                            <input style="color:black!important"
                                                                                   id="lastname"
                                                                                   class="{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                                                                   name="lastname"
                                                                                   required
                                                                                   value="{{auth()->user()->lastname}}"
                                                                                   type="text">
                                                                            <label for="last_name">Last Name</label>
                                                                            @if ($errors->has('lastname'))
                                                                                <span class="invalid-feedback red-text"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('lastname') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input style="color:black!important"
                                                                                   id="email" name="email"
                                                                                   class="{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                                                   value="{{auth()->user()->email}}"
                                                                                   type="email">
                                                                            <label for="email" class="active">Email
                                                                            </label>
                                                                            @if ($errors->has('email'))
                                                                                <span class="invalid-feedback red-text"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('email') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="input-field col s12">

                                                                            <label for="username" class="active">Username</label>
                                                                            <p style="color:black!important"
                                                                               class="input-field col s12 pt-1">{{auth()->user()->username}}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input style="color:black!important"
                                                                                   id="phone_number" name="phone_number"
                                                                                   class="{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                                                                   value="{{auth()->user()->phone_number}}"
                                                                                   required
                                                                                   type="text">
                                                                            <label for="phone_number" class="active">Phone
                                                                                Number</label>
                                                                            @if ($errors->has('phone_number'))
                                                                                <span class="invalid-feedback red-text"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('phone_number') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col s12 file-field input-field">
                                                                            <div class="file-path-wrapper">
                                                                                {{--                                                                                <button class="btn btn-lg profile_update_button btn-block float-right"--}}
                                                                                {{--                                                                                style="display: none">--}}
                                                                                {{--                                                                                    Update--}}
                                                                                {{--                                                                                </button>--}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>

                                                                <form action="{{route('update_profile_others')}}"
                                                                      method="post">
                                                                    @csrf
                                                                    <div class="card-title black-text">
                                                                        Address
                                                                        @if($user->profile->status == 0)
                                                                            <a href=""
                                                                               style="margin-left: 50px;">Edit</a>
                                                                        @endif
                                                                    </div>
                                                                    <hr>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input style="color:black!important"
                                                                                   id="address" name="address"
                                                                                   class="{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                                                                   value="{{$user->profile->address}}"
                                                                                   required
                                                                                   placeholder="unit number, house nuber, and street name"
                                                                                   type="text">
                                                                            <label for="address" class="active">
                                                                                House Number and Street</label>
                                                                            @if ($errors->has('address'))
                                                                                <span class="invalid-feedback red-text"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('address') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>


                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input style="color:black!important"
                                                                                   id="address2" name="address2"
                                                                                   class="{{ $errors->has('address2') ? ' is-invalid' : '' }}"
                                                                                   value="{{$user->profile->address2}}"
                                                                                   required
                                                                                   placeholder="Area, nearest bustop (or Landmark)"
                                                                                   type="text">
                                                                            <label for="address2" class="active">
                                                                                Area, Nearest Bustop</label>
                                                                            @if ($errors->has('address2'))
                                                                                <span class="invalid-feedback red-text"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('address2') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">

                                                                            <input style="color:black!important"
                                                                                   id="country" name="country" readonly
                                                                                   type="text" value="Nigeria"
                                                                                   class="{{ $errors->has('country') ? ' is-invalid' : '' }}">

                                                                            <label for="city">Country</label>

                                                                            @if ($errors->has('country'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert"><strong>{{ $errors->first('country') }} </strong></span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <select name="state" required
                                                                                    class="{{ $errors->has('state') ? ' is-invalid' : '' }} browser-default"
                                                                                    id="state">
                                                                                <option>State</option>
                                                                                @foreach($states as $key => $state)
                                                                                    <option value="{{$state}}" {{$state == $user->profile->state? 'selected':''}}>{{$state}}</option>
                                                                                @endforeach
                                                                            </select>


                                                                            @if ($errors->has('state'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('state') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>

                                                                    </div>


                                                                    <div class="row">
                                                                        <div class="input-field col s12">

                                                                            <input style="color:black!important"
                                                                                   id="city" name="city" type="text"
                                                                                   value="{{old('city', $user->profile->city)}}"
                                                                                   class="{{ $errors->has('city') ? ' is-invalid' : '' }}">

                                                                            <label for="city">City</label>

                                                                            @if ($errors->has('city'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert"><strong>{{ $errors->first('city') }} </strong></span>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input style="color:black!important"
                                                                                   id="dob" name="dob"
                                                                                   class="{{ $errors->has('dob') ? ' is-invalid' : '' }}"
                                                                                   value="{{old('dob', $user->profile->dob)}}"
                                                                                   required
                                                                                   placeholder="Date Of Birth"
                                                                                   type="date">
                                                                            <label for="dob" class="label">
                                                                                Date Of Birth</label>
                                                                            @if ($errors->has('dob'))
                                                                                <span class="invalid-feedback red-text"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('dob') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input style="color:black!important"
                                                                                   id="nok" name="nok"
                                                                                   class="{{ $errors->has('nok') ? ' is-invalid' : '' }}"
                                                                                   value="{{old('nok', $user->profile->nok)}}"
                                                                                   placeholder="Next Of Kin Full Name"
                                                                                   type="text">
                                                                            <label for="nok" class="label">
                                                                                Next Of Kin</label>
                                                                            @if ($errors->has('nok'))
                                                                                <span class="invalid-feedback red-text"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('nok') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input style="color:black!important"
                                                                                   id="nok_phone" name="nok_phone"
                                                                                   class="{{ $errors->has('nok_phone') ? ' is-invalid' : '' }}"
                                                                                   value="{{old('nok_phone', $user->profile->nok_phone)}}"
                                                                                   placeholder="Next Of Kin Full Name"
                                                                                   type="text">
                                                                            <label for="nok_phone" class="label">
                                                                                NOK Phone</label>
                                                                            @if ($errors->has('nok_phone'))
                                                                                <span class="invalid-feedback red-text"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('nok_phone') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <select name="id_type" class="browser-default" id="id_type" >
                                                                                <option {{$profile->id_type == 'NIN'?'selected':''}} value="NIN">NIN</option>
                                                                                <option {{$profile->id_type == 'DRIVERS_LICENCE'?'selected':''}} value="DRIVERS_LICENCE">Drivers' License</option>
                                                                                <option {{$profile->id_type == 'PVC'?'selected':''}} value="PVC">PVC</option>
                                                                                <option {{$profile->id_type == 'NATIONAL_PASSPORT'?'selected':''}} value="NATIONAL_PASSPORT">National Passport</option>
                                                                                <option {{$profile->id_type == 'INTERNATIONAL'?'selected':''}} value="INTERNATIONAL">International Passport</option>
                                                                                <option {{$profile->id_type == 'OTHERS'?'selected':''}} value="OTHERS">Others</option>
                                                                            </select>

                                                                            @if ($errors->has('id_type'))
                                                                                <span class="invalid-feedback red-text"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('id_type') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input style="color:black!important"
                                                                                   id="id_number" name="id_number"
                                                                                   class="{{ $errors->has('id_number') ? ' is-invalid' : '' }}"
                                                                                   value="{{old('id_number', $user->profile->id_number)}}"
                                                                                   placeholder="ID Number"
                                                                                   type="text">
                                                                            <label for="id_number" class="label">
                                                                                ID Number</label>
                                                                            @if ($errors->has('id_number'))
                                                                                <span class="invalid-feedback red-text"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('id_number') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    @if($user->profile->status == 0)

                                                                        <div class="form-group">
                                                                            <button class="btn">Update</button>
                                                                        </div>
                                                                    @endif

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    {{-- ACCOUNT TAB--}}
                                                    <li class="tab-pane active" id="account">
                                                        <div id="Form-advance" class="card card card-default scrollspy">
                                                            <div class="card-content" style="padding:10px;">
                                                                <div class="row">
                                                                    <div class="col m8 s8 l8">
                                                                        <h4 class="card-title"
                                                                            style="display: inline!important;">
                                                                            Account</h4>
                                                                    </div>
                                                                    <div class="col m4 s4 l4">
                                                                        <div class=""
                                                                             style="display: inline!important;">

                                                                            @if(app('current_user')->bank_edited == 0)
                                                                                <button class="btn btn-raised pull-right edit_account   btn-lg button-primary">
                                                                                    Edit
                                                                                </button>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                @include('includes.flash')
                                                                <form class="col s12 account_update_form" method="post"
                                                                      action="{{route('member_update_bank', auth()->user()->username)}}">
                                                                    @csrf
                                                                    <div class="row">

                                                                        <div class="input-field col s12">
                                                                            <select name="bank_id"
                                                                                    required
                                                                                    class="browser-default {{ $errors->has('bank_id') ? ' is-invalid' : '' }}"
                                                                                    id="bank_id">
                                                                                <option>Select Bank</option>
                                                                                @foreach(\App\Bank::all() as $key => $bank)
                                                                                    <option {{$bank->id == auth()->user()->bank_id? 'selected':''}} value="{{$bank->id}}">{{$bank->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            {{--<label>Account Name</label>--}}
                                                                            @if ($errors->has('bank_id'))
                                                                                <span class="invalid-feedback red-text"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('bank_id') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    {{--                                                                    <div class="row">--}}
                                                                    {{--                                                                        <div class="input-field col s12">--}}
                                                                    {{--                                                                            <input style="color:black!important"  id="bankaccountname"--}}
                                                                    {{--                                                                                   class="{{ $errors->has('bankaccountname') ? ' is-invalid' : '' }}"--}}
                                                                    {{--                                                                                   name="bankaccountname"--}}
                                                                    {{--                                                                                   value="{{auth()->user()->bank_account_name}}"--}}
                                                                    {{--                                                                                   required--}}
                                                                    {{--                                                                                   type="text">--}}
                                                                    {{--                                                                            <label for="bankaccountname" class="active">Bank--}}
                                                                    {{--                                                                                Account Name</label>--}}
                                                                    {{--                                                                            @if ($errors->has('bankaccountname'))--}}
                                                                    {{--                                                                                <span class="invalid-feedback red-text"--}}
                                                                    {{--                                                                                      role="alert">--}}
                                                                    {{--                                                                                    <strong>{{ $errors->first('bankaccountname') }} </strong>--}}
                                                                    {{--                                                                                </span>--}}
                                                                    {{--                                                                            @endif--}}
                                                                    {{--                                                                        </div>--}}
                                                                    {{--                                                                    </div>--}}
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <input style="color:black!important"
                                                                                   id="bankaccountnumber"
                                                                                   name="bankaccountnumber"
                                                                                   class="{{ $errors->has('bankaccountnumber') ? ' is-invalid' : '' }}"
                                                                                   value="{{auth()->user()->bank_account_number}}"
                                                                                   required
                                                                                   type="text">
                                                                            <label for="bankaccountnumber"
                                                                                   class="active">Bank Account
                                                                                Number</label>
                                                                            @if ($errors->has('bankaccountnumber'))
                                                                                <span class="invalid-feedback red-text"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('bankaccountnumber') }} </strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col s12 file-field input-field">
                                                                            <div class="file-path-wrapper">
                                                                                <button class="btn btn-lg account_update_button btn-block float-right">
                                                                                    Update
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    {{--  SECURITY TAB--}}
                                                    <li class="tab-pane active" id="security">
                                                        <div id="Form-advance" class="card card card-default scrollspy">
                                                            <div class="card-content" style="padding:10px;">
                                                                <div class="row">
                                                                    <div class="col m8 s8 l8">
                                                                        <h4 class="card-title"
                                                                            style="display: inline!important;">
                                                                            Account</h4>
                                                                    </div>
                                                                    <div class="col m4 s4 l4">
                                                                        <div class=""
                                                                             style="display: inline!important;">
                                                                            {{--                                                                            <button class="btn btn-raised pull-right edit_security   btn-lg button-primary">--}}
                                                                            {{--                                                                                Edit--}}
                                                                            {{--                                                                            </button>--}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                @include('includes.flash')
                                                                <form class="col s12 security_update_form" method="post"
                                                                      action="{{route('member_update_password', auth()->user()->username)}}">
                                                                    @csrf


                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <a href="{{route('member_change_password', auth()->user()->username)}}"
                                                                               class="btn btn-primary right-aligned">Change
                                                                                password</a>
                                                                        </div>
                                                                    </div>


                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <a href="{{route('member_change_password', auth()->user()->username)}}"
                                                                               class="btn btn-primary right-aligned">Change
                                                                                PIN</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col s12 file-field input-field">
                                                                            <div class="file-path-wrapper">
                                                                                {{--                                                                                <button class="btn btn-lg security_update_button btn-block float-right">--}}
                                                                                {{--                                                                                    Update--}}
                                                                                {{--                                                                                </button>--}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        {{--<hr class="mt-5">--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Page Main-->
@endsection


