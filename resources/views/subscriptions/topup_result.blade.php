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





                            <span class="card-title activator grey-text text-darken-4 mt-2">

                               Topup Status

                            </span>

                            @include('includes.back_flash')

                            <div>

                                @csrf

                                @isset($subscription)

                                    <div class="input-field mb-10">

                                        <div class="row">

                                            <div class="input-field col s12">

                                                <p><strong>Country:</strong> {{$subscription->country}}</p>

                                                <p><strong>Operator:</strong> {{$subscription->operator_name}}</p>

                                                <p><strong>MSISDN:</strong> {{$subscription->msisdn}}</p>

                                                <p><strong>Status:</strong> {{$subscription->code}}</p>

                                                <p><strong>Customer Reference:</strong> {{$subscription->customer_reference}}</p>

                                                <p><strong>Server Reference:</strong> {{$subscription->message}}</p>

                                            </div>

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

@endsection
