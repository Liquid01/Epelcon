@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="">
            <div class="card card-info" style="padding:20px!important;">
                <div class="card-header">CHANGE MEMBER PACKAGE</div>
                <div class="card-body">
                    <div class="row">
                        @include('includes.back_flash')
                        @include('includes.errors')
                        <div class="col m6 s12 ">
                            <h6>Username: {{$user->username}}</h6>
                            <h6>Current Package: <strong>{{$user->package->name}}</strong></h6>
                            <hr>
                            <p>Change Package to:</p>
                            <form action="{{route('upgrade_package', $user->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="package">Package</label>
                                    <select name="new_package" id="new_package" class="browser-default form-control">
                                        @foreach($packages as $package)
                                            <option value="{{$package->id}}">{{$package->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group" style="margin-top: 20px">
                                    <input type="hidden" name="username" value="{{$user->username}}">
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
