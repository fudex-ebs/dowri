@extends('layouts.front')
@section('page_css')

@endsection
@section('content')
<!--Start Form-->
<section class="suitable">
    <h2>املاء بياناتك</h2>
    <form method="post" action="{{route('reservation.store',['center_id' => $center_id ,'date' => $date,'time' =>$time])}}" enctype="multipart/form-data">
    <input type='hidden' name='_token' value="{!! csrf_token() !!}">
    <div class="form-row form-row d-flex justify-content-md-center">
        <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
            <div class="input-group input remove-icon">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/name.png') }}" alt="">
                    </div>
                    <input type="text" class="form-control" placeholder="اسم الاول" name="first_name" required>
                </div>
            </div>
        </div>
        <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
            <div class="input-group input remove-icon">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/name.png') }}" alt="">
                    </div>
                    <input type="text" class="form-control" placeholder="اسم الاخير" name="last_name" required>
                </div>
            </div>
        </div>

        <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
            <div class="input-group input remove-icon">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/mobile.png') }}" alt="">
                    </div>
                    <input type="text" class="form-control" placeholder="رقم الجوال"  name="mobile_number" id="mobile_number" required>
                </div>
            </div>
        </div>

        <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
            <div class="input-group input remove-icon">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/email.png') }}" alt="">
                    </div>
                    <input type="text" class="form-control" placeholder="البريد الالكتروني" name="email" required>
                </div>
            </div>
        </div>

        <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
            <div class="input-group input remove-icon">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/board-number.png') }}" alt="">
                    </div>
                    <input type="text" class="form-control" placeholder="رقم اللوحة مثال:(ح ب ر - 1636)" name="plate_number" required>
                </div>
            </div>
        </div>

        <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
            <div class="input-group input remove-icon">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/vin-number.png') }}" alt="">
                    </div>
                    <input type="text" class="form-control" placeholder="رقم الشاصيه" name="serial_number" required>
                </div>
            </div>
        </div>
        <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
            <div class="input-group input remove-icon">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/vin-number.png') }}" alt="">
                    </div>
                    <select class="form-control custom-select my-select" name="manufacture_year" required>
                      <option selected disabled>الموديل</option>
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
                <select id="inputState" class="form-control custom-select my-select" name="model" required>
                    <option selected disabled>شركة المصنعة</option>
                    <option name="toyota">تيوتا</option>
                    <option name="hyundai">هونداي</option>


                </select>
            </div>
        </div>

        <div class="form-group mb-3 col-md-4 col-sm-6 col-12">
            <div class="input-group input remove-icon">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/vin-number.png') }}" alt="">
                    </div>
                    <input type="text" class="form-control" placeholder="تاريخ انتهاء الاستمارة" name="register_expire_date" id="datepicker" required>
                </div>
            </div>
        </div>


        <div class="form-group mb-3 col-md-4 col-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <img src="{{ asset('/front2/images/cars.png') }}" alt=""> </div>
                </div>
                <select id="inputState" class="form-control custom-select my-select" name="car_type_id" required>
                    <option selected disabled>نوع السيارة</option>
                    @foreach($car_types as $car_type)
                    <option value="{{$car_type->id}}">{{$car_type->name_ar}}</option>
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
                    <input type="text" class="form-control" placeholder="كود تخفيض" name="discount_code" required>
                </div>
            </div>
        </div>

    </div>
    <div class="text-center mt-md-2 mt-2">
        <button type="button" class="btn btn-danger">سعر التذكرة/ <strong> 100 </strong> ريال </button>
        <button class="btn btn-info">ادفع الان</button>
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
  $('#datepicker').datepicker({
      uiLibrary: 'bootstrap4',
      format: 'yyyy-mm-dd',
      minDate: new Date(),
      icons: {
          rightIcon: '<i class="fa fa-angle-down"></i>'
      }
  });

  $("#mobile_number").keypress(function (e){
    if( (e.which < 48 || e.which > 57)){
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
