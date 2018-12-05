@extends('layouts.front')
@section('page_css')

@endsection
@section('content')
    <!--Start Form-->
    <section class="suitable">
        @if (isset($error))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{$error}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {{--@php--}}
            {{--Session::forget('code_error');--}}
            {{--@endphp--}}
        @endif
        <h2>خدمة الرسائل</h2>
        <div class=" mb-12 col-md-6 col-sm-6 col-12  myl">
            <ul   class="list-unstyled mylist " >
                <li  style="width:fit-content"><img src="{{ asset('/front2/images/sms.png') }}" width="44" height="22" > تم ارسال كود التفعيل الى  <span style="float: left;direction: ltr" > {{substr_replace($ReservationConfirm->reservation->user->mobile_number, '****', 3 , 4)}} </span></li>
                <li>سوف تتلقى رسالة نصية بكود التفعيل صالحة لمرة واحدة فقط </li>

            </ul>
            <form method="post" action="{{route('reservation.confirm_code',['Reservation' => $ReservationConfirm])}}" enctype="multipart/form-data">
                <input type='hidden' name='_token' value="{!! csrf_token() !!}">
                <div class="form-row form-row d-flex justify-content-md-start">

                    <div class="form-group mb-3 col-md-12 col-sm-6 col-12">

                        <div class="input-group input remove-icon">
                            <div class="input-group-prepend p-3">
                                <div class="input-group-text"><img src="{{ asset('/front2/images/code.png') }}" width="26" height="18"></div>
                                <input type="text" class="form-control" placeholder="كود التفعيل" name="verify_code" >
                            </div>
                        </div>
                    </div>


                    <div class=" mb-3 col-md-12 col-sm-12 col-12" >
                        <div class=" input-group mb-3 col-md-12 col-sm-12 col-12">
                            <div class="text-right mt-md-2 mt-2 ">
                                <button class="btn btn-danger">ارسال </button>
                                <button type="button" class="btn btn-info"><img src="{{ asset('/front2/images/x-ico.png') }}" width="28" height="29" class="align-middle ml-1"> الغاء</button>
                            </div>
                        </div>
                    </div>

                </div>

            </form>
    </section>


    <!--Start Form-->
    <section class="ad text-center mb-3">
        <div class="flex-row">
            <div class="col-md-12">
                <a href="javascript:void(0)">
                    <img src="{{ asset('/front2/images/ad.png') }}" alt="">
                </a>
            </div>
        </div>

    </section>

    <!--End Form -->
@endsection
@section('page_js')

@endsection
