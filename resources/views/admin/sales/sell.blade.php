@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="content-wrapper-before black"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s10 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">SALES</h5>
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('admin_sales')}}">Sales</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#!">Sell</a>
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
                        <div class="card-content" style="padding: 20px 5px;">
                            @include('includes.flash')
                            <hr>
                            @include('includes.errors')
                            <div class="row float-none">
                                @foreach($products as $product)
                                    <div class="col col-md-4 col-lg-4 " style="text-align: center">
                                        <div class="cen" style="float: inherit!important;" >

                                            <p>{{$product->name}}</p>
                                            <p style="text-align: center; justify-content: center">
                                                <img
                                                    src="{{asset('assets/img/products/productThumbImage/'.$product->image)}}"
                                                    style="max-width: 200px;"></p>
                                            <p><a href="javascript:void (0);" id="admin_sell" class="btn btn-royal">Sell</a>
                                            </p>

                                            <div class="card center-align" style="display: none;" id="customer_form">
                                                <div class="card-content">
                                                    <form action="{{route('save_sale')}}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="payment">Payment</label>
                                                            <select name="payment" id="payment" class="form-control browser-default">
                                                                <option value="1">Cash</option>
                                                                <option value="2">Wallet</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="customer">Customer</label>
                                                            <input id="customer" type="text" required
                                                                   placeholder="Enter Customer Username"
                                                                   class="form-control" name="customer">
                                                        </div>
                                                        <input type="hidden" value="{{$product->id}}" name="product">
                                                        <div class="form-group">
                                                            <input type="number" min="1" value="1" id="quantity" required
                                                                   placeholder="Quantity" class="form-control"
                                                                   name="quantity">
                                                        </div>
                                                        <div class="form-group">
                                                            <button class="btn btn-success">Sell</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>




@endsection
