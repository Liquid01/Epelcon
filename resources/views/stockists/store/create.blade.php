@extends('layouts.back_seller')
@section('content')

    <div class="content-wrapper-before black"></div>

    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">

        <!-- Search for small screen-->
        <div class="container">

            <div class="row">

                <div class="col s10 m6 l6">

                    <h5 class="breadcrumbs-title mt-0 mb-0">Create Store</h5>

                    <ol class="breadcrumbs mb-0">

                        <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a>

                        </li>

                        <li class="breadcrumb-item"><a href="#!">Stores</a>

                        </li>

                        <li class="breadcrumb-item active">create

                        </li>

                    </ol>

                </div>

            </div>

            <div class="card">

                <div class="card-content">

                    <a href="{{route('stockist_shop_view', app('current_user')->username)}}"

                       class="  waves-effect waves-light btn btn-small gradient-45deg-orange z-depth-4">

                        View Shop
                    </a>

                </div>
                @include('includes.errors')
                @include('includes.flash')
            </div>

        </div>

    </div>


    <div class="container card">

        <div class="col s12 m8 l8 offset-l2 ">

            <div id="" class=" ">

                <div class="card-content">

                    <div class="row">

                        <div class="col m8 s8 l8">

                            <h4 class="card-title"

                                style="display: inline!important;">

                                Store Details</h4>

                        </div>

                    </div>

                    <hr>

                    <form class="col s12" method="post" action="{{route('save_store')}}" enctype="multipart/form-data">

                        @csrf


                        <div class="row">
                            <div class="input-field col s12">

                                <input id="name" name="name" required type="text" value="{{old('name')}}" class="{{ $errors->has('name') ? ' is-invalid' : '' }}">

                                <label for="name">Store Name</label>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }} </strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">

                                <input id="address1" name="address1" required type="text" value="{{old('address1')}}" class="{{ $errors->has('address1') ? ' is-invalid' : '' }}">

                                <label for="address1">Shop Number and Street Name</label>

                                @if ($errors->has('address1'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }} </strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">

                                <input id="address2" name="address2"  type="text" value="{{old('address2')}}" class="{{ $errors->has('address2') ? ' is-invalid' : '' }}">

                                <label for="address1">Area</label>

                                @if ($errors->has('address2'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('address2') }} </strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">

                                <input id="city" name="city"  type="text" value="{{old('city')}}" class="{{ $errors->has('city') ? ' is-invalid' : '' }}">

                                <label for="city">City</label>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('city') }} </strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">

                                <input id="country" name="country" readonly  type="text" value="Nigeria" class="{{ $errors->has('country') ? ' is-invalid' : '' }}">

                                <label for="city">Country</label>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('country') }} </strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input col s12">
                                <select name="state" required
                                        class="{{ $errors->has('state') ? ' is-invalid' : '' }} browser-default"
                                        id="state">
                                    <option>State</option>
                                    @foreach($states as $key => $state)
                                        <option value="{{$state}}">{{$state}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('state'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('state') }} </strong>
                                        </span>
                                @endif

                            </div>

                        </div>

                        <div class="row">

                            <div class="input-field col s12">

                                <input id="phone" name="phone" required type="text" value="{{old('phone')}}" class="{{ $errors->has('phone') ? ' is-invalid' : '' }}">

                                <label for="phone">Shop Phone</label>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('phone') }} </strong></span>
                                @endif

                            </div>

                        </div>

                        <div class="row">

                            <div class="input-field col s12">

                                <input id="phone2" name="phone2" required type="text" value="{{old('phone2')}}" class="{{ $errors->has('phone2') ? ' is-invalid' : '' }}">

                                <label for="phone2">Mobile Phone</label>

                                @if ($errors->has('phone2'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('phone2') }} </strong></span>
                                @endif

                            </div>

                        </div>

                        <div class="row">

                            <div class="col s12 file-field input-field">

                                <div class="btn float-left">

                                    <span>Shop Photo</span>

                                    <input id="image" name="image" class="file-path validate {{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{old('image')}}" type="file">

                                </div>

                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('image') }} </strong></span>
                                @endif
                            </div>


                        </div>

                        <div class="row">

                            <div class="col s12 file-field input-field">

                                <div class="file-path-wrapper">

                                    <button class="btn success-btn btn-lg save_product btn-block float-right">

                                        Create

                                    </button>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>




@endsection
