<header class="header-area">
    <div class="gota_top bg-soft d-none d-sm-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="gota_lang">
                        <ul>
                            <li>
                                <a href="tel:888-5555-5555">Tel:888-5555-5555</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 offset-xl-5 col-lg-6 col-md-6 col-sm-6 text-end">
                    <div class="gota_right">
                        <ul>
                            <li><a href="{{ route('checkout.index') }}">Checkout</a></li>
                            @if (empty(Auth::user()->name))
                                <li>
                                    <a href="{{route('login')}}">
                                        Login & register
                                    </a>
                                </li>
                            @else
                                @if (Auth::user()->is_admin==1)
                                    <li>
                                        <a href="{{route('admin.route')}}">
                                            Dashboard
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('home')}}">
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                                            <div class="ms-3"><span>Logout</span></div>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </a>
                                    </li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gota_bottom position-relative">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 d-none d-sm-block">
                    <div class="gota_search">
                        <form class="search_form">
                            <button class="search_action"><i
                                    class="fal fa-search d-sm-none d-md-block"></i></button>
                            <input type="text" placeholder="search" />
                        </form>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-4 col-sm-4">
                    <div class="sidemenu sidemenu-1 d-lg-none d-md-block">
                        <a class="open" href="#"><i class="fal fa-bars"></i></a>
                    </div>
                    <div class="main-menu">
                        <nav id="mobile-menu">
                            <ul>

                                <li class=""><a href="{{ url('',) }}">Home </a></li>
                                <li class="position-static menu-item-has-children"><a href="{{ route('index.allproduct', ['id'=>$category[0]['id'] , 'slug'=> $category[0]['slug'], ] ) }}">{{$category[0]['name']}}</a>
                                    <ul class="mega_menu" data-background="{{asset('customer/img/mega-menu/product.jpg')}}">
                                        <li>
                                            @php
                                                $count=0
                                            @endphp
                                                <h4 class="mega_title">
                                                    <a href="{{ route('index.allsubproduct', ['cat'=>$category[0]['slug'],'id'=>$subcategory[0]['id'] , 'slug'=> $subcategory[0]['slug'], ])}}" class="mega_title">{{$subcategory[0]['name']}}</a>
                                                </h4>
                                                <ul class="mega_item">

                                                    @foreach ($men as $key)
                                                        <li>
                                                            <a href="{{ route('index.allchildproduct', ['subcate'=>$subcategory[0]['slug'],'id'=>$key->id,'slug'=>$key->slug]) }}">
                                                                {{$key->name}}
                                                            </a>
                                                        </li>
                                                        @if ($count<5)
                                                            @break
                                                        @endif
                                                        @php
                                                            $count++
                                                        @endphp
                                                    @endforeach

                                                </ul>
                                        </li>
                                        <li>
                                            @php
                                                $count=0
                                            @endphp
                                                <h4 class="mega_title">
                                                    <a href="{{ route('index.allsubproduct', ['cat'=>$category[0]['slug'],'id'=>$subcategory[1]['id'] , 'slug'=> $subcategory[1]['slug'], ])}}" class="mega_title">{{$subcategory[1]['name']}}</a>
                                                </h4>
                                                <ul class="mega_item">

                                                    @foreach ($women as $key)
                                                        <li>
                                                            <a href="{{ route('index.allchildproduct', ['subcate'=>$subcategory[1]['slug'],'id'=>$key->id,'slug'=>$key->slug]) }}">
                                                                {{$key->name}}
                                                            </a>
                                                        </li>
                                                        @if ($count<5)
                                                            @break
                                                        @endif
                                                        @php
                                                            $count++
                                                        @endphp
                                                    @endforeach

                                                </ul>
                                        </li>
                                        <li>
                                            @php
                                                $count=0
                                            @endphp
                                                <h4 class="mega_title">
                                                    <a  href="{{ route('index.allsubproduct', ['cat'=>$category[0]['slug'],'id'=>$subcategory[2]['id'] , 'slug'=> $subcategory[2]['slug'], ])}}" class="mega_title">{{$subcategory[2]['name']}}</a>
                                                </h4>
                                                <ul class="mega_item">

                                                    @foreach ($kids as $key)
                                                        <li>
                                                            <a href="{{ route('index.allchildproduct', ['subcate'=>$subcategory[2]['slug'],'id'=>$key->id,'slug'=>$key->slug]) }}">
                                                                {{$key->name}}
                                                            </a>
                                                        </li>
                                                        @if ($count<5)
                                                            @break
                                                        @endif
                                                        @php
                                                            $count++
                                                        @endphp
                                                    @endforeach

                                                </ul>
                                        </li>
                                        <li>

                                        </li>
                                    </ul>
                                </li>
                                <li class="position-static menu-item-has-children"><a href="{{ route('index.allproduct', ['id'=>$category[1]['id'] , 'slug'=> $category[1]['slug'], ] ) }}">{{$category[1]['name']}}</a>
                                    <ul class="mega_menu_2">
                                        <li data-background="{{asset('customer/img/mega-menu/product2.jpg')}}">
                                            <h4 class="mega_title_2">
                                                <a href="{{ route('index.allsubproduct', ['cat'=>$category[1]['slug'],'id'=>$subcategory[3]['id'] , 'slug'=> $subcategory[3]['slug'], ])}}" class="mega_title_2">{{$subcategory[3]['name']}}</a>
                                            </h4>
                                            <ul class="mega_item_2">
                                                @foreach ($fragrance as $key)
                                                    <li>
                                                        <a href="{{ route('index.allchildproduct', ['subcate'=>$subcategory[3]['slug'],'id'=>$key->id,'slug'=>$key->slug]) }}">
                                                            {{$key->name}}
                                                        </a>
                                                    </li>
                                                    @if ($count<5)
                                                        @break
                                                    @endif
                                                    @php
                                                        $count++
                                                    @endphp
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li data-background="{{asset('customer/img/mega-menu/product3.jpg')}}">
                                            <h4 class="mega_title_2">
                                                <a href="{{ route('index.allsubproduct', ['cat'=>$category[1]['slug'],'id'=>$subcategory[4]['id'] , 'slug'=> $subcategory[4]['slug'], ])}}">{{$subcategory[4]['name']}}</a>
                                            </h4>
                                            <ul class="mega_item_2">
                                                @foreach ($jewelery as $key)
                                                    <li>
                                                        <a href="{{ route('index.allchildproduct', ['subcate'=>$subcategory[4]['slug'],'id'=>$key->id,'slug'=>$key->slug]) }}l">
                                                            {{$key->name}}
                                                        </a>
                                                    </li>
                                                    @if ($count<5)
                                                        @break
                                                    @endif
                                                    @php
                                                        $count++
                                                    @endphp
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li data-background="{{asset('customer/img/mega-menu/product4.jpg')}}">
                                            <h4 class="mega_title_2">
                                                <a href="{{ route('index.allsubproduct', ['cat'=>$category[1]['slug'],'id'=>$subcategory[5]['id'] , 'slug'=> $subcategory[5]['slug'], ])}}" class="mega_title_2">{{$subcategory[5]['name']}}</a>
                                            </h4>
                                            <ul class="mega_item_2">
                                                @foreach ($makeups as $key)
                                                    <li>
                                                        <a href="{{ route('index.allchildproduct', ['subcate'=>$subcategory[5]['slug'],'id'=>$key->id,'slug'=>$key->slug]) }}">
                                                            {{$key->name}}
                                                        </a>
                                                    </li>
                                                    @if ($count<5)
                                                        @break
                                                    @endif
                                                    @php
                                                        $count++
                                                    @endphp
                                                @endforeach
                                            </ul>
                                        </li>
                                        {{-- <li data-background="{{asset('customer/img/mega-menu/product3.jpg')}}">
                                            <h4 class="mega_title_2">Helmet for Women’s</h4>
                                            <ul class="mega_item_2">
                                                <li><a href="shop.html">Arsenal Home Jersey</a></li>
                                                <li><a href="shop.html">Arsenal Home Jersey</a></li>
                                                <li><a href="shop.html">Pellentesque posuere</a></li>
                                                <li><a href="shop.html">Running 3-Stripes</a></li>
                                                <li><a href="shop.html">Running 3-Stripes</a></li>
                                                <li><a href="shop.html">V-Neck T-Shirt</a></li>
                                                <li><a href="shop.html">WordPress Pennant</a></li>
                                            </ul>
                                        </li>
                                        <li data-background="{{asset('customer/img/mega-menu/product4.jpg')}}">
                                            <h4 class="mega_title_2">Basketball</h4>
                                            <ul class="mega_item_2">
                                                <li><a href="shop.html">East Hampton Fleece</a></li>
                                                <li><a href="shop.html">Faxon Canvas Low</a></li>
                                                <li><a href="shop.html">Habitasse dictumst</a></li>
                                                <li><a href="shop.html">Kaoreet lobortis</a></li>
                                                <li><a href="shop.html">NikeCourt Zoom Prestige</a></li>
                                                <li><a href="shop.html">NikeCourts Air Zoom</a></li>
                                                <li><a href="shop.html">NikeCourts Air Zoom</a></li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('index.allproduct', ['id'=>$category[2]['id'] , 'slug'=> $category[2]['slug'], ] ) }}">
                                        {{$category[2]['name']}}
                                    </a>
                                </li>
                                <li>
                                    <a class="d-none d-xl-block" href="{{ url('') }}">
                                        <img class="pl-10 pr-10" width="75%" src="{{asset('customer/img/logo/jnstore.png')}}" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('index.allproduct', ['id'=>$category[3]['id'] , 'slug'=> $category[3]['slug'], ] ) }}">
                                        {{$category[3]['name']}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('index.allproduct', ['id'=>$category[4]['id'] , 'slug'=> $category[4]['slug'], ] ) }}">
                                        {{$category[4]['name']}}
                                    </a>
                                </li>
                                <li >
                                    <a href="{{ route('index.allproduct', ['id'=>$category[6]['id'] , 'slug'=> $category[6]['slug'], ] ) }}">
                                        {{$category[6]['name']}}
                                    </a>

                                </li>
                                <li class="menu-item-has-children"><a href="about.html">Company</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">about us</a></li>
                                        <li><a href="#">contact</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                    <div class="gota_cart gotat_cart_1 text-end">
                        <a href="javascript:void(0)">
                            <i class="fal fa-shopping-cart"></i>My Cart
                            <span class="counter" id="counter">
                                @if (session('cart'))
                                    {{ count((array) session('cart')) }}
                                @endif
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
{{-- <img src="{{asset('icons/jn50.png')}}" alt="">/ --}}
{{-- <div class="fix">
    <div class="side-info">
        <button class="side-info-close"><i class="fal fa-times"></i></button>
        <div class="side-info-content">
            <div class="mobile-menu"></div>
        </div>
    </div>
</div>
<div class="offcanvas-overlay"></div> --}}
