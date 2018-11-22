@extends('layouts.admin',['page'=> 'capacity_modification'])
@section('page_css')
  <link href="/metronic/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

  <!-- BEGIN: Subheader -->
  <div class="m-subheader ">
    <div class="d-flex align-items-center">
      <div class="mr-auto">
        <h3 class="m-subheader__title ">capacity modification</h3>
      </div>

    </div>
  </div>

  <!-- END: Subheader -->
  <div class="m-content">

    <!--Begin::Section-->
    <div class="row">
      <div class="col-xl-12">

        <!--begin:: Widgets/Top Products-->
        <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height " style="height:fit-content;">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                  {{$inspection_center->name}} - capacity modification - {{$date}}
                </h3>
              </div>
            </div>

          </div>
          <div class="m-portlet__body">
            <form method="post" action="{{ route('capacity_modification.store',['inspection_center_id' => $inspection_center->id,'date'=> $date]) }}" enctype="multipart/form-data">
              <input type='hidden' name='_token' value="{!! csrf_token() !!}">
              <div class="row">
                @foreach(get_time_periods() as $time_period)
                <div class="form-group col-md-3">
                    <label>{{time_format($time_period)}} </label>
                    <input type="text" name="{{$time_period}}" class="form-control" value="{{$inspection_center->capacity($date,$time_period)}}">
                </div>
                @endforeach
              </div>


              <input type="submit" value="save" class="btn btn-primary">

            </form>
          </div>
        </div>

        <!--end:: Widgets/Top Products-->
      </div>

    </div>

    <!--End::Section-->

  </div>
</div>
</div>
@endsection
@section('page_js')

@endsection
