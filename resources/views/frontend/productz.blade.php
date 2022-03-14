@extends('layouts.home')
@section('contant')
<div class="shop-page pt-85">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12">
                <div class="sidebar">
                    <div class="product-widget">
                        <h3 class="widget-title mb-30">Product categories</h3>
                        <ul class="product-categories">
                            @foreach ($cat as $key)
                                <li>
                                    <a href="shop.html">
                                        {{$key->name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
                <div class="shop-top-bar position-relative">
                    <div class="showing-result">
                        <p> Showing all {{count($cat[0]['product'])}} results</p>
                    </div>
                    <div class="shop-tab">
                        <nav>
                            <div class="nav nav-tabs shop-tabs" id="nav-tab" role="tablist">
                                <button>
                                    <span>views</span>
                                </button>
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <img src="{{asset('customer/img/essential/i2.svg')}}" alt="">
                                </button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                                    <img src="{{asset('customer/img/essential/i3.svg')}}" alt="">
                                </button>
                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                                    <img src="{{asset('customer/img/essential/i4.svg')}}" alt="">
                                </button>
                            <button class="nav-link" id="nav-contact-tab2" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                                <img src="{{asset('customer/img/essential/list.svg')}}" alt="">
                            </button>
                        </div>
                            </nav>
                    </div>

                </div>
                <div class="shop-page-product pt-50 pb-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                              <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="row">
                                        @foreach ($cat as  $key)
                                            @foreach ($key->product as $product)
                                                <div class="col-xl-6">
                                                    <div class="product product-4">
                                                        <div class="product__thumb">
                                                            <a href="{{route('index.singnleproduct',['name' => $product->name, 'id'=>$product->id])}}">
                                                                @for ($i=0;$i<count($product->image); $i++)
                                                                    @if ($i == 0)
                                                                    <img class="product-primary" src="{{asset('product/'.$product->image[$i]['name'])}}" alt="product_image">
                                                                    @elseif ($i == 1)
                                                                        <img class="product-secondary" src="{{asset('product/'.$product->image[$i]['name'])}}" alt="product_image">
                                                                    @else
                                                                        @break
                                                                    @endif
                                                                @endfor
                                                            </a>
                                                            <div class="product-info mb-10">
                                                                <div class="product_category">
                                                                    <span>{{$key->name}}</span>
                                                                </div>
                                                                <div class="product_rating">
                                                                    <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                    <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                    <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                                </div>
                                                            </div>
                                                                <div class="product__name">
                                                                <h4>
                                                                    <a href="{{route('index.singnleproduct',['name' => $product->name, 'id'=>$product->id])}}">{{$product->name}}</a>
                                                                </h4>
                                                                <div class="pro-price">
                                                                    <p class="p-absoulute pr-1"><span>$</span>{{$product->price}} </p>
                                                                    <button class="btn btn-default p-absoulute pr-2 addToCart" data-id="{{ route('add.to.cart', $pro->id) }}">add to cart</button>
                                                                </div>
                                                            </div>
                                                        <div class="product__action">
                                                        {{-- <div class="inner__action">
                                                            <div class="wishlist">
                                                                <a href="#"><i class="fal fa-heart"></i></a>
                                                            </div>
                                                            <div class="view">
                                                                <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                            </div>
                                                            <div class="layer">
                                                                <a href="#"><i
                                                                        class="fal fa-layer-group"></i></a>
                                                            </div>
                                                        </div> --}}
                                                    </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="row">
                                        @foreach ($cat as $key )
                                            @foreach ($key->product as $product)
                                                <div class="col-xl-4">
                                                    <div class="product product-4">
                                                        <div class="product__thumb">
                                                            <a href="{{route('index.singnleproduct',['name' => $product->name, 'id'=>$product->id])}}">
                                                                @for ($i=0;$i<count($product->image); $i++)
                                                                    @if ($i == 0)
                                                                        <img class="product-primary" src="{{asset('product/'.$product->image[$i]['name'])}}" alt="product_image">
                                                                    @elseif ($i == 1)
                                                                        <img class="product-secondary" src="{{asset('product/'.$product->image[$i]['name'])}}" alt="product_image">
                                                                    @else
                                                                        @break
                                                                    @endif
                                                                @endfor
                                                            </a>
                                                            <div class="product-info mb-10">
                                                                <div class="product_category">
                                                                    <span>{{$key->name}}</span>
                                                                </div>
                                                                <div class="product_rating">
                                                                    <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                    <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                    <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                                </div>
                                                            </div>
                                                                <div class="product__name">
                                                                <h4><a href="{{route('index.singnleproduct',['name' => $product->name, 'id'=>$product->id])}}">{{$product->name}}</a></h4>
                                                                <div class="pro-price">
                                                                    <p class="p-absoulute pr-1"><span>$</span>{{$product->price}} </p>
                                                                    <button class="btn btn-default p-absoulute pr-2 addToCart" data-id="{{ route('add.to.cart', $pro->id) }}">add to cart</button>
                                                                </div>
                                                            </div>
                                                        <div class="product__action">
                                                        {{-- <div class="inner__action">
                                                            <div class="wishlist">
                                                                <a href="#"><i class="fal fa-heart"></i></a>
                                                            </div>
                                                            <div class="view">
                                                                <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                            </div>
                                                            <div class="layer">
                                                                <a href="#"><i
                                                                        class="fal fa-layer-group"></i></a>
                                                            </div>
                                                        </div> --}}
                                                    </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div class="row">
                                        @foreach ($cat as $key )
                                            @foreach ($key->product as $product )
                                                <div class="col-xl-3">
                                                    <div class="product product-3">
                                                        <div class="product__thumb">
                                                            <a href="{{route('index.singnleproduct',['name' => $product->name, 'id'=>$product->id])}}">
                                                                @for ($i=0;$i<count($product->image); $i++)
                                                                    @if ($i == 0)
                                                                        <img class="product-primary" src="{{asset('product/'.$product->image[$i]['name'])}}" alt="product_image">
                                                                    @elseif ($i == 1)
                                                                        <img class="product-secondary" src="{{asset('product/'.$product->image[$i]['name'])}}" alt="product_image">
                                                                    @else
                                                                        @break
                                                                    @endif
                                                                @endfor
                                                            </a>
                                                            <!-- <div class="product__update">
                                                                <a class="#">new</a>
                                                            </div> -->
                                                            <div class="product-info mb-10">
                                                                <div class="product_category">
                                                                    <span>{{$key->name}}</span>
                                                                </div>
                                                                <div class="product_rating">
                                                                    <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                    <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                    <a href="#"><i class="fal fa-star start-color"></i></a>
                                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                                    <a href="#"><i class="fal fa-star"></i></a>
                                                                </div>
                                                            </div>
                                                                <div class="product__name">
                                                                <h4><a href="{{route('index.singnleproduct',['name' => $product->name, 'id'=>$product->id])}}">{{$product->name}}</a></h4>
                                                                <div class="pro-price">
                                                                    <p class="p-absoulute pr-1"><span>$</span>{{$product->price}}</p>
                                                                    <a class="p-absoulute pr-2" href="#">add to cart</a>
                                                                </div>
                                                            </div>
                                                        <div class="product__action">
                                                        {{-- <div class="inner__action">
                                                            <div class="wishlist">
                                                                <a href="#"><i class="fal fa-heart"></i></a>
                                                            </div>
                                                            <div class="view">
                                                                <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                            </div>
                                                            <div class="layer">
                                                                <a href="#"><i
                                                                        class="fal fa-layer-group"></i></a>
                                                            </div>
                                                        </div> --}}
                                                    </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    @foreach ($cat as $key )
                                        @foreach ($key->product as $product )
                                            <div class="border-top">
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-4 col-md-4">
                                                        <div class="list-product">
                                                            <div class="list__thumb">
                                                                <a href="{{route('index.singnleproduct',['name' => $product->name, 'id'=>$product->id])}}">
                                                                    @for ($i=0;$i<count($product->image); $i++)
                                                                        @if ($i == 0)
                                                                            <img src="{{asset('product/'.$product->image[$i]['name'])}}" alt="">
                                                                        @else
                                                                            @break
                                                                        @endif
                                                                    @endfor
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-8 col-lg-8 col-md-8">
                                                        <div class="list__content">
                                                            <div class="viewcontent">
                                                                <div class="viewcontent__header">
                                                                    <a href="{{route('index.singnleproduct',['name' => $product->name, 'id'=>$product->id])}}"><h2 class="mb-10">{{$product->name}}</h2></a>
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
                                                                <div class="view__para">
                                                                    <p>{{$product->summary}}</p>
                                                                </div>
                                                                <div class="list-actions pt-20">
                                                                    <div class="viewcontent__action">
                                                                        <span><button class="btn btn-default p-absoulute pr-2 addToCart" data-id="{{ route('add.to.cart', $product->id) }}">add to cart</button></span>
                                                                        <a  href="#"><i class="fal fa-heart"></i></a>
                                                                        <a class="ml-5" href="#"><i class="fal fa-layer-group"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
