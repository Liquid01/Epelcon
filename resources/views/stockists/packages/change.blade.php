@extends('layouts.back_seller')


@section('content')
    <div class="container">
        <div class="">
            <div class="card card-info" style="padding:20px!important;">
                <div class="card-header">CHANGE MEMBER PACKAGE</div>
                <hr>
                <div class="card-content">
                    <div class="row">
                        @include('includes.back_flash')
                        @include('includes.errors')
                        <div class="col m6 s12 ">
                            <form action="{{route('stockist_member_upgrade')}}" method="post">
                                @csrf
                                <div class="row">

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" value="{{old('username')}}" id="username" class="form-control">
                                        <small>The username of the person to be upgraded</small>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:20px!important;">
                                    <div class="form-group">
                                        <label for="new_package">Package</label>
                                        <select name="new_package" id="new_package"
                                                class="browser-default form-control">
                                            @foreach($packages as $package)
                                                <option value="{{$package->id}}">{{$package->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group" style="margin-top: 20px">
                                    <button class="btn btn-default">Upgrade</button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
