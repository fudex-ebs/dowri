@extends('layouts.admin')
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
                  reservations
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
                  <th scope="col">mobile number</th>
                  <th scope="col">email</th>
                  <th scope="col">plate number</th>
                  <th scope="col">chase number</th>
                  <th scope="col">Date</th>
                  <th scope="col">time</th>
                  <th scope="col">city</th>
                  <th scope="col">center name</th>

                </tr>
              </thead>
              <tbody>
                @foreach($reservations as $count => $reservation)
                <tr>
                  <th scope="row">{{$count+1}}</th>
                  <td>{{$reservation->user->name}}</td>
                  <td>{{$reservation->user->mobile_number}}</td>
                  <td>{{$reservation->user->email}}</td>
                  <td>{{$reservation->car->plate_number}}</td>
                  <td>{{$reservation->car->serial_number}}</td>
                  <td>{{$reservation->date}}</td>
                  <td>{{$reservation->time_period}}</td>
                  <td>{{$reservation->inspection_center->city->name_en}}</td>
                  <td>{{$reservation->inspection_center->name}}</td>
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
