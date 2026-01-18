@isset($cartItems)

    <li>

        <h6>CART ITEMS<span class="new badge">{{$cartItems->count()}}</span></h6>

        <span class="cartcount" style="display: none;">{{$cartItems->count()}}</span>

    </li>

    <li class="divider"></li>



    @forelse($cartItems as $item)

        <li>

            <a class="grey-text text-darken-2" href="#!"><span

                        class="material-icons icon-bg-circle cyan small">remove_shopping_cart</span>

                N: {{$item->name}} | QTY: {{$item->qty}} | P: {{$item->price}} | Amt: {{$item->price * $item->qty}}

            </a>

            {{--<time class="media-meta">Remove</time>--}}

        </li>



    @empty



        <li>

            <a class="grey-text text-darken-2" href="#!">

                <span class="material-icons icon-bg-circle cyan small">remove_shopping_cart</span>

                Basket Empty

            </a>

            <time class="media-meta">Add some items</time>

        </li>

    @endforelse

    <li class="divider"></li>

    <li>

        TOTAL: {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}

    </li>



@endisset
