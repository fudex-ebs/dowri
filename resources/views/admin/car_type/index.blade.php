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
        <h3 class="m-subheader__title ">car type</h3>
      </div>
      <button type="button" name="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Car Type</button>
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
                  Car Types
                </h3>
              </div>
            </div>

          </div>
          <div class="m-portlet__body">
            <table class="table table-striped- table-bordered table-hover table-checkable text-center" id="m_table_55">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">name english</th>
                  <th scope="col">name arabic</th>
                  <th scope="col">price</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($car_types as $count => $car_type)
                <tr>

                  <th scope="row">{{$count+1}}</th>
                  <td>{{$car_type->name_en}}</td>
                  <td>{{$car_type->name_ar}}</td>
                  <td>{{$car_type->price}}</td>
                  <td class="text-center">
                    
                    <a href="{{route('car_type.edit',['id' => $car_type->id])}}" class="m-portlet__nav-link btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--pill   m-dropdown__toggle" title="edit "><i class="la la-edit"></i></a>
                  </td>


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
        <h5 class="modal-title" id="exampleModalLabel">add car type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('car_type.store') }}" enctype="multipart/form-data">
      <div class="modal-body">

            <input type='hidden' name='_token' value="{!! csrf_token() !!}">
            <div class="row">
              <div class="form-group col-md-9">
                  <label>name ar </label>
                  <input type="text" name="name_ar" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-9">
                  <label>name en </label>
                  <input type="text" name="name_en" class="form-control" required>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-9">
                  <label>price </label>
                  <input type="number" name="price" class="form-control" required>
              </div>
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
@endsection
