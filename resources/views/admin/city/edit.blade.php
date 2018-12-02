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
        <h3 class="m-subheader__title ">city - {{$city->name_en}}</h3>
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
        					update city

        				</h3>
        			</div>
        		</div>
        	</div>
        	<div class="m-portlet__body">
            <form class="" action="{{route('city.update',['city' => $city])}}" method="post" enctype="multipart/form-data">
              <input type='hidden' name='_token' value="{!! csrf_token() !!}">
              <div class="row">
                <div class="form-group col-md-9">
                    <label>name ar </label>
                    <input type="text" name="name_ar" class="form-control" value="{{$city->name_ar}}">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-9">
                    <label>name en </label>
                    <input type="text" name="name_en" class="form-control" value="{{$city->name_en}}">
                </div>
              </div>
              <input type="submit" class="btn btn-primary" value="update">
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
