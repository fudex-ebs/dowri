<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/front2/css/font-awesome.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/front2/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/front2/css/bootstrap-rtl.css')}}">
    @if(app()->getLocale() == "en")
        <link rel="stylesheet" href="{{asset('/front2/css/ltr.css')}}">
    @endif

    <link rel="stylesheet" type="text/css" href="{{asset('/front2/plugins/menu/webslidemenu-ar.css')}}">
    <link href="{{asset('/front2/css/datepicker.min.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{asset('/front2/css/style.css')}}">

    <link href="{{asset('/front2/css/bootstrap-datetimepicker.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/dev.css')}}">


    @yield('page_css')
    <title>{{__('messages.dowri')}}</title>
</head><body>

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
             <div class="d-lg-none d-block search-mobile"><a href="#search"> {{__('messages.search_num')}} <i class="fa fa-search mr-2"></i></a></div>
            <!-- Mobile Header -->
            <nav class="wsmenu clearfix header_nav">
                <ul class="wsmenu-list">
                    <li aria-haspopup="true">
                        <a href="{{url('/')}}" class="active menuhomeicon">
                            <img src="{{asset('/front2/images/logo.png')}}" class="align-middle" alt="" width="60px">
                        </a>
                    </li>
                    <li aria-haspopup="true"><a href="#">{{__('messages.about_us')}}</a></li>
                    <li aria-haspopup="true"><a href="{{URL::to('tos')}}">{{__('messages.tos')}}</a></li>
                    <li aria-haspopup="true"><a href="{{URL::to('contact')}}">{{__('messages.contact_us')}}</a></li>
                    <!--<li aria-haspopup="true"><a href="{{URL::to('policy')}}">{{__('messages.privacy')}}</a></li>-->
                    <!--<li aria-haspopup="true"><a href="{{URL::to('toc')}}">{{__('messages.cancellation')}}</a></li>-->
                    <li class="media-search"><a href="#search"> <i class="fa fa-search align-middle ml-2"></i>{{__('messages.search_num')}}</a></li>
                    <li aria-haspopup="true">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <a href="{{ route('lang.switch', $lang) }}">{{__('messages.'.$language)}}</a>
                            @endif
                        @endforeach
                    </li>
                </ul>
            </nav>
            <!--End Nav -->


                <a href="javascript:void(0)" class="reserve">
                    <strong><img src="{{asset('/front2/images/call.png')}}" alt="">92000666</strong>
                </a>

        </div>
    </header>
    @if (session('search_status'))
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal ( "{{__('messages.search_result')}}" ,  "{{__('messages.no_search_result')}}" ,  "error" )
        </script>
    @php
        Session::forget('search_status');
    @endphp
@endif
    <!--End Header -->
    <div id="search">
    	<span class="close"><i class="fa fa-close"></i></span>
    	<form role="search" id="searchform" action="{{ route('reservation.find')}}" method="post">
        <input type='hidden' name='_token' value="{!! csrf_token() !!}">
    		<input value="" name="reservation_number" type="search" placeholder="{{__('messages.enter_num')}}"/>
           <button type="submit" class="btn btn-danger search-number">{{__('messages.search')}}</button>
    	</form>
    </div>
    @yield('content')



    <!--start Footer-->
    <footer class="d-flex flex-lg-row flex-column justify-content-md-between justify-content-center align-items-start">
        <div class="logo mb-3 order-lg-1 order-2">
            {{--<img src="{{asset('/front2/images/vision2030.png')}}" alt="">--}}
            <h4>
                {{__('messages.related_link')}}
            </h4>

            <ul class="links">
                <li>
                    <a href="{{URL::to('tos')}}">{{__('messages.tos')}}</a>
                </li>
                <li>
                    <a href="{{URL::to('policy')}}">{{__('messages.privacy')}}</a>
                </li>
                <li>
                    <a href="{{URL::to('toc')}}">{{__('messages.cancellation')}}</a>
                </li>
                <!--<li>-->
            <!--    <a href="#">{{__('messages.link')}} 4</a>-->
                <!--</li>-->


            </ul>
        </div>

        <div class="middle-footer order-2 text-center">
            <div class="line-wrap">
                <ul class="list-inline d-flex">


                {{--<li class="list-inline-item">--}}
                    {{--<span class="align-bottom"> {{__('messages.reserve')}}</span>--}}
                    {{--<img src="{{asset('/front2/images/pay-ico.png')}}" alt="">--}}
                {{--</li>--}}
                <li class="list-inline-item">
                    <span class="align-bottom">{{__('messages.pay')}}</span>
                    <img src="{{asset('/front2/images/pay-ico.png')}}" alt="">
                </li>
                    <li class="list-inline-item">
                        <span class="align-bottom">{{__('messages.select_time')}}</span>
                        <img src="{{asset('/front2/images/pay-ico.png')}}" alt="">
                    </li>
                <li class="list-inline-item">
                    <span class="align-bottom">{{__('messages.on_time')}}</span>
                    <img src="{{asset('/front2/images/pay-ico.png')}}" alt="">
                </li>
            </ul>
            </div>
            <ul class="list-inline mb-4">
                <li class="list-inline-item">
                    <img src="{{asset('/front2/images/visa.png')}}" alt="">
                </li>
                <li class="list-inline-item">
                    <img src="{{asset('/front2/images/mastercard.png')}}" alt="">
                </li>
                <li class="list-inline-item">
                    <img src="{{asset('/front2/images/maestro.png')}}" alt="">
                </li>
                <li class="list-inline-item">
                    <img src="{{asset('/front2/images/JCB-57.png')}}" alt="">
                </li>
                <li class="list-inline-item">
                    <img src="{{asset('/front2/images/JCB.png')}}" alt="">
                </li>
            </ul>
            <footer class="copyright">
                <div class="text-center">
                    <p class="m-0"> {{__('messages.copyright')}}</p>
                </div>
            </footer>
        </div>

        <div class="order-lg-3 order-first">
            <img src="{{asset('/front2/images/vision2030.png')}}" alt="">

        </div>
        {{--<button class="btn btn-secondary  order-lg-3 order-first" type="submit">--}}
            {{--<span><img src="{{asset('/front2/images/x-ico.png')}}" alt="" class="align-middle ml-1"></span>{{__('messages.cancel_reserve')}}--}}
        {{--</button>--}}
    </footer>
    <!--End Footer-->
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
{{--<script src="{{asset('/front2/js/moment-with-locales.min.js')}}"></script>--}}
{{--<script src="https://raw.githubusercontent.com/xsoh/moment-hijri/master/moment-hijri.js"></script>--}}

<script src="{{asset('/front2/js/jquery.min.js')}}"></script>
<script src="{{asset('/front2/js/popper.min.js')}}"></script>
<script src="{{asset('/front2/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/front2/plugins/menu/webslidemenu.js')}}"></script>
<script src="{{asset('/front2/js/datepicker.min.js')}}" type="text/javascript"></script>
{{-- Hijri Calender --}}

<script src="{{asset('/front2/js/custom.js')}}"></script>
<script src="{{asset('/hjri/jquery.calendars.min.js')}}"></script>
<script src="{{asset('/hjri/jquery.calendars.ummalqura.min.js')}}"></script>
{{--<script src="{{asset('/hjri/jquery.calendars.ummalqura-ar.js')}}"></script>--}}
<script src="{{asset('/hjri/bootstrap-calendars.min.js')}}"></script>
<script src="{{asset('/hjri/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
<script src="https://rawgit.com/abdennour/hijri-date/master/cdn/hijri-date-latest.js" type="text/javascript" ></script>
{{-- form validation --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>


@yield('page_js')
    <script>
        $.validate({
            modules : 'location, date, security, file',
        });
    </script>
</body>
</html>
