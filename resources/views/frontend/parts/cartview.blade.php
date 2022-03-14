@extends('layouts.home')
@section('contant')
<div class="f_cart_area pt-110 mb-100" id="totalPrice">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12">
                <div class="cart_table" >
                    <table>
                        <tr>
                            <td>#</td>
                            <td>Product</td>
                            <td>price</td>
                            <td>Quantity</td>
                            <td>Total</td>

                           </tr>
                        <tbody>
                            @if (!empty(session('cart')))
                            <?php $count=1; ?>
                                @foreach ( session('cart') as $id => $details )
                                    <tr class="max-width-set">
                                        <td>
                                            {{$count}}
                                        </td>
                                        <td>
                                            <img src="{{asset('product/'.$details['image'][0]['name'])}}" alt="">
                                        </td>
                                        <td>{{ $details['name'] }}</td>
                                        <td>${{ $details['price'] }}</td>
                                        <td>
                                            <div class="viewcontent__action single_action pt-30">
                                                <span>
                                                    <input type="number" placeholder="1" id="quantity" onkeypress="return event.charCode >= 48" min="1" class="quantity" onchange="updateCart({{ $id }} , {{ $details['quantity']}})" value="{{ $details['quantity'] }}">
                                                </span>
                                            </div>
                                        </td>
                                         <td >
                                            ${{ $details['quantity'] * $details['price'] }}
                                        </td>
                                        <td class="width-set">
                                            <button class="btn btn-default" type="button" onclick="removeFromCart({{ $id }})">
                                                <i class="fal fa-times-circle"></i></a>
                                        </td>
                                    </tr>
                                    <?php $count++; ?>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="cart__acount">
                    <h5>Cart totals</h5>
                  <table style="width: 100%">
                      <tr class="first-child">
                          <td>Subtotal</td>
                          @php $total = 0 @endphp
                            @foreach((array) session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                            @endforeach
                          <td>${{$total}}</td>
                      </tr>
                      <tr>
                          <td colspan="2">
                              <a href="{{ route('checkout.index') }}"><input class="btn btn-primary" type="submit" value="procced to checkout"></a>
                          </td>
                      </tr>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">


    function updateCart(id) {
            let quantity = $('.quantity').val()
        $.ajax({
            url: "{{ route('update.cart') }}",
            method: "patch",
            data: {
              '  _token': '{{ csrf_token() }}',
                'id':id,
               ' quantity': quantity
            },
            success: function (response) {
                $("#totalPrice").load(location.href + " #totalPrice");
                $(".cart__sidebar").load(location.href + " .cart__sidebar");
                $(".first-child").load(location.href + " .first-child");
            }
        });
    }
    function removeFromCart(id) {
            if(confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: "{{ route('remove.from.cart') }}",
                    method: "DELETE",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id
                    },
                    success: function (response) {
                        $("#totalPrice").load(location.href + " #totalPrice");
                        $("#counter").load(location.href + " #counter");
                        $(".cart__sidebar").load(location.href + " .cart__sidebar");
                        $(".first-child").load(location.href + " .first-child");
                    }
                });
            }
    }

</script>
@endsection
