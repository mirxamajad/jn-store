<footer class="footer_area fix">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="company__info  wow fadeInUp " data-wow-duration=".s" data-wow-delay=".3s">
                    <h3 class="f-title">contact info</h3>
                    <ul>
                        <li>Add: 734 Riverwood Drive, Suite 245 Cottonwood </li>
                        <li>Beverly Hill, Melbourne, USA.</li>
                        <li>Email: <a href="mailto:jnbusiness.store786@gmail.com" class="__cf_email__">jnbusiness.store786@gmail.com</a></li>
                        <li>Phone: <a href="tel: (+100) 786 779 7975">(+100) 786 779 7975</a>  </li>
                    </ul>
                    <div class="social__media mb-30">
                        <h3 class="f-title">Our Aplication</h3>
                        <a href="{{ route('index.app') }}"><i class="fab fa-brands fa-app-store"></i></a>
                        <a href="{{ route('index.app') }}"><i class="fab fa-brands fa-google-play"></i></a>
                        {{-- <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#"><i class="fab fa-dribbble"></i></a> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12">
                <div class="company__info wow fadeInUp " data-wow-duration=".7s" data-wow-delay=".4s">
                    <h3 class="f-title">Company</h3>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12">
                <div class="company__info wow fadeInUp " data-wow-duration=".8s" data-wow-delay=".5s">
                    <h3 class="f-title">Products</h3>
                    <ul>
                        <li>
                            <a href="{{ route('index.allproduct', ['id'=>$category[0]['id'] , 'slug'=> $category[0]['slug'], ] ) }}">
                                {{$category[0]['name']}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('index.allproduct', ['id'=>$category[1]['id'] , 'slug'=> $category[1]['slug'], ] ) }}">
                                {{$category[1]['name']}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('index.allproduct', ['id'=>$category[2]['id'] , 'slug'=> $category[2]['slug'], ] ) }}">
                                {{$category[2]['name']}}
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
                        <li>
                            <a href="{{ route('index.allproduct', ['id'=>$category[5]['id'] , 'slug'=> $category[5]['slug'], ] ) }}">
                                {{$category[5]['name']}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('index.allproduct', ['id'=>$category[6]['id'] , 'slug'=> $category[6]['slug'], ] ) }}">
                                {{$category[6]['name']}}
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-xl-3 offset-xl-1 col-lg-6 col-md-6 col-sm-12">
                <div class="company__info wow fadeInUp " data-wow-duration=".9s" data-wow-delay=".6s">
                    <h3 class="f-title">get in touch</h3>
                    <p>Sign up for all the news about our latest arrivals and<br>
                        get an exclusive early access shopping. Join <br>
                        <span>60.000+ Subscribers</span> and get a new discount coupon<br> on every Saturday.
                    </p>
                    <div class="subscribe pt-20">
                        <form action="#">
                            <input type="email" placeholder="Enter your email here..." />
                            <button>Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom pb-10 mt-60">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 ">
                    <p>Copyright © <span>Uni Software</span> All Rights Reserved. Powered by <span><a href="#">Uni Software</a></span>
                    </p>
                </div>
                {{-- <div class="col-xl-5 offset-xl-2 col-lg-4 col-md-6 col-sm-12">
                    <div class="footer-menu">
                        <ul class="text-end">
                            <li><a href="contact.html">Site Map</a></li>
                            <li><a href="accordion.html">Search Terms</a></li>
                            <li><a href="shop.html">Advanced Search </a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</footer>
