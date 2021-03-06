@extends('layouts.front')
@section('page_css')

@endsection
@section('content')
<!--Start Eye animation-->
<section>
    <div class="row">
        <div class="col-md-12">
            <div class="text-center eye">
                <img src="{{ asset('/front2/images/eye-full.png') }}" class="img-fluid home-img" alt="" >
            </div>

        </div>
    </div>
</section>
@if (session('cancel_done'))
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal ( "{{__('messages.cancel_res')}}" ,  "{{__('messages.cancel_msg_done')}}" ,  "success" )
    </script>
    @php
    Session::forget('cancel_done');
    @endphp
@endif

<!--End Eye animation -->

<!--Start Form-->
<section class="reservation-form">

        <div class="form-row form-row d-flex justify-content-md-center">
            <div class=" mb-md-0 mb-3 col-lg-1 col-md-1 col-sm-6 col-12 fhs-logo" style="text-align:center">
                <img src="{{ asset('/front2/images/fahs.png') }}" alt="" width="80px">
            </div>
            <div class="form-group mb-md-0 mb-3 col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="input-group">
                    {{--<div class="input-group-prepend">--}}
                        {{--<div class="input-group-text"><img src="{{ asset('/front2/images/city.png') }}" alt=""> </div>--}}
                    {{--</div>--}}
                    <select id="city" class="form-control custom-select my-select">
                        <option selected disabled >{{__('messages.select_city')}}</option>
                        @foreach($cities as $city)
                            <option value="{{$city->id}}">{{ App::getLocale()=="ar" ? $city->name_ar : $city->name_en }}</option>
                        @endforeach
                    </select>
                </div>
                <small id="city-help" class="form-text text-muted input-danger hide">{{__('messages.check_msg')}}</small>
            </div>
            <div class="form-group mb-md-0 mb-3 col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="input-group">
                    {{--<div class="input-group-prepend">--}}
                        {{--<div class="input-group-text"><img src="{{ asset('/front2/images/city.png') }}" alt=""> </div>--}}
                    {{--</div>--}}
                    <select id="center" class="form-control custom-select my-select">
                        <option selected disabled class="disabled">{{__('messages.select_center')}} </option>
                        @foreach($InspectionCenters as $center)
                        <option class="hide" value="{{$center->id}}" city_id="{{$center->city->id}}" >{{ App::getLocale()=="ar" ? $center->name : $center->name_en}}</option>

                        @endforeach
                    </select>
                </div>
                <small id="center-help" class="form-text text-muted input-danger hide">{{__('messages.check_msg')}}</small>
            </div>
            <div class="form-group mb-md-0 mb-3 col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="input-group">
                    {{--<div class="input-group-prepend">--}}
                        {{--<div class="input-group-text"><img src="{{ asset('/front2/images/cars.png') }}" alt=""> </div>--}}
                    {{--</div>--}}
                    <select id="car" class="form-control custom-select my-select">
                        <option selected disabled >{{__('messages.car_type')}} </option>
                        @foreach($cars as $car)
                            <option value="{{$car->id}}" >{{ App::getLocale()=="ar" ? $car->name_ar : $car->name_en}}</option>
                        @endforeach
                    </select>
                </div>
                <small id="car-help" class="form-text text-muted input-danger hide">{{__('messages.check_msg')}}</small>
            </div>

            <div class="form-group mb-md-0 mb-3 col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="input-group remove-icon">
                    <div class="input-group-prepend">
                        {{--<div class="input-group-text">--}}
{{--                            <img src="{{ asset('/front2/images/calender-ico.png') }}" alt="">--}}
                        {{--</div>--}}
                        <input type="text" class="form-control " id="datepicker" placeholder="{{__('messages.select_date')}}">
                    </div>
                    <small id="datepicker-help" class="form-text text-muted input-danger hide">{{__('messages.check_msg')}}</small>
                </div>
            </div>

            <div class="form-group mb-md-0 mb-3 col-lg-2 col-md-12 col-sm-6 col-12">
                <button id="submit" class="btn btn-primary  mt-lg-0 mt-md-2 ml-lg-2 m-0 float-lg-right float-md-left  float-sm-right float-left">
                    <img src="{{ asset('/front2/images/search-ico.png') }}" alt="" class="align-middle" >
                    <span>{{__('messages.find_date')}}</span>
                </button>
            </div>
        </div>

</section>
<!--End Form -->

@endsection
@section('page_js')
<script>
    $('#city').change(function(){
      selected_city_id = $(this).val();
      $('#center .disabled').prop('selected', true);
      $('#center option').addClass('hide');
      $("#center option[city_id='"+selected_city_id+"']").removeClass('hide');

    });

    var disabledDays = [0, 6];
    $('#datepicker').datepicker({
        disableDaysOfWeek: [5],
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd',
        minDate: new Date(),
        icons: {
            rightIcon: '<i class="fa fa-angle-down"></i>'
        }
    });
    $('#submit').click(function(){
      $('#center-help,#datepicker-help').addClass('hide');
      var center_valid = true;
      var datepicke_valid = true;
      var car_valid = true;
      if(!$('#center').val()){
        $('#center-help').removeClass('hide')
        center_valid = false;
      }
      if(!$('#car').val()){
         $('#car-help').removeClass('hide')
         car_valid = false;
      }
      if(!$('#datepicker').val()){
        $('#datepicker-help').removeClass('hide');
        datepicke_valid = false;
      }
      if(datepicke_valid && center_valid && car_valid){
        window.location.href = "{{url('reservation_check/center')}}/"+$('#center').val()+"/date/"+$('#datepicker').val()+"/"+$('#car').val();
        // console.log();

      }


    })

</script>
@endsection
