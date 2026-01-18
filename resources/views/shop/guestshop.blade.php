@extends('layouts.shop')



@section('content')
    <div class="row" style="">

        <div class="content-wrapper-before white"></div>



        <div class="col s12 mt-10 pd-10">

            <div class="container">
                <div
                    style="min-height: 300px; text-align: center; width:100%; background: #efefef; display: flexbox; justify-content: center;">
                        <h3 class="text-warning" style="padding:10px;  color: orangered">
                            70% Off this season of Joy.
                            </h3>

                         <h5 class="text-danger" style="padding:10px;color: green" >
                        Enjoy 32% on referral,  over 21% on retail, more on rebates.
                        </h5>

                   
                </div>

                <div class="section">

                    <div class="row" id="ecommerce-products">

                        {{-- ?here we dispay shop items; here the items are those used for the members login --}}

                        {{-- if they are not loged in, display emplty --}}

                        @include('shop.shop_items')

                    </div>

                </div><!-- START RIGHT SIDEBAR NAV -->

            </div>

        </div>

    </div>



    <meta name="_token" content="{{ @csrf_token() }}">
@endsection
