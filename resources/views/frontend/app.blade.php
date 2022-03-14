@extends('layouts.home')
@section('contant')
    <!-- gallary area start -->
    <div class="about__gallary service_page" data-background="{{asset('customer/img/about/about-2.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-4 col-md-4 offset-xl-1">
                    <div class="service-single">
                        <h3 class="mb-30">we are on our way</h3>
                        <p class="mb-40">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin <br> iaculis luctus leo ut lacinia. Nunc et augue pulvinar, luctus <br> mi non, sagittis odio. Phasellus congue sem nulla, non <br> sodales orci malesuada vel. Aliquam posuere mi eros, at <br> condimentum elit feugiat vel.</p>
                        <a href="service.html">read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- gallary area end -->

    <!-- service area start  -->
    <div class="m_service__area mb-100">
        <div class="container">
            <div class="service__wrapper text-center pt-100">
                <h2>our services</h2>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-4 offset-xl-1">
                    <div class="m_single_service pt-80">
                        <div class="m_single_service__thumb">
                            <img src="{{asset('customer/img/service/SEVICES_1-1.png')}}" alt="">
                        </div>
                        <div class="m_single_service__content">
                            <h5>PACKING</h5>
                            <p>Nunc et augue pulvinar, luctus mi non, sagittis odio. Phasellus congue sem nulla.non sodales orci malesu da vel. Aliquam mi eros. </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <div class="m_single_service pt-80">
                        <div class="m_single_service__thumb">
                            <img src="{{asset('customer/img/service/SERVICES_2-1.png')}}" alt="">
                        </div>
                        <div class="m_single_service__content">
                            <h5>MOVING</h5>
                            <p>Nunc et augue pulvinar, luctus mi non, sagittis odio. Phasellus congue sem nulla.non sodales orci malesu da vel. Aliquam mi eros. </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4">
                    <div class="m_single_service pt-80">
                        <div class="m_single_service__thumb">
                            <img src="{{asset('customer/img/service/SERVICES_3-1.png')}}" alt="">
                        </div>
                        <div class="m_single_service__content">
                            <h5>sTORAGE</h5>
                            <p>Nunc et augue pulvinar, luctus mi non, sagittis odio. Phasellus congue sem nulla.non sodales orci malesu da vel. Aliquam mi eros. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service area end  -->

    <!-- expert area start  -->
    <div class="expert__area mb-130">
        <div class="container">
            <div class="service__wrapper text-center mb-50">
                <h2>our expertise</h2>
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-5 offset-xl-1">
                    <div class="expert__thumb">
                        <img src="{{('customer/img/service/expertise-1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 pl-50">
                    <div class="expertsingle mb-60 pt-30">
                        <div class="expertsingle__thumb">
                            <span><i class="fal fa-car"></i></span>
                        </div>
                        <div class="expertsingle__content">
                            <h5>Fast delivery </h5>
                            <p>Nunc et augue pulvinar, luctus mi non, sagittis odio. <br> Phasellus congue sem nulla.non orci malesu da vel. <br> Aliquam posuere mi eros.</p>
                        </div>
                    </div>
                    <div class="expertsingle mb-60">
                        <div class="expertsingle__thumb expertsingle__content">
                            <h5>item inspection </h5>
                            <p>Nunc et augue pulvinar, luctus mi non, sagittis odio. <br> Phasellus congue sem nulla.non orci malesu da vel. <br> Aliquam posuere mi eros.</p>
                        </div>
                        <div class="expertsingle__content expertsingle__thumb">
                            <span><i class="fal fa-people-carry"></i></span>
                        </div>
                    </div>
                    <div class="expertsingle ">
                        <div class="expertsingle__thumb">
                            <span><i class="fal fa-box"></i></span>
                        </div>
                        <div class="expertsingle__content">
                            <h5>boxing service</h5>
                            <p>Nunc et augue pulvinar, luctus mi non, sagittis odio. <br> Phasellus congue sem nulla.non orci malesu da vel. <br> Aliquam posuere mi eros.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content" id="myTabCffontent">
        <div class="tab-pane fade show active" id="Description" role="tabpanel" >
        <div class="single_product_description text-center pt-80">
            {{-- <h2 class="title-5 border-0">YOUR NEW AND IMPROVED​</h2>
            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit <br> voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt <br> explicabo. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            <div class="desc__imag pt-70">
                <img src="{{asset('customer/img/desc/des1.jpg')}}" alt="">
            </div> --}}
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="desc__imag_2">
                        <img src="{{asset('customer/img/desc/images-d1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 pl-50">
                    <div class="desc_title_wrapper pt-100">
                        <h4>COMFORTABLE TO USE</h4>
                        <h2>QUICKEN YOUR TEMPO PACE</h2>
                    </div>
                    <div class="desc_image_content pt-30 mb-30">
                        <div class="desc-3_image">
                            <img src="{{asset('customer/img/desc/d1.jpg')}}" alt="">
                        </div>
                        <div class="desc-3_content">
                            <h4>Contrary to popular belief</h4>
                            <p>The gently rounded top together with the back and seat offers a variety of <br> comfortable seating positions, ideal for both long.</p>
                        </div>
                    </div>
                    <div class="desc_image_content mb-30">
                        <div class="desc-3_image">
                            <img src="{{asset('customer/img/desc/d2.jpg')}}" alt="">
                        </div>
                        <div class="desc-3_content">
                            <h4>Lorem Ipsum is not simply </h4>
                            <p>The gently rounded top together with the back and seat offers a variety of <br> comfortable seating positions, ideal for both long.</p>
                        </div>
                    </div>
                    <div class="desc_image_content mb-30">
                        <div class="desc-3_image">
                            <img src="{{asset('customer/img/desc/d3.jpg')}}" alt="">
                        </div>
                        <div class="desc-3_content">
                            <h4>If you are going to use</h4>
                            <p>The gently rounded top together with the back and seat offers a variety of <br> comfortable seating positions, ideal for both long.</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="show_product">
                <div class="desc__imag pt-70">
                    <img src="assets/img/desc/des2.jpg" alt="">
                </div>
            </div>
            <div class="show_product">
                <h2 class="title-5 border-0 pt-30">YOUR NEW AND IMPROVED​</h2>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit <br> voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt <br> explicabo. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <div class="desc__imag pt-70">
                    <img src="assets/img/desc/des3.jpg" alt="">
                </div>
            </div>
            <div class="show_product">
                <h2 class="title-5 border-0 pt-30">Meticulous and accurate design</h2>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit <br> voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt <br> explicabo. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            <div class="row pt-100">
                <div class="col xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="show_model_product mb-30">
                        <img src="assets/img/desc/a1.jpg" alt="">
                        <h4 class="pb-30">women’s running</h4>
                        <img src="assets/img/desc/b1.jpg" alt="">
                    </div>
                </div>
                <div class="col xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="show_model_product mb-30">
                        <img src="assets/img/desc/a1.jpg" alt="">
                        <h4 class="pb-30">men’s running</h4>
                        <img src="assets/img/desc/b1.jpg" alt="">
                    </div>
                </div>
                <div class="col xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="show_model_product mb-30">
                        <img src="assets/img/desc/a1.jpg" alt="">
                        <h4 class="pb-30">kid’s running</h4>
                        <img src="assets/img/desc/b3.jpg" alt="">
                    </div>
                </div>
            </div> --}}
        </div>

    </div>
    <!-- expert area end  -->
@endsection
