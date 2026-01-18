@extends('layouts.support')

@section('content')
    <div class="row">

        <div class="col s12">
            <div class="container">
                <span class="user-details">
                   <strong>Welcome {{auth()->user()->firstname ." | ". auth()->user()->lastname}}</strong>
                </span>
                <!--card stats start-->

                <div id="card-stats">
                    <div class="row">
                        <div class="col s12 m6 l6 xl3">
                            <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                                <div class="padding-4">
                                    <div class="col s6 m6">
                                        <i class="material-icons background-round mt-5">all_inclusive</i>
                                        <p><div class="btn btn-primary"><a href="{{route('products')}}">More</a></div></p>
                                    </div>
                                    <div class="col s5 m6 right-align">
                                        <h5 class="mb-0 white-text">{{\App\Product::all()->count()}}</h5>
                                        <p class="no-margin">Products</p>
                                        <p>
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
@endsection