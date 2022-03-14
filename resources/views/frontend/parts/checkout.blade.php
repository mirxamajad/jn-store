@extends('layouts.home')
@section('contant')
    @if (!empty(session('cart')))
        <div class="checkout_area pt-80">
            <div class="container">
                <div class="row">
                    @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                    <div class="col-xl-7 col-lg-7 col-md-12">
                        <div class="checkout_form mb-100">
                            <form action="{{ route('checkout.stores') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="checkout__wrap col-6">
                                        <label>User Name <span>*</span></label>
                                        <input type="text" required name="name" >
                                    </div>
                                    <div class="checkout__wrap col-6">
                                        <label>Phone <span>*</span></label>
                                        <input type="text" required name="phone">
                                    </div>
                                    <div class="checkout__wrap col-6">
                                        <label>Email address <span>*</span></label>
                                        <input type="email" required name="email">
                                    </div>
                                    <div class="checkout__wrap col-6">
                                        <input type="hidden" value="{{$total}}" required id="amount">
                                        <input type="hidden" value="" required class="total" name="amount">
                                        <label>State / Region <span>*</span></label>
                                        <select required name="country" id="statesCharges">
                                            <option disabled selected> Select States</option>
                                            @foreach ($shipping as $ship)
                                                <option data-id="{{$ship->charges}}" value="{{$ship->id}}">{{$ship->states}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="checkout__wrap col-6">
                                        <label>Town / City *<span></span></label>
                                        <input type="text" required name="town">
                                    </div>
                                    <div class="checkout__wrap col-6">
                                        <label>Postcode<span>*</span></label>
                                        <input type="text" required name="postcode">
                                    </div>
                                    <div class="checkout__wrap">
                                        <label>Street address <span>*</span></label>
                                        <input class="mb-20" type="text" required name="address_1" placeholder="house number and street number">
                                        <input type="text"  name="address_2" placeholder="apartment,suite,unit,etc.(optional)">
                                    </div>
                                    {{-- <div  class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-primary">
                                            <input type="radio"> Text
                                        </label>
                                    </div> --}}
                                    <div class="checkout__accordion mt-30 mb-20">
                                        <h4>
                                            Payment Method
                                        </h4>
                                        <div class="accordion  row" id="accordionExample">
                                            <div class="accordion-item col-2">
                                                <label class="form-label btn btn-primary btn-lg" >Stripe
                                                    <input class="stripeBtn" type="radio"  name="paymentmethod" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                </label>
                                            </div>
                                            <div class="accordion-item col-4">
                                                <label class="form-label btn btn-primary btn-lg"> Cash on delivery
                                                    <input class="cod" type="radio" name="paymentmethod" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="ture" aria-controls="collapseThree">
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-button" style="margin-top: 10px">
                                        <button type="submit" id='order' >place order</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-12">
                        <div class="cart__acount ml-50">
                            <h5>Your order</h5>
                        <table>
                            <tr class="first-child-2">
                                <td>Order</td>
                                <td>

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
                                </td>
                            </tr>
                            <tr class="first-child-2">
                                <td>Subtotal</td>
                                <td class="lightbluee">${{$total}}</td>
                            </tr>
                                <tr class="first-child lastchild" id="shippingCharges">
                                <td>Shipping</td>
                                <td class="lightbluee" id="shipping"></td>
                                </tr>
                                <tr class="first-child-2 shippingCharges">
                                    <td>Total</td>
                                    <td id="totalAmount"></td>
                                </tr>
                        </table>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body" id='stripeBody'>

                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('scripts')
    <script>
        $(function () {
            $('#shippingCharges').hide();
            $('.shippingCharges').hide();
        });
        $('.cod').click(function() {
            if($('.cod').is(':checked')) {
                $('#collapseThree').removeClass('show');
                $('#order').removeAttr('disabled');
            }
        });
        $('.stripeBtn').click(function() {
            if($('.stripeBtn').is(':checked')) {
                $('#order').attr('disabled', 'disabled');
                let data = $('.total').val();
                let url = `{{url('stripe-checkout/`+data+`')}}`
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function (response) {
                        $('#stripeBody').html(response)
                    }
                });
            }else{
                $('#order').removeAttr('disabled');
            }
        });
        $('#statesCharges').change(function (e) {
            let data = $('#statesCharges').val();
            let url = `{{url('getShippingCharges/`+data+`')}} `;
            $.ajax({
                type: "get",
                url: url,
                success: function (response) {
                    let amonut = $('#amount').val();
                    totalAmount = parseInt(amonut) + parseInt(response.charges);
                    $('#shippingCharges').show();
                    $('.shippingCharges').show();
                    $('#shipping').html(response.charges)
                    $('#totalAmount').html(totalAmount)
                    $('.total').val(totalAmount)
                }
            });

        });
    </script>
@endsection
@section('styles')
<style>
.hidden {
  display: none;
}

#payment-message {
  color: rgb(105, 115, 134);
  font-size: 16px;
  line-height: 20px;
  padding-top: 12px;
  text-align: center;
}

#payment-element {
  margin-bottom: 24px;
}

/* Buttons and links */
button {
  background: #5469d4;
  font-family: Arial, sans-serif;
  color: #ffffff;
  border-radius: 4px;
  border: 0;
  padding: 12px 16px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  display: block;
  transition: all 0.2s ease;
  box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
  width: 100%;
}
button:hover {
  filter: contrast(115%);
}
button:disabled {
  opacity: 0.5;
  cursor: default;
}

/* spinner/processing state, errors */
.spinner,
.spinner:before,
.spinner:after {
  border-radius: 50%;
}
.spinner {
  color: #ffffff;
  font-size: 22px;
  text-indent: -99999px;
  margin: 0px auto;
  position: relative;
  width: 20px;
  height: 20px;
  box-shadow: inset 0 0 0 2px;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
}
.spinner:before,
.spinner:after {
  position: absolute;
  content: "";
}
.spinner:before {
  width: 10.4px;
  height: 20.4px;
  background: #5469d4;
  border-radius: 20.4px 0 0 20.4px;
  top: -0.2px;
  left: -0.2px;
  -webkit-transform-origin: 10.4px 10.2px;
  transform-origin: 10.4px 10.2px;
  -webkit-animation: loading 2s infinite ease 1.5s;
  animation: loading 2s infinite ease 1.5s;
}
.spinner:after {
  width: 10.4px;
  height: 10.2px;
  background: #5469d4;
  border-radius: 0 10.2px 10.2px 0;
  top: -0.1px;
  left: 10.2px;
  -webkit-transform-origin: 0px 10.2px;
  transform-origin: 0px 10.2px;
  -webkit-animation: loading 2s infinite ease;
  animation: loading 2s infinite ease;
}

@-webkit-keyframes loading {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes loading {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

@media only screen and (max-width: 600px) {
  form {
    width: 80vw;
    min-width: initial;
  }
}
#cardNumber{
    margin-top: 10px;
    border: 1px solid;
    border-radius: 5px;
    padding: 13px;
}
</style>
@endsection
