@extends('layouts.register')

@section('page_title')
    Login
@endsection
@section('content')
    <div class="ms-hero-page-override ms-hero ms-hero-bg-white text-center d-inline" style="margin-top: 0px;">
        <img src="{{asset('assets/images/logo-2.png')}}" alt=""
             style="margin-top:0px; margin-left:auto; margin-right:auto; max-width:100px">
    </div>


    <div class="clearfix"></div>
    <div class="login1" style="">
        <div class="container">
            <div class="row justify-content-center white">
                <div class="col-md-6 col-md-offset-3">
                    <div class=" card-hero card-primary animated fadeInUp animation-delay-7"
                         style="border:0!important; box-shadow:none!important;">
                        <div class="card-block">
                            <a href="{{back()}}" ><i class="fa fa-long-arrow-left"></i></a>

                            <h1 class="color-primary text-center">Login</h1>
                            @if(count($errors) > 0)
                                <span class="text-danger">Oops! got some errors.</span>

                                @foreach($errors->all() as $message)
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                @endforeach
                            @endif
                            <form class="form-horizontal" method="post" action="{{route('login')}}"
                                  style="border: none!important; width:100%!important;">
                                @csrf
                                <fieldset>
                                    <div class="form-group">
                                        {{--<label for="username" class="col-md-2 control-label "><i class="fa fa-sign-in form_label_icon" style="font-size: 17px!important;"></i></label>--}}
                                        <div class="col-md-10">
                                            <input type="text" name="username"
                                                   class="form-control {{$errors->has('username')? 'is-invalid': ''}}"
                                                   id="username" value="{{old('username')}}" placeholder="Username">
                                            @if($errors->has('username'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>
                                            {{$errors->first('username')}}
                                        </strong>
                                        </span>
                                            @endif
                                        </div>
                                        <span class="material-input"></span></div>
                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <div class="input-group">
                                                <input type="password" name="password"
                                                       class="form-control type_toggle {{$errors->has('password')? 'is-invalid': ''}}"
                                                       id="password"
                                                       placeholder="Password">
                                                <span class="input-group-addon" style="pointer;">
                                                    <i class="fa fa-eye show_pass"></i>
                                                </span>
                                            </div>

                                            @if($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>
                                                    {{$errors->first('password')}}
                                                </strong>
                                            </span>
                                            @endif
                                        </div>
                                        <span class="material-input"></span>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                       id="remember" value="{{ old('remember') ? 'checked' : '' }}">

                                                <label class="form-check-label" for="remember"
                                                       style="display: inline!important;">
                                                    {{ __('Remember Me') }}
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <button class="btn btn-raised btn-warning">Login
                                    <i class="fa fa-sign-in no-mr ml-1"></i>
                                </button>
                                <hr>
                                <span><strong>Have no account?</strong></span>
                                <a class=" btn-link btn-royal btn-raised" href="{{ route('register') }}">
                                    {{ __('Register?') }}
                                </a>
                            </form>
                            <div class="text-center mt-4">
                                <h3>Login with</h3>
                                <a href="javascript:void(0)" class="btn-circle btn-facebook">
                                    <i class="zmdi zmdi-facebook"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn-circle btn-twitter">
                                    <i class="zmdi zmdi-twitter"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn-circle btn-google">
                                    <i class="zmdi zmdi-google"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

