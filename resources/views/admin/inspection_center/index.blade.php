@extends('layouts.admin',['page' => 'inspection_center'])
@section('page_css')
  <link href="/metronic/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

  <!-- BEGIN: Subheader -->
  <div class="m-subheader ">
    <div class="d-flex align-items-center">
      <div class="mr-auto">
        <h3 class="m-subheader__title ">reservations</h3>
      </div>
      <button type="button" name="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Inspection Center</button>
    </div>
  </div>

  <!-- END: Subheader -->
  <div class="m-content">

    <!--Begin::Section-->
    <div class="row">
      <div class="col-xl-12">

        <!--begin:: Widgets/Top Products-->
        <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                  inspection centers
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
                  <th scope="col">city</th>
                  <th scope="col">reservation number</th>


                </tr>
              </thead>
              <tbody>
                @foreach($inspection_centers as $count => $center)
                <tr>

                  <th scope="row">{{$count+1}}</th>
                  <td>{{$center->name}}</td>
                  <td>{{$center->city->name_en}}</td>
                  <td>{{$center->reservations->count()}}</td>
                  <td><a href="{{route('inspection_center.edit',$center->id)}}">edit</a></td>
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
        <h5 class="modal-title" id="exampleModalLabel">add center</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('inspection_center.store') }}" enctype="multipart/form-data">
      <div class="modal-body">
        <input type='hidden' name='_token' value="{!! csrf_token() !!}">
        <div class="row">
          <div class="form-group col-md-9">
              <label>arabic name </label>
              <input type="text" name="name" class="form-control" required>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-9">
              <label>english name </label>
              <input type="text" name="name_en" class="form-control" required>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-9">
              <label>city </label>
              <select name="city_id" class="form-control" required>
              @foreach($cities as $city)
                <option value="{{$city->id}}">{{$city->name_en}}</option>
              @endforeach
              </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-9">
              <label>hourly_capacity </label>
              <input type="text" name="hourly_capacity" class="form-control"required >
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-9">
              <label>mobile_number </label>
              <input type="text" name="mobile_number" class="form-control" required>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-9">
              <label>email </label>
              <input type="text" name="email" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
        <input type="submit" class="btn btn-primary" value="save">
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('page_js')
  <script src="/metronic/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
  <script type="text/javascript">
  $(document).ready( function () {
      $('#m_table_55').DataTable({
        scrollY: "50vh",
        scrollX: !0,
      });
  } );
  </script>
@endsection
