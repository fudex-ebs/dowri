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
        <h3 class="m-subheader__title ">discount codes</h3>
      </div>
      <button type="button" name="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Code</button>
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
                  discount codes
                </h3>
              </div>
            </div>

          </div>
          <div class="m-portlet__body">
            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_55">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">name</th>
                  <th scope="col">start date</th>
                  <th scope="col">end date</th>
                  <th scope="col">amount</th>
                  <th scope="col">Delete</th>


                </tr>
              </thead>
              <tbody>
                @foreach($codes as $count => $code)
                <tr>

                  <th scope="row">{{$count+1}}</th>
                  <td>{{$code->code}}</td>
                  <td>{{$code->start_date}}</td>
                  <td>{{$code->end_date}}</td>
                  <td>{{$code->amount}} </td>
                  <td><a href="{{route('DiscountCode.delete',['DiscountCode'=>$code])}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                  
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <!--end:: Widgets/Top Products-->
      </div>
    </div>

    <!--End::Section-->

  </div>
</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">add code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('DiscountCode.store') }}" enctype="multipart/form-data">
      <div class="modal-body">
        @if($errors->all())
          <script> $('#exampleModal').modal('show');</script>
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $message)
                <li> {{$message}}</li>
              @endforeach
            </ul>
          </div>

        @endif
            <input type='hidden' name='_token' value="{!! csrf_token() !!}">
            <div class="row">
              <div class="form-group col-md-9">
                  <label>code </label>
                  <input type="text" name="code" value="{{ old('code') }}" class="form-control" >
              </div>
              </div>
              <div class="row">
              <div class="form-group col-md-9">
                  <label>start date </label>
                  <input type="date" name="start_date" value="{{ old('start_date') }}"  class="form-control" >
              </div>
              </div>
               <div class="row">
              <div class="form-group col-md-9">
                  <label>end date </label>
                  <input type="date" name="end_date" value="{{ old('end_date') }}" class="form-control" >
              </div>
              </div>
               <div class="row">
              <div class="form-group col-md-9">
                  <label>amount </label>
                  <input type="number" name="amount"  value="{{ old('amount') }}" min="1" class="form-control" >
              </div>
              </div>
               <div class="row">


            </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
        <input type="submit" class="btn btn-primary" value="حفظ">
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('page_js')
  <script src="{{asset('/metronic/assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
  <script type="text/javascript">
  $(document).ready( function () {
      $('#m_table_55').DataTable({
        scrollY: "50vh",
        scrollX: !0,
      });
  } );
  </script>
  @if($errors->all())
    <script> $('#exampleModal').modal('show');</script>
  @endif
@endsection
