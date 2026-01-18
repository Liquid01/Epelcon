@extends('layouts.members')



@section('page_title')

    Airtime Top-up

@endsection



@section('content')

    <div class="row">

        <div class="content-wrapper-before black"></div>

        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">

            <!-- Search for small screen-->

            <div class="container">

                <div class="row">

                    <div class="col s10 m6 l6">

                        <h5 class="breadcrumbs-title mt-0 mb-0">Subscriptions</h5>

                        <ol class="breadcrumbs mb-0">

                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>

                            </li>

                            <li class="breadcrumb-item"><a href="{{route('member_subscriptions')}}">Subscriptions</a>

                            </li>

                            <li class="breadcrumb-item active">Airtime

                            </li>

                        </ol>

                    </div>

                </div>

            </div>

        </div>

        <div class="col s12">

            <div class="container">

                <div class="col m8 offset-m2 l8 offset-l2 s12" id="card-reveal-section">

                    <div class="card" style="overflow: hidden;">

                        <div class="card-content">

                            @include('includes.back_flash')



                            <span class="card-title activator grey-text text-darken-4 mt-2">

                                Airtime Top-Up

                            </span>



                            <form action="{{route('airtime_top_up_info')}}" method="post">

                                @csrf

                                <div class="input-field mb-10">

                                    <div class="row">

                                        <div class="input-field col s12">

                                            {{--<i class="prefix red-text" style="font-size:20px;">234</i>--}}

                                            <input id="msisdn" name="msisdn" required

                                                   type="number"

                                                   placeholder="2348076543210"

                                                   class="{{ $errors->has('msisdn') ? ' is-invalid' : '' }}">

                                            <label for="msisdn">Phone Number</label>

                                            @if ($errors->has('msisdn'))

                                                <span class="invalid-feedback red-text" role="alert">

                                                    <strong>{{ $errors->first('msisdn') }} </strong>

                                                </span>

                                            @endif

                                            <small>E.G. 2348098765432 or 2347087654321</small>

                                        </div>

                                    </div>

                                </div>

                                <button class="btn btn-success airtime_next" id="topup_next" style="float:right; margin-top:-30px;">Next</button>

                            </form>

                        </div>

                    </div>





                </div>

            </div>

        </div>

    </div>

@endsection
