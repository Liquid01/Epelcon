@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="card card-info">
            <div class="card-header">Change Member Package</div>
            <div class="card-body">
                <h3>{{$user->username}}</h3>
                <P>CURRENT PACKAGE: <strong>{{$user->package}}</strong></P>
                <hr>

                Change Package to:
                <form action="{{route('upgrade_package')}}">
                    <label for="package">Package</label>
                    <select name="new_package" id="new_package" class="browser-default form-control">
                        @foreach($packages as $package)
                            <option value="{{$package->id}}">{{$package->name}}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
    </div>
@endsection
