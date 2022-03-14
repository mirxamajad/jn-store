<div class="cart__sidebar cartData">
    <div class="container">
        <div class="cart__content">
            <div class="cart-text">
                <h3 class="mb-40">Shopping cart</h3>
                @if (!empty(session('cart')))
                    @foreach ( session('cart') as $id => $details )
                        <div class="add_cart_product">
                            <div class="add_cart_product__thumb">
                                <img src="{{asset('product/'.$details['image'][0]['name'])}}" alt="">
                            </div>
                            <div class="add_cart_product__content">
                                <h5>{{ $details['name'] }}</h5>
                                <p>{{ $details['quantity'] }} × ${{ $details['price'] }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="cart-bottom">
                <div class="cart-bottom__text">
                    <span>Subtotal:</span>
                    @php $total = 0 @endphp
                    @foreach((array) session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                    @endforeach
                    <span class="end">
                        @if ($total!=0)

                            {{ $total }}
                        @endif
                    </span>
                    <a href="{{ route('cart') }}">view cart</a>
                    <a href="{{ route('checkout.index') }}">checkout</a>
                </div>
            </div>
                <div class="cart-icon" >
                    <i class="fal fa-times" onclick="CartClose()"></i>
                </div>
            </div>
        </div>
    </div>
</div>
