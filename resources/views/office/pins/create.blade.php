@extends('layouts.support')

@section('content')
    <div class="col s12">
        <div class="container">
            <div class="seaction">

                <div class="card">
                    <div class="card-content">
                        <p class="caption mb-0">GENERATE PINs</p>
                        @include('includes.flash')
                        <hr>
                        <a href="{{route('my_pins')}}" class="btn btn-raised btn-success ">My Pins</a>
                        <a href="{{route('my_office')}}" class="btn btn-raised btn-success ">Office</a>
                        <div class="mt-3">
                            <center>
                                <div class="row">
                                    <div class="col s12 m6 s6 offset-m3 align-content-center center-align center-block">
                                        <div id="basic-form" class="card card card-default scrollspy">
                                            <div class="card-content">
                                                <h4 class="card-title">PIN Creation</h4>
                                                <form class="col s12" method="POST" action="{{route('save_my_pins')}}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input type="hidden" value="{{app('current_user')->username.time()}}" name="batch"  required id="batch">
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
    </div>

@endsection