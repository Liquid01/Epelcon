@extends('layouts.back_seller')



@section('page_title')

    My Products

@endsection



@section('content')

    <div class="content-wrapper-before black"></div>

    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">

        <!-- Search for small screen-->

        <div class="container">

            <div class="row">

                <div class="col s10 m6 l6">

                    <h5 class="breadcrumbs-title mt-0 mb-0">My Products</h5>

                    <ol class="breadcrumbs mb-0">

                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a>

                        </li>

                        <li class="breadcrumb-item"><a href="#">Seller HQ</a>

                        </li>

                        <li class="breadcrumb-item active">Products

                        </li>

                    </ol>

                </div>



            </div>

        </div>

    </div>

    <div id="ecommerce-product">

        <div class="col s12 m12 l12">

            <span class="hidden" style="display: none;">{{$n=0}}</span>

            @forelse($products as $product)

                <div class="col s12 m4 l4" style=" ">

                    <div class="card animate fadeLeft">

                        <div class="card-badge"><a class="white-text"> <b>On Offer</b> </a></div>

                        <div class="card-content">

                            <p>

                                {{$product->category->name}}

                            </p>

                            <span class="card-title text-ellipsis">{{$product->name}}</span>

                            <a href="#modal{{$product->id}}" style="max-height:224px!important; overflow: hidden; align-content: center " class="modal-trigger">

                                <img src="{{asset('assets/img/products/productThumbImage/'.$product->image)}}"

                                     class="responsive-img" alt="" style="max-height:224px!important; min-height: 224px!important;">

                            </a>



                            <div class="row">

                                <h6 class="col s12 m12 l8 mt-3">&#x20a6;{{number_format((float)$product->sales_price, 2)}}<small>&nbsp;${{number_format($product->sales_price, 2)}}  </small> </h6>

                                <a class="col s12 m12 l4 mt-2 waves-effect waves-light gradient-45deg-deep-purple-blue btn modal-trigger"

                                   href="#modal{{$product->id}}">View</a>

                            </div>

                        </div>

                    </div>

                    <!-- Modal Structure -->

                    <div id="modal{{$product->id}}" class="modal" tabindex="0">

                        <div class="modal-content pt-2">

                            <div class="row" id="product-one">

                                <div class="col s12">

                                    <a class="modal-close right"><i class="material-icons">close</i></a>

                                </div>

                                <div class="col m6">

                                    <img src="{{asset('assets/img/products/bigProductImage/'.$product->image)}}"

                                         class="responsive-img" alt="{{$product->name}}">

                                </div>

                                <div class="col m6">

                                    <p>{{$product->category->name}}</p>

                                    <h5>{{$product->name}}</h5>

                                    <span class="new badge left ml-0 mr-2"

                                          data-badge-caption="">4.2 Star</span>

                                    <p>Availability: <span class="green-text">available</span>

                                    </p>

                                    <hr class="mb-5">

                                    <span class="vertical-align-top mr-4"><i

                                                class="material-icons mr-3">favorite_border</i>Wishlist</span>

                                    <p class="mt-3">{{$product->description}}</p>

                                    <h6>&#x20a6;{{number_format((float)$product->sales_price, 2)}}<small>&nbsp; ${{number_format($product->sales_price, 2)}}</small> <span

                                                class="prise-text-style ml-2">&#x20a6;{{$product->sales_price + ($product->sales_price *0.20)}}</span>

                                    </h6>

                                    <input type="number" name="quantity" value="1"

                                           id="quantity{{$product->id}}" class="quantity">

                                    <a class="add_to_cart waves-effect waves-light btn gradient-45deg-deep-purple-blue mt-2"

                                       data-added="{{$product->id}}"

                                       data-name="{{$product->name}}"

                                       data-price="{{$product->sales_price}}"

                                       data-qty="quantity{{$product->id}}"

                                       data-image="{{$product->image}}"

                                       id="add_to_cart"><i class="fa fa-shopping-basket"></i> ADD</a>

                                    <a class="waves-effect waves-light btn gradient-45deg-purple-deep-orange mt-2"

                                       data-id="">BUY</a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>





            @empty

                <div class="card animate fadeLeft">

                    <div class="card-badge"><a class="white-text"> <b>On Offer</b> </a></div>

                    <div class="card-content">

                        <h6>No Products for this Category</h6>

                    </div>

                </div>







                <div class="row">

                    <h5 class="ml-2">Latest Products</h5>

                    <div class="col s12 m4">

                        <div class="card animate fadeLeft">

                            <div class="card-content  center">

                                <h6 class="card-title font-weight-400 mb-0">PRODUCT</h6>

                                <img src="{{asset('backassets/images/cards/empty-product.png')}}" alt=""

                                     class="responsive-img"/>

                                <p><b>No Product</b></p>

                                <p>Add a products </p>

                            </div>

                            <div class="card-action border-non center">

                                <a href="{{route('new_product')}}" class="waves-effect waves-light btn gradient-45deg-light-blue-cyan box-shadow">$

                                    Add</a>

                            </div>

                        </div>

                    </div>

                </div>

            @endforelse

            <div class="col s12 center">

                <ul class="pagination">

                    <li class="disabled">

                        <a href="#!">

                            <i class="material-icons">chevron_left</i>

                        </a>

                    </li>

                    <li class="active"><a href="#!">1</a>

                    </li>

                    {{--<li class="waves-effect"><a href="#!">2</a>--}}

                    {{--</li>--}}

                    {{--<li class="waves-effect"><a href="#!">3</a>--}}

                    {{--</li>--}}

                    {{--<li class="waves-effect"><a href="#!">4</a>--}}

                    {{--</li>--}}

                    {{--<li class="waves-effect"><a href="#!">5</a>--}}

                    {{--</li>--}}

                    {{--<li class="waves-effect">--}}

                    {{--<a href="#!">--}}

                    {{--<i class="material-icons">chevron_right</i>--}}

                    {{--</a>--}}

                    {{--</li>--}}



                </ul>

            </div>





        {{--<div class="col s12">--}}

        {{--<div class="card animate fadeUp">--}}

        {{--<div class="card-badge"><a class="white-text"> <b>On Offer</b> </a></div>--}}

        {{--<div class="card-content">--}}

        {{--<div class="row" id="product-four">--}}

        {{--<div class="col m6">--}}

        {{--<img src="{{asset('backassets/images/cards/remote.png')}}"--}}

        {{--class="responsive-img" alt="">--}}

        {{--</div>--}}

        {{--<div class="col m6">--}}

        {{--<p>Powerbank</p>--}}

        {{--<h5>Game Remote</h5>--}}

        {{--<span class="new badge left ml-0 mr-2"--}}

        {{--data-badge-caption="">4.2 Star</span>--}}

        {{--<p>Availability: <span class="green-text">Available</span></p>--}}

        {{--<hr class="mb-5">--}}

        {{--<span class="vertical-align-top mr-4"><i class="material-icons mr-3">favorite_border</i>Wishlist</span>--}}

        {{--<p class="mt-3">- Dual output USB interfaces</p>--}}

        {{--<p>- Compatible with all smartphones</p>--}}

        {{--<p>- Portable design and light weight</p>--}}

        {{--<p>- Battery type: Lithium-ion</p>--}}

        {{--<h5 class="red-text">$79.00 <span class="grey-text lighten-2 ml-3">$199.00</span>--}}

        {{--</h5>--}}

        {{--<a class="waves-effect waves-light btn gradient-45deg-deep-purple-blue z-depth-4 mt-2">ADD--}}

        {{--TO CART</a>--}}

        {{--<a class="waves-effect waves-light btn gradient-45deg-purple-deep-orange z-depth-4 mt-2">BUY--}}

        {{--NOW</a>--}}

        {{--</div>--}}

        {{--</div>--}}

        {{--</div>--}}

        {{--</div>--}}

        {{--</div>--}}

        <!-- Pagination -->



        </div>

    </div>

@endsection

