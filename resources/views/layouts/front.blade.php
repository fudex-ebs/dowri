<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/front2/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,700" rel="stylesheet">
    <link rel="stylesheet" href="/front2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/front2/css/bootstrap-rtl.css">

    <link rel="stylesheet" type="text/css" href="/front2/plugins/menu/webslidemenu-ar.css">
    <link href="/front2/css/datepicker.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/front2/css/rtl.css">
    @yield('page_css')
    <title>دوري</title>
</head>
<body>

<div class="container-fluid">
    <div id="preloader">
        <div class="classy-load"></div>
    </div>
    <!--End Loader -->

    <!--Start Header -->
    <header>
        <div class="d-flex justify-content-between">
            <!--Start Nav -->
            <!-- Mobile Header -->
            <div class="wsmobileheader clearfix ">
                <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
            </div>
             <div class="d-lg-none d-block search-mobile"><a href="#search">  رقم الحجز <i class="fa fa-search mr-2"></i></a></div>
            <!-- Mobile Header -->
            <nav class="wsmenu clearfix header_nav">
                <ul class="wsmenu-list">
                    <li aria-haspopup="true">
                        <a href="{{url('/')}}" class="active menuhomeicon">
                            <img src="/front2/images/logo.png" class="align-middle" alt="" width="60px">
                        </a>
                    </li>
                    <li aria-haspopup="true"><a href="#">من نحن</a></li>
                    <li aria-haspopup="true"><a href="#">شروط الاستخدام</a></li>
                    <li aria-haspopup="true"><a href="#">اتصل بنا</a></li>
                    <li class="media-search"><a href="#search"> <i class="fa fa-search align-middle ml-2"></i> رقم الحجز</a></li>

                </ul>
            </nav>
            <!--End Nav -->


                <a href="javascript:void(0)" class="reserve">
                    <strong><img src="/front2/images/call.png" alt="">92000666</strong>
                </a>

        </div>
    </header>
    <!--End Header -->
    <div id="search">
    	<span class="close"><i class="fa fa-close"></i></span>
    	<form role="search" id="searchform" action="{{ route('reservation.find')}}" method="post">
        <input type='hidden' name='_token' value="{!! csrf_token() !!}">
    		<input value="" name="reservation_number" type="search" placeholder="أدخل رقم الحجز!"/>
           <button type="submit" class="btn btn-danger search-number">بـحث</button>
    	</form>
    </div>
    @yield('content')



    <!--start Footer-->
    <footer class="d-flex flex-lg-row flex-column justify-content-md-between justify-content-center align-items-start">
        <div class="logo mb-3 order-lg-1 order-2">
            <img src="/front2/images/vision2030.png" alt="">
        </div>

        <div class="middle-footer order-2 text-center">
            <div class="line-wrap">
                <ul class="list-inline d-flex">

                <li class="list-inline-item">
                    <span class="align-bottom">اختر الوقت المناسب</span>
                    <img src="/front2/images/pay-ico.png" alt="">
                </li>
                <li class="list-inline-item">
                    <span class="align-bottom">احجز</span>
                    <img src="/front2/images/pay-ico.png" alt="">
                </li>
                <li class="list-inline-item">
                    <span class="align-bottom">ادفع</span>
                    <img src="/front2/images/pay-ico.png" alt="">
                </li>
                <li class="list-inline-item">
                    <span class="align-bottom">احضر في موعدك</span>
                    <img src="/front2/images/pay-ico.png" alt="">
                </li>
            </ul>
            </div>
            <ul class="list-inline mb-4">
                <li class="list-inline-item">
                    <img src="/front2/images/visa.png" alt="">
                </li>
                <li class="list-inline-item">
                    <img src="/front2/images/mastercard.png" alt="">
                </li>
                <li class="list-inline-item">
                    <img src="/front2/images/maestro.png" alt="">
                </li>
                <li class="list-inline-item">
                    <img src="/front2/images/JCB-57.png" alt="">
                </li>
                <li class="list-inline-item">
                    <img src="/front2/images/JCB.png" alt="">
                </li>
            </ul>
            <footer class="copyright">
                <div class="text-center">
                    <p class="m-0">Copyright © 2018. Dory. All rights reserved </p>
                </div>
            </footer>
        </div>

        <button class="btn btn-secondary  order-lg-3 order-first" type="submit">
            <span><img src="/front2/images/x-ico.png" alt="" class="align-middle ml-1"></span> الغاء الحجز
        </button>
    </footer>
    <!--End Footer-->
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="/front2/js/jquery.min.js"></script>
<script src="/front2/js/popper.min.js"></script>
<script src="/front2/js/bootstrap.min.js"></script>
<script src="/front2/plugins/menu/webslidemenu.js"></script>
<script src="/front2/js/datepicker.min.js" type="text/javascript"></script>
<script src="/front2/js/custom.js"></script>
@yield('page_js')

</body>
</html>
