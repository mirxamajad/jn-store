@extends('layouts.home')
@section('contant')



<div class="carousel-container">
    <div class="mySlides animate">
      <img class="w-100" src="{{asset('customer/img/slider/slider-1.jpg')}}" alt="slide" />
        <div class="text">
            <div> Lorem ipsum dolor sit amet consectetur</div>
            <div class="mt-15">
                <button class="btn btn-primary">
                    Contact US
                </button>
            </div>
        </div>
    </div>
    <div class="mySlides animate">
      <img class="w-100" src="{{asset('customer/img/slider/slider-2.jpg')}}" alt="slide" />
        <div class="text">
            <div> Lorem ipsum dolor sit amet consectetur</div>
            <div class="mt-15">
                <button class="btn btn-primary">
                    Contact US
                </button>
            </div>
        </div>
    </div>
    <div class="mySlides animate">
      <img class="w-100" src="{{asset('customer/img/slider/slider-3.jpg')}}" alt="slide" />
        <div class="text">
            <div> Lorem ipsum dolor sit amet consectetur</div>
            <div class="mt-15 bttn">
                <button class="btn btn-primary">
                    Contact US
                </button>
            </div>
        </div>
    </div>
    <!-- Next and previous buttons -->
    <a class="prev" onclick="prevSlide()">&#10094;</a>
    <a class="next" onclick="nextSlide()">&#10095;</a>
  </div>
{{-- <div class="slider-active swiper-container height">
    <div class="swiper-wrapper">
        <div class="swiper-slide slider-item">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider_images">
                            <img class="back" src="{{asset('customer/img/slider/slider-img-1.png')}}" alt="">
                            <img class="top" src="{{asset('customer/img/slider/text.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide slider-item">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider_images">
                            <img class="back" src="{{asset('customer/img/slider/slider-img-1.png')}}" alt="">
                            <img class="top" src="{{asset('customer/img/slider/text.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
</div> --}}
<div class="features-area d-none d-md-block fix">
    <div class="row g-0">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="fetures">
                <div class="fetures__thumb fix">
                    <img src="{{asset('customer/img/features/fe1.jpg')}}" alt="features1">
                </div>
                <div class="fetures__content">
                    <h4 class="feature-title mb-40">{{$category[0]['name']}}</h4>
                    <p class="d-md-none d-lg-block">all products <span class="discount">
                        <a href="#">up to 70% off</a></span> limited time discount</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="fetures">
                <div class="fetures__thumb fix">
                    <img src="{{asset('customer/img/features/banner-home2.jpg')}}" alt="features1">
                </div>
                <div class="fetures__content">
                    <h4 class="feature-title mb-40">{{$category[1]['name']}}</h4>
                    <p class="d-md-none d-lg-block">all products <span class="discount">
                        <a href="#">up to 70% off</a></span> limited time discount</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="fetures">
                <div class="fetures__thumb fix">
                    <img src="{{asset('customer/img/features/fe3.jpg')}}" alt="features1">
                </div>
                <div class="fetures__content">
                    <h4 class="feature-title mb-40">{{$category[2]['name']}}</h4>
                    <p class="d-md-none d-lg-block">all products <span class="discount">
                        <a href="#">up to 70% off</a></span> limited time discount</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- features area end  -->
    <!-- categories area start -->
    <div class="categories_area pt-85 mb-150">
        <div class="container-fluid">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="section-wrapper text-center mb-35">
                        <h2 class="section-title">Bestsellers</h2>
                        <p>Commodo sociosqu venenatis cras dolor sagittis integer luctus sem primis<br> eget maecenas sed urna malesuada.</p>
                    </div>
                </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="categories__tab">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home">
                                <div class="container">
                                    <div class="product-active h-2-product-active swiper-container">
                                        <div class="swiper-wrapper">
                                            @php
                                                $count = 0
                                            @endphp
                                            @foreach ($product as $pro )
                                            @if ($pro->bestsellers == 1)
                                                <div class="product-item swiper-slide wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                                                    <div class="product">
                                                        <div class="product__thumb">
                                                            <a href="{{route('index.singnleproduct',['name' => $pro->name, 'id'=>$pro->id])}}">
                                                                <input type="hidden" id="productId" value="{{$pro->id}}">
                                                                @for ($i=0;$i<count($pro->image); $i++)
                                                                    @if ($i == 0)
                                                                        <img class="product-primary" width="400px" height="400px" src="{{asset('product/'.$pro->image[$i]['name'])}}" alt="product_image">
                                                                    @elseif ($i == 1)
                                                                        <img class="product-secondary" width="400px" height="400px" src="{{('product/'.$pro->image[$i]['name'])}}" alt="product_image">
                                                                    @else
                                                                        @break
                                                                    @endif
                                                                @endfor
                                                            </a>
                                                            <div class="product-info mb-10">
                                                                <div class="product_category">
                                                                    @foreach ( $pro->category as  $key)
                                                                        <span>{{$key->name}}</span>
                                                                    @endforeach
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
                                                                <h4 ><a href="{{route('index.singnleproduct',['cat'=> $pro->category[0]['name'] ,'name' => $pro->name, 'id'=>$pro->id])}}">{{$pro->name}}</a></h4>
                                                                <div class="pro-price">
                                                                    <p class="p-absoulute pr-1"><span>$</span>{{$pro->price}}</p>
                                                                    <button class="btn btn-default p-absoulute pr-2 addToCart" data-id="{{ route('add.to.cart', $pro->id) }}">add to cart</button>
                                                                </div>
                                                            </div>
                                                    <div class="product__action">
                                                        <div class="inner__action">
                                                            <div class="wishlist"></div>
                                                            <div class="view">
                                                                <a id="viewProduct" href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                            </div>
                                                            <div class="layer"></div>
                                                        </div>
                                                    </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    @if ($count>6)
                                                        @break
                                                    @endif
                                                    @php
                                                        $count ++
                                                    @endphp
                                            @endif

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
    </div>
    <!-- categories area end -->



<!-- new product area start -->
<div class="new_product_area mb-80">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="section-wrapper text-center mb-35">
                            <h2 class="section-title"><a href="#">Explore Our New arrivals</a></h2>
                            <p>Commodo sociosqu venenatis cras dolor sagittis integer luctus sem primis<br> eget
                                maecenas sed urna malesuada.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product-active2 swiper-container">
                        <div class="swiper-wrapper">
                            @php
                                $count = 0
                            @endphp
                            @foreach ($product as $pro )
                            @if ($pro->newarrival==1)
                                <div class="product-item swiper-slide  wow fadeInLeft " data-wow-duration=".9s" data-wow-delay=".3s">
                                    <div class="product product-2">
                                        <div class="product__thumb">
                                            <a href="{{route('index.singnleproduct',['name' => $pro->name, 'id'=>$pro->id])}}">
                                                <input type="hidden" id="productId" value="{{$pro->id}}">
                                                @for ($i=0;$i<count($pro->image); $i++)
                                                    @if ($i == 0)
                                                        <img class="product-primary" width="287px" height="287px" src="{{asset('product/'.$pro->image[$i]['name'])}}" alt="product_image">
                                                    @elseif ($i == 1)
                                                        <img class="product-secondary" width="287px" height="287px" src="{{('product/'.$pro->image[$i]['name'])}}" alt="product_image">
                                                    @else
                                                        @break
                                                    @endif
                                                @endfor
                                            </a>
                                            <div class="product__update">
                                                <a class="#">new</a>
                                            </div>
                                            <div class="product-info mb-10">
                                                <div class="product_category">
                                                    @foreach ( $pro->category as  $key)
                                                        <span>{{$key->name}}</span>
                                                    @endforeach
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
                                                <h4 ><a href="{{route('index.singnleproduct',['cat'=> $pro->category[0]['name'] ,'name' => $pro->name, 'id'=>$pro->id])}}">{{$pro->name}}</a></h4>
                                                <div class="pro-price">
                                                    <p class="p-absoulute pr-1"><span>$</span>{{$pro->price}}</p>
                                                    <button class="btn btn-default p-absoulute pr-2 addToCart" data-id="{{ route('add.to.cart', $pro->id) }}">add to cart</button>
                                                </div>
                                            </div>
                                            <div class="product__action">
                                                <div class="inner__action">
                                                    <div class="wishlist">
                                                        <a href="#"><i class="fal fa-heart"></i></a>
                                                    </div>
                                                    <div class="view">
                                                        <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                    </div>
                                                    <div class="layer">
                                                        <a href="#"><i class="fal fa-layer-group"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($count>4)
                                    @break
                                @endif
                                @php
                                    $count ++
                                @endphp
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 padding-left">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12"></div>
                <div class="section-wrapper text-center mb-35">
                    <h2 class="section-title">Explore Our featured</h2>
                    <p>Commodo sociosqu venenatis cras dolor sagittis integer luctus sem primis<br> eget maecenas
                        sed urna malesuada.</p>
                </div>
                <div class="row">
                    <div class="product-active2 swiper-container">
                        <div class="swiper-wrapper">
                            @php
                                $count = 0
                            @endphp
                            @foreach ($product as $pro )
                            @if ($pro->featured==1)
                                <div class="product-item swiper-slide  wow fadeInLeft " data-wow-duration=".9s" data-wow-delay=".3s">
                                    <div class="product product-2">
                                        <div class="product__thumb">
                                            <a href="{{route('index.singnleproduct',['cat'=> $pro->category[0]['name'] ,'name' => $pro->name, 'id'=>$pro->id])}}">
                                                <input type="hidden" id="productId" value="{{$pro->id}}">
                                                @for ($i=0;$i<count($pro->image); $i++)
                                                    @if ($i == 0)
                                                        <img class="product-primary" width="287px" height="287px" src="{{asset('product/'.$pro->image[$i]['name'])}}" alt="product_image">
                                                    @elseif ($i == 1)
                                                        <img class="product-secondary" width="287px" height="287px" src="{{('product/'.$pro->image[$i]['name'])}}" alt="product_image">
                                                    @else
                                                        @break
                                                    @endif
                                                @endfor
                                            </a>
                                            {{-- <div class="product__update">
                                                <a class="#">new</a>
                                            </div> --}}
                                            <div class="product-info mb-10">
                                                <div class="product_category">
                                                    @foreach ( $pro->category as  $key)
                                                        <span>{{$key->name}}</span>
                                                    @endforeach
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
                                                <h4 ><a href="{{route('index.singnleproduct',['cat'=> $pro->category[0]['name'] ,'name' => $pro->name, 'id'=>$pro->id])}}">{{$pro->name}}</a></h4>
                                                <div class="pro-price">
                                                    <p class="p-absoulute pr-1"><span>$</span>{{$pro->price}}</p>
                                                    <button class="btn btn-default p-absoulute pr-2 addToCart" data-id="{{ route('add.to.cart', $pro->id) }}">add to cart</button>
                                                </div>
                                            </div>
                                            <div class="product__action">
                                                <div class="inner__action">
                                                    <div class="wishlist">
                                                        <a href="#"><i class="fal fa-heart"></i></a>
                                                    </div>
                                                    <div class="view">
                                                        <a href="javascript:void(0)"><i class="fal fa-eye"></i></a>
                                                    </div>
                                                    <div class="layer">
                                                        <a href="#"><i class="fal fa-layer-group"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($count>4)
                                    @break
                                @endif
                                @php
                                    $count ++
                                @endphp
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- new product area end -->

<!-- blog area start -->
<div class="blog-area mb-100">
    <div class="container">
        <div class="section-wrapper text-center mb-35">
            <h2 class="section-title"><a href="blog.html">from our blog</a></h2>
            <p>Commodo sociosqu venenatis cras dolor sagittis integer luctus sem primis<br> eget maecenas sed urna malesuada.</p>
            </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="blog" style="background-image: url('customer/img/blog/9.jpg');">
                    <div class="blog__content">
                        <span class="mb-15">Shoes, Clothing</span>
                        <h3 class="blog-title "><a href="blog.html">Mauris rhoncus aliquet purus</a></h3>
                        <p>By Erentheme /<span>September 16, 2019</span></p>
                        <a href="blog.html">Continue reading</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="bpost">
                    <div class="bpost__thumb">
                        <img src="customer/img/blog/blog1.jpg" alt="blog_post">
                    </div>
                    <div class="bpost__content">
                        <span>Shoes, Clothing</span>
                        <h3 class="blog-title title-2"><a href="blog.html">Simple & Easy DIY Flower Deco</a></h3>
                        <p>By <span>Erentheme </span>/September 16, 2019</p>
                        <p>Sapien luctus id justo suscipit nonummy eget hymenaeos...</p>
                    </div>
                </div>
                <div class="bpost">
                    <div class="bpost__thumb">
                        <img src="customer/img/blog/blog2.jpg" alt="blog_post">
                    </div>
                    <div class="bpost__content">
                        <span>Shoes, Clothing</span>
                        <h3 class="blog-title title-2"><a href="blog.html">Take A Look At The Most Photo</a></h3>
                        <p>By <span>Erentheme </span>/September 16, 2019</p>
                        <p>Sapien luctus id justo suscipit nonummy eget hymenaeos...</p>
                    </div>
                </div>
                <div class="bpost m-0">
                    <div class="bpost__thumb">
                        <img src="customer/img/blog/blog3.jpg" alt="blog_post">
                    </div>
                    <div class="bpost__content">
                        <span>Shoes, Clothing</span>
                        <h3 class="blog-title title-2"><a href="blog.html">Mauris rhoncus aliquet purus</a></h3>
                        <p>By <span>Erentheme </span>/September 16, 2019</p>
                        <p>Sapien luctus id justo suscipit nonummy eget hymenaeos...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog area end -->



<!-- popup area start -->
<div class="overlay"></div>
<div class="product-popup">
</div>
<!-- popup area end -->
@endsection
@section('scripts')
<script>
    // $('#viewProduct').click(function (e) {
    //    let pro = $('#productId').val();
    //    $.ajax({
    //        type: "POST",
    //        url: "{{route('index.getproduct')}}",
    //        data: {"id":pro ,"_token": "{{ csrf_token() }}"},
    //        success: function (response) {
    //            $('.product-popup').html('')
    //         $('.product-popup').append(response)
    //        }
    //    });

    // });

</script>
@endsection
