@extends('layouts.admin')

@section('content')
    <div class="col s12">
        <div class="container">
            <div class="seaction">

                <div class="card">
                    <div class="card-content">
                        <p class="caption mb-0">GENERATE PINs</p>
                        @include('includes.flash')
                        <hr>
                        <a href="{{route('pinManagement')}}" class="btn btn-raised btn-success ">All Pins</a>
                    </div>

                </div>

                <!--Basic Form-->


                <!-- jQuery Plugin Initialization -->
                <div class="text-center">
                    <div class="row">
                        <div class="col s12 m4 s4 offset-m4 align-content-center center-align center-block">
                            <div id="basic-form" class="card card card-default scrollspy">
                                <div class="card-content">
                                    <h4 class="card-title">PIN Creation</h4>
                                    <form class="col s12" method="POST" action="{{route('postGeneratePin')}}">
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
                </div>

            </div><!-- START RIGHT SIDEBAR NAV -->

        </div>
    </div>

@endsection
