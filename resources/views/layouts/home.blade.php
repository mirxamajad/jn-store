<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>JN | Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('icons/jn50.png')}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('customer/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('customer/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('customer/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('customer/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('customer/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('customer/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('customer/css/futura-std-font.css')}}">
    <link rel="stylesheet" href="{{asset('customer/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('customer/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('customer/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('customer/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('customer/css/responsive.css')}}">
    <script src="https://js.stripe.com/v3/"></script>
    <style>
       @media screen and (max-width: 1270px) {
        .main-menu ul li {
        margin-right: 10px;
        }
        .text {
            color: #f2f2f2;
            background-color: rgba(10, 10, 20, 0.1);
            backdrop-filter: blur(6px);
            border-radius: 10px;
            font-size: 20px !important;
            padding: 4px 6px;
            position: absolute;
            bottom: 30px;
            left: 25%;
            transform: translate(-50%);
            text-align: center;
        }
        .btn{
            padding: 5px;
            color:white;
            font-size: 15px !important;
        }
      }
      @media (min-width: 1271px) and (max-width: 1500px){

          .main-menu ul li {
              margin-right: 16px;
          }.text {
            color: #f2f2f2;
            background-color: rgba(10, 10, 20, 0.1);
            backdrop-filter: blur(6px);
            border-radius: 10px;
            font-size: 40px;
            padding: 8px 12px;
            position: absolute;
            bottom: 60px;
            left: 50%;
            transform: translate(-50%);
            text-align: center;
        }
        .btn{
            padding: 5px;
            color:white;
            font-size: 20px !important;
        }
      }
        .prev,.next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            transform: translate(0, -50%);
            width: auto;
            padding: 20px;
            color: white;
            font-weight: bold;
            font-size: 24px;
            border-radius: 0 8px 8px 0;
            background: rgba(173, 216, 230, 0.1);
            user-select: none;
            margin-top: 10rem;
        }
        .next {
            right: 0;
            border-radius: 8px 0 0 8px;
        }
        .prev:hover,.next:hover {
            background-color: rgba(173, 216, 230, 0.3);
        }
        @keyframes animate {
            from {
                transform: scale(1.1) rotateY(10deg);
            }
            to {
                transform: scale(1) rotateY(0deg);
            }
        }
        .text {
            color: #f2f2f2;
            background-color: rgba(10, 10, 20, 0.1);
            backdrop-filter: blur(6px);
            border-radius: 10px;
            font-size: 40px;
            padding: 8px 12px;
            position: absolute;
            bottom: 60px;
            left: 50%;
            transform: translate(-50%);
            text-align: center;
        }
    </style>
</head>

<body>

    @include('frontend.parts.header')
        <input type="hidden" id="modalShow" value="{{session('modal')}}">
        @yield('contant')
        @include('frontend.parts.footer')
        @include('frontend.parts.cart')
        <div id="checkOutDone" class="modal fade checkOutDone" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Order Status</h4>
                </div>
                <div class="modal-body">
                  <p>Your Order Successfully Submited</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
    {{-- <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/vendor/modernizr-3.5.0.min.js"></script> --}}
    <script src="{{asset('customer/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('customer/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('customer/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('customer/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('customer/js/one-page-nav-min.js')}}"></script>
    <script src="{{asset('customer/js/slick.min.js')}}"></script>
    <script src="{{asset('customer/js/jquery.meanmenu.min.js')}}"></script>
    <script src="{{asset('customer/js/countdown.js')}}"></script>
    <script src="{{asset('customer/js/ajax-form.js')}}"></script>
    <script src="{{asset('customer/js/wow.min.js')}}"></script>
    <script src="{{asset('customer/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('customer/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('customer/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('customer/js/plugins.js')}}"></script>
    <script src="{{asset('customer/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('customer/js/main.js')}}"></script>
    @yield('scripts')
    <script>
           $('.addToCart').click(function (e) {
                $.ajax({
                    url: $(this).attr("data-id"),
                    _method: 'GET',
                    success: function(respose) {
                        $(".cart__sidebar").load(location.href + " .cart__sidebar");
                        $('.counter').html();
                        $('.counter').html(respose);
                        // $('.cart__sidebar').addClass('open-cart');
                    }
                });
            });
        $(function () {
            let showModal = $('#modalShow').val();
            if (showModal) {
                alert('Order Success');
            }
        });
        function CartClose() {
           $('.cart__sidebar').removeClass('open-cart');
        }
        $('.view').on('click',function() {
            let pro = $('#productId').val();
            $.ajax({
                type: "POST",
                url: "{{route('index.getproduct')}}",
                data: {"id":pro ,"_token": "{{ csrf_token() }}"},
                success: function (response) {
                    $('.product-popup').html('')
                    $('.overlay,.product-popup').addClass('show-popup');
                        $('.product-popup').append(response)
                }
            });
        });
        function closePop() {
            $('.overlay,.product-popup').removeClass('show-popup');
        }
        let slideIndex = 0;
        showSlides();
        function nextSlide() {
            slideIndex++;
            showSlides();
            timer = _timer;
        }
        function prevSlide() {
            slideIndex--;
            showSlides();
            timer = _timer;
        }
        function currentSlide(n) {
            slideIndex = n - 1;
            showSlides();
            timer = _timer;
        }
        function showSlides() {
            let slides = document.querySelectorAll(".mySlides");
            let dots = document.querySelectorAll(".dots");
            if (slideIndex > slides.length - 1) slideIndex = 0;
            if (slideIndex < 0) slideIndex = slides.length - 1;
            slides.forEach((slide) => {
                slide.style.display = "none";
            });
            slides[slideIndex].style.display = "block";
            dots.forEach((dot) => {
                dot.classList.remove("active");
            });
            dots[slideIndex].classList.add("active");
        }
        let timer = 7;
        const _timer = timer;
        setInterval(() => {
            imer--;
            if (timer < 1) {
                nextSlide();
                timer = _timer; // reset timer
            }
        }, 1000); // 1sec
 </script>
</body>


<!-- Mirrored from themepure.net/template/gota/gota/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Jan 2022 18:23:00 GMT -->
</html>
@yield('styles')
