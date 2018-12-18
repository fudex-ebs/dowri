@extends('layouts.front')
@section('page_css')
    {{--    <link rel="stylesheet" href="{{asset('/front2/css/style.css')}}">--}}

@endsection

@section('content')
    {{--<section class="suitable">--}}
        {{--<h2> {{__('messages.contact_us')}}</h2>--}}
        {{--@if($errors->all())--}}

            {{--<div class="alert alert-danger">--}}
                {{--<ul>--}}
                    {{--@foreach ($errors->all() as $message)--}}
                        {{--<li> {{$message}}</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}

        {{--@endif--}}
        {{--@if(session('contact'))--}}
            {{--<div class="alert alert-success">--}}
                {{--<p> {{__('messages.contact_msg')}}</p>--}}
            {{--</div>--}}
        {{--@endif--}}
        {{--<form method="post" action="{{route('contact.store')}}" enctype="multipart/form-data">--}}
            {{--<input type='hidden' name='_token' value="{!! csrf_token() !!}">--}}

            {{--<div class="form-group mb-3 col-md-6 col-sm-6 col-6">--}}
                {{--<div class="input-group input remove-icon">--}}
                    {{--<div class="input-group-prepend p-3">--}}
                        {{--<div class="input-group-text"><img src="{{ asset('/front2/images/name.png') }}" width="26" height="18"></div>--}}
                        {{--<input type="text" class="form-control" placeholder="{{__('messages.name')}}" name="name"  value="{{ old('name') }}"--}}
                               {{--data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.name').' '.__('messages.required')}}</span>" >--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group mb-3 col-md-6 col-sm-6 col-6">--}}
                {{--<div class="input-group input remove-icon">--}}
                    {{--<div class="input-group-prepend p-3">--}}
                        {{--<div class="input-group-text"><img src="{{ asset('/front2/images/email.png') }}" width="26" height="18"></div>--}}
                        {{--<input type="email" class="form-control" placeholder="{{__('messages.email')}}" name="email" value="{{ old('email') }}"--}}
                               {{--data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.email').' '.__('messages.required')}}</span>" >--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group mb-3 col-md-6 col-sm-6 col-6">--}}
                {{--<div class="input-group input remove-icon">--}}
                    {{--<div class="input-group-prepend p-3">--}}
                        {{--<div class="input-group-text"><img src="{{ asset('/front2/images/mobile.png') }}" width="26" height="18"></div>--}}
                        {{--<input type="tel" class="form-control" placeholder="{{__('messages.mobile')}}" name="mobile_number" value="{{ old('mobile_number') }}"--}}
                               {{--data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.mobile').' '.__('messages.required')}}</span>" >--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group mb-3 col-md-6 col-sm-6 col-6">--}}
                {{--<div class="input-group input remove-icon">--}}
                    {{--<div class="input-group-prepend p-3">--}}
                        {{--<div class="input-group-text"><img src="{{ asset('/front2/images/name.png') }}" width="26" height="18"></div>--}}
                        {{--<textarea  placeholder="{{__('messages.content')}}" class="form-control" name="content" data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.content').' '.__('messages.required')}}</span>" >{{old('content')}}</textarea>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class=" mb-3 col-md-12 col-sm-12 col-12" >--}}
                {{--<div class=" input-group mb-3 col-md-12 col-sm-12 col-12">--}}
                    {{--<div class="text-right mt-md-2 mt-2 ">--}}
                        {{--<button class="btn btn-danger">{{__('messages.send')}}</button>--}}
                        {{--<button type="button" class="btn btn-info"><img src="{{ asset('/front2/images/x-ico.png') }}" width="28" height="29" class="align-middle ml-1"> {{__('messages.cancel')}}</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</form>--}}
    {{--</section>--}}
    <section class="suitable">

        <div class="container mt-4">

            <div class="row">
                <div class="col-12">
                    <h2><span>{{__("messages.contact_us")}} </span></h2>
                </div>
            </div>
            <div class="row">
                <div class=" col-12">

                    <div class="row bg-light pt-3 pb-3 mb-4">
                        <div class="col-lg-12">
                            <h6><strong>{{__("messages.address")}} :</strong></h6>
                        </div>
                        <div class="col-lg-6 col-6 c-con-add">
                            الدمام - الواحة - المملكة العربية السعودية
                        </div>
                        <div class="col-lg-6 col-6">
                            <p class="m-0 text-danger c-con-mobile"><i class="fa fa-phone-square" aria-hidden="true"></i>
                                +966 534567890
                            </p>
                            <p class="m-0 text-info"><i class="fa fa-envelope" aria-hidden="true"></i>
                                <a href="#" class="lin">Support@doari.co </a>
                            </p>
                        </div>

                    </div>

                    <div class="row bg-light pt-3 pb-3 mb-4">

                        <div class="col-lg-6 col-12">
                            @if($errors->all())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $message)
                                            <li> {{$message}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session('contact'))
                                <div class="alert alert-success">
                                    <p> {{__('messages.contact_msg')}}</p>
                                </div>
                            @endif
                            <form method="post" action="{{route('contact.store')}}" enctype="multipart/form-data" class="con-form">
                            <input type='hidden' name='_token' value="{!! csrf_token() !!}">

                            <div class="form-row mb-3">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="{{__('messages.name')}}" name="name"  value="{{ old('name') }}"
                                    data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.name').' '.__('messages.required')}}</span>" >
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="col">
                                    <input type="email" class="form-control" placeholder="{{__('messages.email')}}" name="email" value="{{ old('email') }}"
                                data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.email').' '.__('messages.required')}}</span>" >
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="col">
                                    <input type="tel" class="form-control" placeholder="{{__('messages.mobile')}}" name="mobile_number" value="{{ old('mobile_number') }}"
                                data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.mobile').' '.__('messages.required')}}</span>" >
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="col">
                                    <textarea  placeholder="{{__('messages.content')}}" class="form-control" name="content" rows="3" data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.content').' '.__('messages.required')}}</span>" >{{old('content')}}</textarea>
                                </div>
                            </div>

                            <div class="form-row mb-3" >
                                <div class=" input-group mb-3 col-md-12 col-sm-12 col-12 c-con-but">
                                    <div class="text-right mt-md-2 mt-2 ">
                                        <button class="btn btn-danger">{{__('messages.send')}}</button>
                                    </div>
                                </div>
                            </div>

                            </form>

                        </div>
                        <div class="col-lg-6 col-12">
                            <!--<div style="width: 100%"><iframe width="100%" height="300px" src="https://www.mapsdirections.info/en/custom-google-maps/map.php?width=100%&height=600&hl=ru&q=Malet%20St%2C%20London%20WC1E%207HU%2C%20United%20Kingdom+(Your%20Business%20Name)&ie=UTF8&t=&z=14&iwloc=A&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.mapsdirections.info/en/custom-google-maps/">Create Google Map</a> by <a href="https://www.mapsdirections.info/en/">Measure area on map</a></iframe></div>-->
                            <div class="icons">
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-linkedin"></i></a>
                                <a href=""><i class="fa fa-google"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
