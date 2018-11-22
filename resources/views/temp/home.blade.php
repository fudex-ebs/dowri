@extends('layouts.front')
@section('page_css')

@endsection
@section('content')
<!--Start Eye animation-->
<section>
    <div class="row">
        <div class="col-md-12">
            <div class="text-center eye">
                <img src="/front2/images/eye-full.png" class="img-fluid home-img" alt="" >
            </div>

        </div>
    </div>
</section>
<!--End Eye animation -->

<!--Start Form-->
<section class="reservation-form">

        <div class="form-row form-row d-flex justify-content-md-center">
            <div class=" mb-md-0 mb-3 col-lg-1 col-md-1 col-sm-6 col-12" style="text-align:center">
                <img src="/front2/images/fahs.png" alt="" width="60px">
            </div>
            <div class="form-group mb-md-0 mb-3 col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><img src="/front2/images/city.png" alt=""> </div>
                    </div>
                    <select id="city" class="form-control custom-select my-select">
                        <option selected disabled >اختر المدينة</option>
                        @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name_ar}}</option>

                        @endforeach
                    </select>
                </div>
                <small id="city-help" class="form-text text-muted input-danger hide">الرجاء تاكد من المعلومات</small>
            </div>
            <div class="form-group mb-md-0 mb-3 col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><img src="/front2/images/city.png" alt=""> </div>
                    </div>
                    <select id="center" class="form-control custom-select my-select">
                        <option selected disabled class="disabled">اختر المركز</option>
                        @foreach($InspectionCenters as $center)
                        <option class="hide" value="{{$center->id}}" city_id="{{$center->city->id}}" >{{$center->name}}</option>

                        @endforeach
                    </select>
                </div>
                <small id="center-help" class="form-text text-muted input-danger hide">الرجاء تاكد من المعلومات</small>
            </div>
            <div class="form-group mb-md-0 mb-3 col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="input-group remove-icon">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <img src="/front2/images/calender-ico.png" alt="">
                        </div>
                        <input type="text" class="form-control " id="datepicker" placeholder="اختر لتاريخ">
                    </div>
                    <small id="datepicker-help" class="form-text text-muted input-danger hide">الرجاء تاكد من المعلومات</small>
                </div>
            </div>
            <div class="form-group mb-md-0 mb-3 col-lg-2 col-md-12 col-sm-6 col-12">
                <button id="submit" class="btn btn-primary  mt-lg-0 mt-md-2 ml-lg-2 m-0 float-lg-right float-md-left  float-sm-right float-left">
                    <img src="/front2/images/search-ico.png" alt="" class="align-middle" >
                    <span>ابحث عن موعد</span>
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
    $('#datepicker').datepicker({
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
      if(!$('#center').val()){
        $('#center-help').removeClass('hide')
        center_valid = false;
      }
      if(!$('#datepicker').val()){
        $('#datepicker-help').removeClass('hide');
        datepicke_valid = false;
      }
      if(datepicke_valid && center_valid){
        window.location.href = "{{url('reservation_check/center')}}/"+$('#center').val()+"/date/"+$('#datepicker').val();

      }


    })

</script>
@endsection
