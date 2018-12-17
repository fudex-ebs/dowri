@extends('layouts.admin',['page' => 'discount_code'])
@section('page_css')
  <link href="{{asset('/metronic/assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

  <!-- BEGIN: Subheader -->
  <div class="m-subheader ">
    <div class="d-flex align-items-center">
      <div class="mr-auto">
        <h3 class="m-subheader__title ">discount code - {{$discount_code->code}}</h3>
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
        					update discount code

        				</h3>
        			</div>
        		</div>
        	</div>
        	<div class="m-portlet__body">
                @if($errors->all())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $message)
                                <li> {{$message}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form class="" action="{{ route('DiscountCode.update',['slug' => $discount_code->slug ]) }}" method="post" enctype="multipart/form-data">
              <input type='hidden' name='_token' value="{!! csrf_token() !!}">
              <div class="row">
                <div class="form-group col-md-9">
                    <label>code </label>
                    <input type="text" name="code" class="form-control" value="{{$discount_code->code}}">
                </div>
                </div>
                <div class="row">
                <div class="form-group col-md-9">
                    <label>start date </label>
                    <input type="date" name="start_date" class="form-control" value="{{$discount_code->start_date}}">
                </div>
                </div>
                 <div class="row">
                <div class="form-group col-md-9">
                    <label>end date </label>
                    <input type="date" name="end_date" class="form-control" value="{{$discount_code->end_date}}" >
                </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-9">
                        <label>amount </label>
                        <input type="number" name="amount" min="1" class="form-control" value="{{$discount_code->amount}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-9">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                        <input type="submit" class="btn btn-primary" value="edit">
                    </div>
                </div>
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
