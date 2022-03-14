<div class="view-background">
    <div class="row">
        <div class="col-xl-5 col-lg-5 col-md-5">
            <div class="quickview">
                <div class="quickview__thumb">
                    @for ($i=0;$i<count($product->image); $i++)
                        @if ($i == 0)
                            <img src="{{asset('product/'.$product->image[$i]['name'])}}" alt="product_image">
                        @else
                            @break
                        @endif
                    @endfor
                </div>
            </div>
        </div>
        <div class="col-xl-7 col-lg-7 col-md-7">
            <div class="viewcontent">
                <div class="viewcontent__header">
                    <h2>{{$product->name}}</h2>
                    <button class="view_close product-p-close" onclick="closePop()">
                        <i class="fal fa-times-circle"></i>
                    </button>
                </div>
                <div class="viewcontent__rating">
                    <i class="fal fa-star ratingcolor"></i>
                    <i class="fal fa-star ratingcolor"></i>
                    <i class="fal fa-star ratingcolor"></i>
                    <i class="fal fa-star"></i>
                </div>
                <div class="viewcontent__price">
                    <h4><span>$</span>{{$product->price}}</h4>
                </div>
                <div class="viewcontent__stock">
                    <h4>Available :<span> In stock</span></h4>
                </div>
                <div class="viewcontent__details">
                    <p>{{$product->summary}}</p>
                </div>
                <div class="viewcontent__action">
                    <span><button class="btn btn-default addToCart" data-id="{{ route('add.to.cart', $product->id) }}">add to cart</button></span>
                    {{-- <span><i class="fal fa-heart"></i></span>
                    <span><i class="fal fa-info-circle"></i></span> --}}
                </div>
                <div class="viewcontent__footer">
                    <ul>
                        <li>Category:</li>
                        <li>SKU:</li>
                    </ul>
                    <ul>
                        @foreach ($product->category as $key )
                            <li>{{$key->name}}</li>
                        @endforeach
                        <li>{{$product->sku}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
