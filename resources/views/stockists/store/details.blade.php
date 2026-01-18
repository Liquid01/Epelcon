@extends('layouts.back_seller')

@section('page_title')

    My Store

@endsection

@section('content')

    <div class="row">

        <div class="content-wrapper-before black"></div>

        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">

            <!-- Search for small screen-->

            <div class="container">

                <div class="row">

                    <div class="col s10 m6 l6">

                        <h3 class="breadcrumbs-title mt-0 mb-0">Store</h3>

                        <ol class="breadcrumbs mb-0">

                            <li class="breadcrumb-item"><a href="{{route('stockist_dashboard')}}">Dashboard</a>

                            </li>

                            <li class="breadcrumb-item active">My Store

                            </li>

                        </ol>

                    </div>

                </div>

            </div>

        </div>

        <div class="col s12">

            <div class="container">

                <div class="section section-data-tables">

                    <div class="card center-align">


                        @include('includes.flash')

                    </div>


                    <!-- DataTables Row grouping -->


                    <!-- Multi Select -->


                    <div class="row">

                        <div class="col s12">

                            <div class="card">

                                <div class="card-content">

{{--                                    <h4 class="card-title">{{$store->name}}</h4>--}}

                                    <div class="row">

                                        <div class="col s12">

                                            <div class="row">
                                                <div class="col l8 m8 s12">
                                                    <h6>Store Name: {{$store->name}}</h6>

                                                    <p>
                                                        Address: {{$store->address1. ' '.$store->address2}}, <br>
                                                        {{$store->city.' '.$store->state.' ,'.$store->country}}
                                                    </p>
                                                    <p>Phone: {{$store->phone}}</p>
                                                    <div class="">
                                                        <a href="{{route('stockist_edit_store', $store->id)}}">Edit</a>
                                                    </div>
                                                </div>
                                                <div class="col s12 m4 l4">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <h6>Product Stock Status</h6>
{{--                                                            <div>--}}
{{--                                                                <label for="stock_in">STOCK IN</label>--}}
{{--                                                                <a class="navbar-toggler waves-effect waves-light"  href="#">--}}
{{--                                                                    <i class="material-icons" style="color:green!important;">radio_button_checked</i>--}}
{{--                                                                </a>--}}

{{--                                                            </div>--}}
                                                            <div>

                                                                <label for="stock_in">STOCK OUT</label>
                                                                <a class="navbar-toggler waves-effect waves-light"  href="#">
                                                                    <i class="material-icons" style="color:red!important;">radio_button_checked</i>
                                                                </a>

                                                                <p>
                                                                    <a href="{{route('stockist_add_stock')}}">Add Stock</a>
                                                                </p>
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

                </div>

            </div>

        </div>

    </div>
@endsection