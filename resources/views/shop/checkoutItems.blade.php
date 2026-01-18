<div class="">
    @forelse($cartItems as $item)
        <div class="row border-bottom-1 mb-10">
            <div class="row">
                <div class="col l4 s4 x4">{{$item->name}}</div>
                <div class="col l3 s3 m3 x3">{{$item->price}}</div>
                <div class="col l1 s1 m1 x1">{{$item->qty}}</div>
                <div class="col l3 s3 m3 x3">{{$item->qty * $item->price}}</div>

            </div>
            <span class="pull-right" style="float:right!important;">
        <i class="material-icons cart-btn add-btn" id="add-item{{$item->id}}" data-id="{{$item->rowId}}">add</i>

        <i class="material-icons cart-btn deduct-btn" id="deduct-item{{$item->id}}" data-id="{{$item->rowId}}">remove</i>

        <i class="material-icons cart-btn remove-btn remove_item" id="remove-item{{$item->id}}"
           data-id="{{$item->rowId}}">cancel</i>
    </span>

        </div>

    @empty

        <h5>No items in Basket</h5>

    @endforelse
</div>
<div class="clearfix"></div>
<div class="row mt-5">
    <div class="btn btn-raised ntm-success " style="float: right!important;">&#x20a6; {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</div>

</div>












