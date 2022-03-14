@extends('layouts.home')
@section('contant')
<div class="checkout_area pt-80">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-12">
                <div class="checkout_form mb-100">
                    <form action="#">
                        <div class="row mb-30">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="checkout__wrap">
                                    <label>User Name <span>*</span></label>
                                    <input type="text" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__wrap">
                            <label>Country / Region <span>*</span></label>
                            <select name="country">
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Arab">Arab</option>
                                <option value="America">America</option>
                                <option value="Saudi">Saudi Arabia</option>
                                <option value="Israil">Israil</option>
                                <option value="Irak">Irak</option>
                                <option value="Netherland">Netherland</option>
                            </select>
                        </div>
                        <div class="checkout__wrap">
                            <label>Street address <span>*</span></label>
                            <input class="mb-20" type="text" name="add1" placeholder="house number and street number">
                            <input type="text" name="add2" placeholder="apartment,suite,unit,etc.(optional)">
                        </div>
                        <div class="checkout__wrap">
                            <label>Town / City *<span></span></label>
                            <input type="text" name="town">
                        </div>
                        <div class="checkout__wrap">
                            <label>County (optional)<span></span></label>
                            <input type="text" name="country">
                        </div>
                        <div class="checkout__wrap">
                            <label>Postcode<span>*</span></label>
                            <input type="text" name="postcode">
                        </div>
                        <div class="checkout__wrap">
                            <label>Phone <span>*</span></label>
                            <input type="text" name="phone">
                        </div>
                        <div class="checkout__wrap">
                            <label>Email address <span>*</span></label>
                            <input type="email" name="email">
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
                            @php $total = 0 @endphp
                            @foreach((array) session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                            @endforeach
                          <td class="lightbluee">${{$total}}</td>
                      </tr>
                      <tr class="first-child lastchild">
                          <td>Shipping</td>
                          <td>Enter your address to view shipping options. </td>
                      </tr>
                      <tr class="first-child-2">
                          <td>Total</td>
                          <td class="lightbluee">$47.00</td>
                      </tr>
                  </table>
                  <div class="checkout__accordion mt-30">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Check payments
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Cash on delivery
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Pay with cash upon delivery.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Stripe
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                @if (Session::has('success'))
                                    <div class="alert alert-success text-center">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <p>{{ Session::get('success') }}</p>
                                    </div>
                                @endif
                                <form role="form" action="{{ route('stripe.payment') }}" method="post" class="validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                    @csrf
                                    <div class='form-row row'>
                                        <div class='col-xs-12 form-group required'>
                                            <label class='control-label'>Name on Card</label> <input
                                                class='form-control' size='4' type='text'>
                                        </div>
                                    </div>
                                    <div class='form-row row'>
                                        {{-- <div class='col-xs-12 form-group card required'> --}}
                                            <label class='control-label'>Card Number</label> <input
                                                autocomplete='off' class='form-control card-num' size='20'
                                                type='text'>
                                        {{-- </div> --}}
                                    </div>
                                    <div class='form-row row'>
                                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                                            <label class='control-label'>CVC</label>
                                            <input autocomplete='off' class='form-control card-cvc' placeholder='e.g 415' size='4'
                                                type='text'>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Month</label> <input
                                                class='form-control card-expiry-month' placeholder='MM' size='2'
                                                type='text'>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Year</label> <input
                                                class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                type='text'>
                                        </div>
                                    </div>
                                    <div class='form-row row'>
                                        <div class='col-md-12 hide error form-group'>
                                            <div class='alert-danger alert'>Fix the errors before you begin.</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button class="btn btn-danger btn-lg btn-block" type="submit">Pay Now (₹100)</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                <div class="terms pt-50 pb-20">
                    <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy</p>
                    <div class="check_term">
                        <input type="checkbox">
                        <p>I have read and agree to the website terms and conditions <span>*</span></p>
                    </div>
                    <div class="order-button">
                        <button type="submit">place order</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v2@extends('layouts.home')
@section('contant')
<div class="checkout_area pt-80">
    <div class="container">
        <div class="row">
            @php $total = 0 @endphp
                @foreach((array) session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                @endforeach
            <div class="col-xl-7 col-lg-7 col-md-12">
                <div class="checkout_form mb-100">
                    <form action="{{ route('checkout.store') }}" method="POST">
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
                                <input type="hidden" value="{{$total}}" required name="amount">
                                <label>Country / Region <span>*</span></label>
                                <select required name="country">
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Arab">Arab</option>
                                    <option value="America">America</option>
                                    <option value="Saudi">Saudi Arabia</option>
                                    <option value="Israil">Israil</option>
                                    <option value="Irak">Irak</option>
                                    <option value="Netherland">Netherland</option>
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
                            <div class="checkout__accordion mt-30 mb-20">
                                <h4>
                                    Payment Method
                                </h4>
                                <div class="accordion  row" id="accordionExample">
                                    <div class="accordion-item col-2">
                                        <label class="form-label btn btn-primary btn-lg" >Stripe
                                            <input class="stripBtn" type="radio"  name="paymentmethod" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
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
                                <button type="submit" id="placeOrder">place order</button>
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
                      {{-- <tr class="first-child lastchild">
                          <td>Shipping</td>
                          <td>Enter your address to view shipping options. </td>
                      </tr>
                      <tr class="first-child-2">
                          <td>Total</td>
                          <td class="lightbluee">$47.00</td>
                      </tr> --}}
                  </table>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form id="payment-form" action="{{ route('stripe.payment') }}" method="POST" class="require-validation"
                        data-cc-on-file="false"
                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">

                            <label for="form-label card-element">
                                Credit or debit card
                            </label>
                            <div id="card-element"  style="margin-top: 10px;border: 1px solid;border-radius: 5px;padding: 13px;">
                            <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display Element errors. -->
                            <div id="card-errors" role="alert"></div>
                            <button id="submit">
                              <div class="spinner hidden" id="spinner"></div>
                              <span id="button-text">Pay now</span>
                            </button>
                            <div id="payment-message" class="hidden"></div>
                          </form>

                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('.cod').click(function() {
        if($('.cod').is(':checked')) {
            $('#collapseThree').removeClass('show');
            $('#placeOrder').removeAttr('disabled');
         }
    });
    $('.stripBtn').click(function() {
        if($('.stripBtn').is(':checked')) {
            $('#placeOrder').attr('disabled','disabled');
        }
    });
    var stripe = Stripe('pk_test_n78Z2CBbdPImb7bRVVMkJCxF00TYyPoenv');
    var elements = stripe.elements();
    var style = {
        base: {
            fontSize: '16px',
            color: '#32325d',
        },
    };
    var card = elements.create('card', {style: style});
    card.mount('#card-element');
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token);
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
</style>
@endsection
/"></script>

<script type="text/javascript">
$(function() {
    var $form = $(".validation");
    $('form.validation').bind('submit', function(e) {
         var $form = $(".validation"),
        inputVal = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]','textarea'].join(', '),
        $inputs = $form.find('.required').find(inputVal),
        $errorStatus = $form.find('div.error'),
        valid= true;
        $errorStatus.addClass('hide');

        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorStatus.removeClass('hide');
        e.preventDefault();
      }
    });

    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-num').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeHandleResponse);
    }

  });

  function stripeHandleResponse(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }

});
</script>
@endsection
