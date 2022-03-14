@php
    $stripe_key = 'pk_test_n78Z2CBbdPImb7bRVVMkJCxF00TYyPoenv';
@endphp
<div class="container" style="margin-top:10%;margin-bottom:10%">
    <div class="row justify-content-center">
            <div class="card cardBody">
                <form id="payment-form">
                    @csrf
                    <div class="form-group">
                        <div class="card-header">
                            <label for="card-element">
                                Enter your credit card information
                            </label>
                        </div>
                        <div class="card-body">
                            <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                            <input type="hidden" name="plan" value="" />
                        </div>
                    </div>
                    <div class="card-footer">
                        <button
                        id="card-button"
                        class="btn btn-dark subBtn"
                        type="submit"
                        data-secret="{{ $intent }}"
                    > Pay </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
    const elements = stripe.elements(); // Create an instance of Elements.
    const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

    // Handle real-time validation errors from the card Element.
    cardElement.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

    stripe.handleCardPayment(clientSecret, cardElement, {
            payment_method_data: {
                //billing_details: { name: cardHolderName.value }
            }
        })
        .then(function(result) {
            console.log(result);
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // console.log(result);
                // alert(result);

                $('.cardBody').html(`<img class="card-img-top" width='100px' src="{{asset('icons/success.gif')}}" alt="No Image">`)
                $('#order').removeAttr('disabled');
                $('.cardBody').css({'display':'flex','align-items': 'center'})
            }
        });
    });
    $('.subBtn').submit(function (e) {
        e.preventDefault(e);
        let data = $('#payment-form').serialize()
        $.ajax({
            type: "post",
            url: "{{route('checkout.credit-card')}}",
            data: data,
            success: function (response) {
                    console.log(response);
                    // console.log(response);
                    alert('msg');
                    // $('#stripeBody').html(response)
            }
        });

    });
</script>
