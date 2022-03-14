@extends('layouts.home')
@section('contant')
<div class="single_breadcrumb pt-25">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2">
                        <div class="single_product_tab">
                            <div class="single_prodct">
                                <ul class="nav nav-tabs justify-content-center mb-55" id="dfde" role="tablist">
                                    @foreach ($product->image as $key)
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#homde" type="button" role="tab" aria-selected="true">
                                                <img src="{{(asset('product/'.$key->name))}}"  class="imageView" alt="Image Not Found" />
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="single_preview_product">
                            <div class="single-popup-view imagePop">
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($product->image as $key)
                                    <a class="popup-image" href="{{(asset('product/'.$key->name))}}">
                                        <i class="fal fa-search"></i>
                                    </a>
                                    @if ($count<1)
                                        @break
                                    @endif
                                @endforeach

                            </div>
                            <div class="tab-content" id="myTabefContent">
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($product->image as $key)
                                    <div class="tab-pane fade show active" id="homde" role="tabpanel" >
                                        <div class="full-view">
                                                <img src="{{(asset('product/'.$key->name))}}" alt="">
                                        </div>
                                    </div>
                                    @if ($count<1)
                                        @break
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="single_preview_content pl-30">
                    <h2 class="title-5 edit-title border-bottom-0">{{$product->name}}</h2>
                    <div class="s-product-review">
                        <span><i class="far fa-star start-color"></i></span>
                        <span><i class="far fa-star start-color"></i></span>
                        <span><i class="far fa-star start-color"></i></span>
                        <span><i class="far fa-star start-color"></i></span>
                        <span><i class="far fa-star"></i></span>
                        <span class="pl-left">(customer review)</span>
                    </div>
                    <div class="s-price pt-30 mb-30">
                        <span>${{$product->price}}</span>
                    </div>
                    <div class="s-des">
                        <p>{{$product->summary}}</p>
                    </div>
                    <div class="viewcontent__action single_action pt-30">
                        {{-- <span><input type="number" placeholder="1"></span> --}}
                        <span><button class="btn btn-default p-absoulute pr-2 addToCart" data-id="{{ route('add.to.cart', $product->id) }}">add to cart</button></span>
                        {{-- <span><i class="fal fa-heart"></i></span>
                        <span><i class="fas fa-compress"></i></span> --}}
                    </div>
                    <div class="viewcontent__footer border-top-0 border-bottom pb-30">
                        <ul>
                            <li>Category:</li>
                            <li>SKU:</li>
                        </ul>
                        <ul>
                            @foreach ($product->category as $key)
                                <li>{{$key->name}}
                                {{-- @foreach ($key->subcategory as $val )
                                    {{$val->name}}
                                @endforeach --}}
                                </li>
                            @endforeach

                            <li>{{$product->sku}}</li>
                        </ul>
                    </div>
                    <div class="social__media f-social-media mb-30 pt-15">
                        <h3 class="f-title edit-f-title">FOLLOW US ON</h3>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#"><i class="fab fa-dribbble"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script>
  $('.imageView').click(function (e) {
      var images = $(this).attr('src');
        $('#myTabefContent').html(`
            <div class="tab-pane fade show active" id="homde" role="tabpanel" >
                <div class="full-view">
                        <img src="${images}" alt="">
                </div>
            </div>
        `)
        $('.imagePop').html(`
            <a class="popup-image" href="${images}">
                <i class="fal fa-search"></i>
            </a>
        `)
  });
</script>
@endsection
