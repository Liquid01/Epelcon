@extends('layouts.back_seller')

@section('content')
    <div class="content-wrapper-before black"></div>

    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">

        <!-- Search for small screen-->

        <div class="container">

            <div class="row">

                <div class="col s10 m6 l6">

                    <h5 class="breadcrumbs-title mt-0 mb-0">Create Pin</h5>

                    <ol class="breadcrumbs mb-0">

                        <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a>

                        </li>

                        <li class="breadcrumb-item"><a href="#!">Pins</a>

                        </li>

                        <li class="breadcrumb-item active">create

                        </li>

                    </ol>

                </div>

            </div>

            <div class="card">

                <div class="card-content">
                    <a href="{{route('my_pins')}}" class="  waves-effect waves-light btn btn-small gradient-45deg-orange z-depth-4">
                        All Pins
                    </a>

                </div>

            </div>

        </div>

    </div>
    <div class="col s12">
            <div class="section">

                <div class="card">
                    <div class="card-content">
                        <p class="caption mb-0">Stockists: New Pin</p>
                        @include('includes.flash')
                        <hr>
                        <div class="mt-3">
                            <center>
                                <div class="row">
                                    <div class="col s12 m6 s6 offset-m3 align-content-center center-align center-block">
                                        <div id="basic-form" class="scrollspy">
                                            <div class="">
                                                <h4 class="card-title">PIN Creation</h4>
                                                <form class="col s12" method="POST" action="{{route('save_my_pins')}}">
                                                    @csrf
                                                    <div class="row form-group">
                                                        <div class="input-field col s12">
                                                            <select name="package_id" required class="form-control browser-default" id="package_id">
                                                                <option>Select Package</option>
                                                                @foreach($packages as $package)
                                                                    <option value="{{$package->id}}">{{$package->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            {{--                                                <label for="package">Package</label>--}}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input type="hidden" value="{{app('current_user')->username.time()}}" name="batch"  required id="batch">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input type="text" name="for"  required id="for">
                                                            <label for="for">For</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input type="number" name="quantity"  required min="1" id="quantity">
                                                            <label for="fn">Quantity</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                                                                    <i class="material-icons right">send</i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>

                        </div>
                    </div>

                </div>

                <!--Basic Form-->


                <!-- jQuery Plugin Initialization -->

            </div><!-- START RIGHT SIDEBAR NAV -->
    </div>

@endsection
