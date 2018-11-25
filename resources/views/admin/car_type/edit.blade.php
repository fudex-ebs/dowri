@extends('layouts.admin',['page' => 'car_type'])
@section('page_css')
  <link href="{{asset('/metronic/assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

  <!-- BEGIN: Subheader -->
  <div class="m-subheader ">
    <div class="d-flex align-items-center">
      <div class="mr-auto">
        <h3 class="m-subheader__title ">car type - {{$car_type->name_en}}</h3>
      </div>
    </div>
  </div>

  <!-- END: Subheader -->
  <div class="m-content">

    <!--Begin::Section-->
    <div class="row">

      <div class="col-md-12">
        <div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
        	<div class="m-portlet__head">
        		<div class="m-portlet__head-caption">
        			<div class="m-portlet__head-title">
        				<h3 class="m-portlet__head-text">
        					update car type

        				</h3>
        			</div>
        		</div>
        	</div>
        	<div class="m-portlet__body">
            <form method="post" action="{{ route('car_type.update',['carType' => $car_type]) }}" enctype="multipart/form-data">
                <input type='hidden' name='_token' value="{!! csrf_token() !!}"/>
                <div class="row">
                  <div class="form-group col-md-12">
                      <label>name arabic</label>
                      <input type="text" name="name" class="form-control" value="{{$car_type->name_ar}}"/>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                      <label>name english</label>
                      <input type="text" name="name_en" class="form-control" value="{{$car_type->name_en}}"/>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-12">
                      <label>price</label>
                      <input type="text" name="price" class="form-control" value="{{$car_type->price}}"/>
                  </div>
                </div>

                <input type="submit" value="update" class="btn btn-primary"/>
            </form>

        	</div>
        </div>
      </div>



    </div>

    <!--End::Section-->

  </div>
</div>
</div>
@endsection
@section('page_js')

  <script src="{{asset('/js/admin/custom.js')}}" type="text/javascript"></script>

@endsection
