<div class="wpo-team-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-section-title">
                    <h2>Products</h2>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">@php $n=0 @endphp
            @foreach(\App\Product::all() as $product)

                @php $n++ @endphp
                @if($n <= 3)
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 custom-grid">
                        <div class="wpo-team-wrap" style="text-align: center">
                            <a href="{{route('guestshop')}}">
                                <div class="wpo-team-img">
                                    <img src="{{asset('assets/img/products/productThumbImage/'.$product->image)}}" style="max-width:250px;" alt=""
                                         width="100%">
                                </div>
                                <div class="wpo-team-contentd">
                                    <div class="wpo-team-text-sub">
                                        <h4>{{$product->name}}</h4>
                                        <span class="text-success">Members: &#x20a6;{{number_format($product->price)}}</span>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
