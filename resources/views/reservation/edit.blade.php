@extends('layouts.front')
@section('page_css')

@endsection
@section('content')
    <!--Start Form-->
    <section class="suitable">
        <h2>  {{__('messages.edit_title')}}</h2>
        <div class="alert alert-danger" id="error" style="display: none">
            <ul>
                    <li>{{__('messages.invalid_error')}} </li>
            </ul>
        </div>
        @if($errors->all())

                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $message)
                        <li> {{$message}}</li>
                        @endforeach
                    </ul>
                </div>

        @endif
        <form method="post" action="{{ route('reservation.update',['slug' => $reservation->slug ])}}" enctype="multipart/form-data" novalidate>
            <input type='hidden' name='_token' value="{!! csrf_token() !!}">
            <div class="form-row form-row d-flex justify-content-md-center">
                {{-- center data --}}
                <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
                    <label>{{__('messages.reserve_city')}} *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><img src="{{ asset('/front2/images/city.png') }}" alt=""> </div>
                        </div>
                        <select id="city" class="form-control custom-select my-select" name="reserve_city_id">
                            <option  disabled >{{__('messages.select_city')}}</option>
                            @foreach($cities as $city)
                                <option {{ ($reservation->inspection_center->city->name_ar == $city) ? "selected" : "" }} value="{{$city->id}}">{{ App::getLocale()=="ar" ? $city->name_ar : $city->name_en }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
                    <label>{{__('messages.reserve_center')}} *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><img src="{{ asset('/front2/images/city.png') }}" alt=""> </div>
                        </div>
                        <select id="center" class="form-control custom-select my-select" name="reserve_center_id">
                            <option  disabled class="disabled">{{__('messages.select_center')}}</option>
                            @foreach($centers as $center)
                                <option {{ ($reservation->inspection_center->name == $center) ? "selected" : "" }} class="hide" value="{{$center->id}}" city_id="{{$center->city->id}}" >{{ App::getLocale()=="ar" ? $center->name : $center->name_en}}</option>

                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
                    <label>{{__('messages.reserve_date')}} *</label>
                    <div class="input-group input remove-icon">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <img src="{{ asset('/front2/images/vin-number.png') }}" alt="">
                            </div>
                            <input type="text" class="form-control" placeholder="{{__('messages.select_date')}}" name="reserve_date" id="datepicker1" value="{{$reservation->date}}" data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.date').' '.__('messages.required')}}</span>" >
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
                    <label>{{__('messages.reserve_time')}} *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><img src="{{ asset('/front2/images/vin-number.png') }}" alt=""> </div>
                        </div>
                        <select id="time_period" class="form-control custom-select my-select" name="reserve_period">
                            <option  disabled class="disabled">{{__('messages.select_period')}}</option>
                            @foreach($periods as $period)
                                <option {{ ($reservation->time_period == $period) ? "selected" : "" }} value="{{$period}}">{{time_format($period)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{----}}
                @php
                $name = $reservation->user->name;
                $names = explode(" " , $name) ;
                @endphp
                <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
                    <label>{{__('messages.first_name')}} *</label>
                    <div class="input-group input remove-icon">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <img src="{{ asset('/front2/images/name.png') }}" alt="">
                            </div>
                            <input type="text" class="form-control" placeholder="{{__('messages.first_name')}}" name="first_name" value="{{$names[0]}}" data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.first_name').' '.__('messages.required')}}</span>">
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
                    <label>{{__('messages.last_name')}} *</label>
                    <div class="input-group input remove-icon">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <img src="{{ asset('/front2/images/name.png') }}" alt="">
                            </div>
                            <input type="text" class="form-control" placeholder="{{__('messages.last_name')}}" name="last_name" value="{{$names[1]}}"
                                   data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.first_name').' '.__('messages.required')}}</span>">
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
                    <label>{{__('messages.mobile')}} *</label>
                    <div class="input-group input remove-icon">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <img src="{{ asset('/front2/images/mobile.png') }}" alt="">
                            </div>
                            <input type="text" class="form-control" placeholder="{{__('messages.mobile')}}"  name="mobile_number" id="mobile_number" value="{{$reservation->user->mobile_number}}"
                                   data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.mobile').' '.__('messages.required')}}</span>" >
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
                    <label>{{__('messages.email')}} *</label>
                    <div class="input-group input remove-icon">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <img src="{{ asset('/front2/images/email.png') }}" alt="">
                            </div>
                            <input type="text" class="form-control" placeholder="{{__('messages.email')}}" name="email" value="{{$reservation->user->email}}"
                                   data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.email').' '.__('messages.required')}}</span>" >
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
                    @php
                        $chars = explode("-",$reservation->car->plate_number)[0];
                        $string = preg_replace('/\s+/', '', $chars);
                        $char1 = mb_substr($string, 0, 1, "UTF-8");
                        $char2 = mb_substr($string, 1, 1, "UTF-8");
                        $char3 = mb_substr($string, 2, 2, "UTF-8");
                    @endphp
                    <label>{{__('messages.plate_part_1')}} * </label>
                    <div class="input-group input remove-icon">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <img src="{{ asset('/front2/images/board-number.png') }}" alt="">
                            </div>

                            <div class="col-md-3 col-sm-3 new-padding"><input type="text" class="form-control char-inputs" placeholder="{{__('messages.char')}}"  name="char1" value="{{$char1}}" maxlength="1" data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.plate_num').' '.__('messages.required')}}</span>" ></div><span class="hyphen">&#x2011;</span>
                            <div class="col-md-3 col-sm-3 new-padding"><input type="text" class="form-control char-inputs" placeholder="{{__('messages.char')}}" name="char2" value="{{$char2}} " maxlength="1" data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.plate_num').' '.__('messages.required')}}</span>" ></div><span class="hyphen">&#x2011;</span>
                            <div class="col-md-3 col-sm-3 new-padding"><input type="text" class="form-control char-inputs" placeholder="{{__('messages.char')}}" name="char3" value="{{$char3}}" maxlength="1" data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.plate_num').' '.__('messages.required')}}</span>" ></div>

                        </div>
                    </div>
                </div>
                <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
                    <label>{{__('messages.plate_part_2')}} *</label>
                    <div class="input-group input remove-icon">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <img src="{{ asset('/front2/images/vin-number.png') }}" alt="">
                            </div>
                            <input type="text" class="form-control" placeholder="{{__('messages.plate_part_2')}}" name="plate_number_2" value="{{explode("-",$reservation->car->plate_number)[1]}}"
                                data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.plate_num').' '.__('messages.required')}}</span>" >
                        </div>
                    </div>
            </div>
                <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
                    <label>{{__('messages.serial_num')}} *</label>
                    <div class="input-group input remove-icon">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <img src="{{ asset('/front2/images/vin-number.png') }}" alt="">
                            </div>
                            <input type="text" class="form-control" placeholder="{{__('messages.serial_num')}}" name="serial_number" value="{{$reservation->car->serial_number}}"
                                   data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.serial_num').' '.__('messages.required')}}</span>" >
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
                    <label>{{__('messages.manufacture_year')}} *</label>
                    <div class="input-group input remove-icon">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <img src="{{ asset('/front2/images/vin-number.png') }}" alt="">
                            </div>
                            <select class="form-control custom-select my-select" name="manufacture_year"
                                    data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.manufacture_year').' '.__('messages.required')}}</span>">
                                <option selected disabled value="">{{__('messages.manufacture_year')}} </option>
                                @for($counter_year = date("Y");$counter_year >= 1990 ; $counter_year--)
                                    <option {{ ($reservation->car->manufacture_year == $counter_year) ? "selected" : "" }}>{{$counter_year}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3 col-md-4 col-12">
                    <label>{{__('messages.model')}} *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <img src="{{ asset('/front2/images/cars.png') }}" alt=""> </div>
                        </div>
                        <select id="inputState" class="form-control custom-select my-select" name="model" data-validation="required"
                                data-validation-error-msg-required="<span class='jq-error'>{{__('messages.model').' '.__('messages.required')}}</span>" >
                            <option  disabled value="">{{__('messages.model')}}</option>
                            <option  {{ ($reservation->car->model == "تيوتا") ? "selected" : "" }} name="toyota">{{__('messages.toyota')}}</option>
                            <option  {{ ($reservation->car->model == "هونداى") ? "selected" : "" }} name="hyundai" >{{__('messages.hyundai')}}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
                    <label>{{__('messages.expire_date')}} *</label>
                    <div class="input-group input remove-icon">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <img src="{{ asset('/front2/images/vin-number.png') }}" alt="">
                            </div>
                            <input type="text" class="form-control" placeholder="{{__('messages.expire_date')}}" name="register_expire_date" id="datepicker" value="{{$reservation->car->register_expire_date}}"
                                   data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.expire_date').' '.__('messages.required')}}</span>" >
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3 col-md-4 col-12">
                    <label>{{__('messages.car_type')}} *</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <img src="{{ asset('/front2/images/cars.png') }}" alt=""> </div>
                        </div>
                        <select id="car_type"  class="form-control custom-select my-select" name="car_type_id" data-validation="required"
                                data-validation-error-msg-required="<span class='jq-error'>{{__('messages.car_type').' '.__('messages.required')}}</span>" >
                            <option selected disabled value="">{{__('messages.car_type')}}</option>
                            @foreach($car_types as $car_type)
                                <option {{ ($reservation->car->car_type == $car_type) ? "selected" : "" }} value="{{$car_type->id}}" car_type_price="{{$car_type->price}}" >{{App::getLocale()=="ar" ? $car_type->name_ar : $car_type->name_en}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <!--<div class="form-group mb-3 col-md-4 col-sm-6 col-12">-->
                <!--    <div class="input-group input remove-icon">-->
                <!--        <div class="input-group-prepend">-->
                <!--            <div class="input-group-text">-->
                <!--                <img src="{{ asset('/front2/images/vin-number.png') }}" alt="">-->
                <!--            </div>-->
                <!--            <input type="text" class="form-control" placeholder="{{__('messages.discount_code')}}" name="discount_code" >-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
            <div class="text-center mt-md-2 mt-2 tos-error">

                <input type="checkbox" name="tos_agree"
                       data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.tos_accept')}}</span>" /><strong><a href="{{URL::to('tos')}}" target="_blank"> {{__('messages.tos_agree')}} <a /></strong>
            </div>
            <div class="text-center mt-md-2 mt-2">
                @if($reservation->discount)
                    <button type="button" id="btn-price" class="btn btn-danger "><span class="new_msg">{{__('messages.tic_price_discount')}}</span><strong class="old_price"> {{$reservation->car->car_type->price - $reservation->discount->discount_code->amount}}   </strong> {{__('messages.ryal')}}  +{{__('messages.fee')}}<strong> {{$reservation->car->car_type->dowri_fee}}   </strong> {{__('messages.ryal')}} </button>
                @else
                    <button type="button" id="btn-price" class="btn btn-danger "><span class="new_msg">{{__('messages.tic_price')}}</span><strong class="old_price"> {{$reservation->car->car_type->price}}   </strong> {{__('messages.ryal')}}  +{{__('messages.fee')}}<strong> {{$reservation->car->car_type->dowri_fee}}   </strong> {{__('messages.ryal')}} </button>
                @endif
                <button class="btn btn-info"> {{__('messages.edit')}}</button>
                <a class="btn btn-danger" href="{{ route('reservation.show',['slug' => $reservation->slug ]) }}">Cancel</a>
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
        $('#car_type').attr('disabled',true);
        $('#city').change(function(){
            selected_city_id = $(this).val();
            $('#center .disabled').prop('selected', true);
            $('#center option').addClass('hide');
            $("#center option[city_id='"+selected_city_id+"']").removeClass('hide');

        });

        $('#datepicker1').datepicker({
            disableDaysOfWeek: [5],
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd',
            minDate: new Date(),
            icons: {
                rightIcon: '<i class="fa fa-angle-down"></i>'
            }
        });

        $(document).ready(function() {
            $('#datepicker').datetimepicker({
                // uiLibrary: 'bootstrap4',
                locale: {
                    calender: 'ummalqura',
                    lang: 'ar'
                },
                format: 'YYYY-MM-DD',

            });
            $('#datepicker1').change(function(){
               var new_date = $(this).val();
                var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                var d = new Date(new_date);
                var dayName = days[d.getDay()];

                if(dayName == "Saturday"){
                    var periods = [
                        'p_14_00','p_14_15','p_14_30','p_14_45',
                        'p_15_00','p_15_15','p_15_30','p_15_45',
                        'p_16_00','p_16_15','p_16_30','p_16_45'];

                    $.each( periods, function( key, value ) {
                        $("#time_period option[value=" + value + "]").hide();
                    });
                }else{
                    $("#time_period").children('option').show();

                }
            });

            $('#time_period').change(function(){
                var period = $(this).val();
                var date = $("#datepicker1").val();
                var center_id =  $("#center").val();
                var csrf_token = "{!! csrf_token() !!}";

                $.ajax({
                    type:"POST",
                    url:"{{ URL::to('reservation/check_availability') }}",
                    data:{ "_token":csrf_token,
                            "time_period": period ,
                            "inspection_center_id" : center_id,
                            "date" :date
                    },
                    success:function(data) {
                        if(data == "not_availabe")
                            $("#error").css('display','block');
                        console.log(data);
                    }
                });

            });
        });




        $("#car_type").change(function(){
            $("#btn-price strong").text($("#car_type option:selected").attr("car_type_price"));
        });

        $("#mobile_number").keypress(function (e){
            if( (e.which < 48 || e.which > 57 ) && e.which != 8){
                return false;
            }
            if($(this).val().length === 0 && e.which != 48){
                return false;
            }
            if($(this).val().length === 1 && e.which != 53){
                return false;
            }
            if($(this).val().length === 10 && e.which != 8 ){
                return false;
            }
        });

        $(".char-inputs").keypress(function (e){
            console.log(e.which);
            if($(this).val().length === 1  && e.which != 8 ){
                return false;
            }
            if((e.which < 65 || e.which > 90) && ( e.which != 1602 ) && ( e.which != 1603 ) && ( e.which != 1604 ) && ( e.which != 1605 ) && ( e.which != 1606) && ( e.which != 1607 ) && ( e.which != 1608 ) && ( e.which != 1609 ) && (e.which != 8 ) && (e.which != 1575) && (e.which != 1576) && (e.which != 1581) && (e.which != 1583) && (e.which != 1585) && (e.which != 1587) && (e.which != 1589) && (e.which != 1591) && (e.which != 1593)  ){
                return false;
            }
            if( e.which == 67 || e.which == 70 || e.which == 73 || e.which == 77 || e.which == 79 || e.which == 80 || e.which == 81 || e.which == 87 || e.which == 89 ) {
                return false;
            }

            // var valid_char = [65,66,68,69,71,72,74,75,76,78,82,83,84,85,86,88];

        });

        $(function() {
            var charLimit = 1;
            $(".char-inputs").keyup(function(e) {
                console.log('Focus');
                if (this.value.length == charLimit) {
                    console.log('Focus');
                    $(this).next('.char-inputs').focus();

                }
            });
        });
    </script>
@endsection
