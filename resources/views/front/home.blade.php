@extends('layouts.front')
@section('page_js')

@endsection
@section('content')
<!--Start Eye animation-->
<section>
    <div class="row">
        <div class="col-md-12">
            <div class="text-center eye">
                <img src="images/eye-full.png" class="img-fluid" alt="">
            </div>

        </div>
    </div>
</section>
<!--End Eye animation -->

<!--Start Form-->
<section class="reservation-form">
    <form>
        <div class="form-row form-row d-flex justify-content-md-center">
            <div class="form-group mb-md-0 mb-3 col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text fhs-logo"><img src="images/city.png" alt=""> </div>
                    </div>
                    <select id="inputCity" class="form-control custom-select my-select">
                        <option selected>المدينة</option>
                        <option>City 1</option>
                        <option>City 2</option>
                        <option>City 3</option>
                    </select>
                </div>
            </div>
            <div class="form-group mb-md-0 mb-3 col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><img src="images/center.png" alt=""> </div>
                    </div>
                    <select id="inputState" class="form-control custom-select my-select">
                        <option selected>المنطقة</option>
                        <option>Province 1</option>
                        <option>Province 2</option>
                        <option>Province 3</option>
                    </select>
                </div>
            </div>
            <div class="form-group mb-md-0 mb-3 col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="input-group remove-icon">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <img src="images/calender-ico.png" alt="">
                        </div>
                        <input type="text" class="form-control" id="datepicker">
                    </div>

                </div>
            </div>
            <div class="form-group mb-md-0 mb-3 col-lg-2 col-md-12 col-sm-6 col-12">
                <button type="submit" class="btn btn-primary  mt-lg-0 mt-md-2 ml-lg-2 m-0 float-lg-right float-md-left  float-sm-right float-left">
                    <img src="images/search-ico.png" alt="" class="align-middle">
                    <span>ابحث عن موعد</span>
                </button>
            </div>
        </div>
    </form>
</section>
<!--End Form -->
@endsection

@section('page_js')
<script>

    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        icons: {
            rightIcon: '<i class="fa fa-angle-down"></i>'
        }
    });
</script>
@endsection
