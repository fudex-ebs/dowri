@extends('layouts.front')
@section('page_css')

@endsection
@section('content')
<!--Start Form-->
<section class="suitable">
    <h2> {{__('messages.add_reserve')}}</h2>
    @if($errors->all())

        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $message)
                    <li> {{$message}}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <form method="post" action="{{route('reservation.store',['center_id' => $center_id ,'date' => $date,'time' =>$time])}}" enctype="multipart/form-data" novalidate>
    <input type='hidden' name='_token' value="{!! csrf_token() !!}">
    <div class="form-row form-row d-flex justify-content-md-center">
        <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
            <div class="input-group input remove-icon">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/name.png') }}" alt="">
                    </div>
                    <input type="text" class="form-control" placeholder="{{__('messages.first_name')}}" name="first_name" value="{{ old('first_name') }}"
                           data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.first_name').' '.__('messages.required')}}</span>">
                </div>
            </div>
        </div>
        <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
            <div class="input-group input remove-icon">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/name.png') }}" alt="">
                    </div>
                    <input type="text" class="form-control" placeholder="{{__('messages.last_name')}}" name="last_name" value="{{ old('last_name') }}"
                           data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.last_name').' '.__('messages.required')}}</span>" >
                </div>
            </div>
        </div>

        <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
            <div class="input-group input remove-icon">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/mobile.png') }}" alt="">
                    </div>
                    <input type="tel" class="form-control" placeholder="{{__('messages.mobile')}}"  name="mobile_number" id="mobile_number" value="{{ old('mobile_number') }}"
                           data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.mobile').' '.__('messages.required')}}</span>" >
                </div>
            </div>
        </div>

        <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
            <div class="input-group input remove-icon">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/email.png') }}" alt="">
                    </div>
                    <input type="text" class="form-control" placeholder="{{__('messages.email')}}" name="email" value="{{ old('email') }}"
                           data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.email').' '.__('messages.required')}}</span>" >
                </div>
            </div>
        </div>

        <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
            <div class="input-group input remove-icon">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/board-number.png') }}" alt="">
                    </div>
                    <input type="text" class="form-control" placeholder="{{__('messages.plate_part_1')}}" name="plate_number_1" value="{{ old('plate_number_1') }}"
                           data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.plate_num').' '.__('messages.required')}}</span>"><span>-</span>
                    <input type="text" class="form-control" placeholder="{{__('messages.plate_part_2')}}" name="plate_number_2" value="{{ old('plate_number_2') }}"
                           data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.plate_num').' '.__('messages.required')}}</span>">
                </div>
            </div>
        </div>

        <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
            <div class="input-group input remove-icon">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/vin-number.png') }}" alt="">
                    </div>
                    <input type="text" class="form-control" placeholder="{{__('messages.serial_num')}}" name="serial_number" value="{{ old('serial_number') }}"
                           data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.serial_num').' '.__('messages.required')}}</span>" >

                </div>
            </div>
        </div>
        <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
            <div class="input-group input remove-icon">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/vin-number.png') }}" alt="">
                    </div>
                    <select class="form-control custom-select my-select" name="manufacture_year" value="{{ old('manufacture_year') }}"
                            data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.manufacture_year').' '.__('messages.required')}}</span>" >
                      <option selected disabled value="">{{__('messages.manufacture_year')}} </option>
                      @for($counter_year = date("Y");$counter_year >= 1990 ; $counter_year--)
                      <option >{{$counter_year}}</option>
                      @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group mb-3 col-md-4 col-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/cars.png') }}" alt=""> </div>
                </div>
                <select id="inputState" class="form-control custom-select my-select" name="model" value="{{ old('model') }}"
                        data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.model').' '.__('messages.required')}}</span>" >
                    <option selected disabled value="">{{__('messages.model')}}</option>
                    <option name="toyota">{{__('messages.toyota')}}</option>
                    <option name="hyundai">{{__('messages.hyundai')}} </option>


                </select>
            </div>
        </div>

        <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
            <div class="input-group input remove-icon">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/vin-number.png') }}" alt="">
                    </div>
                    <input type="text" class="form-control" placeholder="{{__('messages.expire_date')}}" name="register_expire_date" id="datepicker"  value="{{ old('register_expire_date') }}"
                           data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.expire_date').' '.__('messages.required')}}</span>" >
                </div>
            </div>
        </div>



        <div class="form-group mb-3 col-md-4 col-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/cars.png') }}" alt=""> </div>
                </div>
                <select id="car_type" class="form-control custom-select my-select" name="car_type_id" value="{{ old('car_type_id') }}"
                        data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.car_type').' '.__('messages.required')}}</span>" >
                    <option selected disabled value="">{{__('messages.car_type')}}</option>
                    @foreach($car_types as $car_type)
                    <option value="{{$car_type->id}}" car_type_price="{{$car_type->price}}" >{{App::getLocale()=="ar" ? $car_type->name_ar : $car_type->name_en}}</option>
                    @endforeach

                </select>
            </div>
        </div>

        <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
            <div class="input-group input remove-icon">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/vin-number.png') }}" alt="">
                    </div>
                    <input type="text" class="form-control" placeholder="{{__('messages.discount_code')}}" name="discount_code" value="{{old('discount_code')}}" >
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-md-2 mt-2 tos-error">
        <ul style="list-style: none">
            {{--<li>لا يحق استخدام الموقع للأشخاص الغير قادرين على تمثيل أنفسهم قانونياً  </li>--}}
            {{--<li>لا يجوز لك بتاتاً أن تنتهك او تحاول انتهاك الحماية الأمنية للموقع الإلكتروني  </li>--}}
            {{--<li><a href="{{URL::to('tos')}}" target="_blank">{{__('messages.tos_link')}} </a></li>--}}
        </ul>
        <input type="checkbox" name="tos_agree"
               data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.tos_accept')}}</span>" /><strong><a href="{{URL::to('tos')}}" target="_blank"> {{__('messages.tos_agree')}} <a /></strong>

    </div>
    <div class="text-center mt-md-2 mt-2 c-btn-group">
        <button type="button" id="btn-price" class="btn btn-danger ">{{__('messages.tic_price')}}<strong> # </strong> {{__('messages.ryal')}} </button>
        <button class="btn btn-info">{{__('messages.pay')}}</button>
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
<script>
    $(document).ready(function() {
        const nowGreg = new Date();
        const nowHijri = nowGreg.toHijri();
        console.log(new Date());
        $('#datepicker').datetimepicker({
            // uiLibrary: 'bootstrap4',
            locale: {
                calender: 'ummalqura',
                lang: 'ar'
            },
            format: 'YYYY-MM-DD',

        });
    });

    // $('#datepicker').datepicker({
    //             uiLibrary: 'bootstrap4',
    //     //
    //             format:'yyyy-mm-dd',
    //     //         format: 'DD/MM/YYYY',
    //             minDate: new Date(),
    //             icons: {
    //                 rightIcon: '<i class="fa fa-angle-down"></i>'
    //             }
    //         });
  $("#car_type").change(function(){
    $("#btn-price strong").text($("#car_type option:selected").attr("car_type_price"));
  });

  $("#mobile_number").keypress(function (e){
    if( (e.which < 48 || e.which > 57 || e.which != 8)){
      return false;
    }
    if($(this).val().length === 0 && e.which != 48){
      return false;
    }
    if($(this).val().length === 1 && e.which != 53){
      return false;
    }
    if($(this).val().length === 10 ){
      return false;
    }
  });
</script>
@endsection
