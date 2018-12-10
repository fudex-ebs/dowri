@extends('layouts.admin',['page' => 'reservation'])
@section('page_css')
  <link href="{{asset('/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('/metronic/assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
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
      <div class="col-lg-12">

        <!--begin::Portlet-->
        <div class="m-portlet" id="m_portlet">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon">
                  <i class="flaticon-map-location"></i>
                </span>
                <h3 class="m-portlet__head-text">
                  Calendar
                </h3>
              </div>
            </div>
          </div>
          <div class="m-portlet__body">
            <div id="m_calendar"></div>
          </div>
        </div>

        <!--end::Portlet-->
      </div>
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
            <div class="row search-field">
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="name" index="1" class="form-control" placeholder="name">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="mobile_number" index="2" class="form-control" placeholder="mobile number">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="email" index="3" class="form-control" placeholder="email">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="plate_number" index="4" class="form-control" placeholder="plate number">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="chase_number" index="5" class="form-control" placeholder="chase number">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="date" index="6" class="form-control" placeholder="date">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="time" index="7" class="form-control" placeholder="time">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="city" index="8" class="form-control" placeholder="city">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="center_name" index="9" class="form-control" placeholder="center name">
                </div>
              </div>
            </div>
            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Reservation number</th>
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
                  <th scope="col">{{$reservation->slug}}</th>
                  <td>{{$reservation->user->name}}</td>
                  <td>{{$reservation->user->mobile_number}}</td>
                  <td>{{$reservation->user->email}}</td>
                  <td>{{$reservation->car->plate_number}}</td>
                  <td>{{$reservation->car->serial_number}}</td>
                  <td>{{$reservation->date}}</td>
                  <td>{{$reservation->time_period}}</td>
                  <td>{{$reservation->inspection_center->city->name_en}}</td>
                  <td>{{$reservation->inspection_center->name_en}}</td>
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
<input type="text" name="my_events" id="my_events" value="{{$reservations->toJson()}}" hidden>
@endsection
@section('page_js')
<script src="{{asset('/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('/metronic/assets/demo/default/custom/components/calendar/basic.js')}}" type="text/javascript"></script>
<script src="{{asset('/metronic/assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('/js/admin/custom.js')}}" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#m_table_55').DataTable({
        scrollY: "50vh",
        scrollX: !0,
      });
      my_events = [
        @foreach ($reservations as $reservation)
        {
            title: "{{$reservation->user->name}}",
            start: "{{$reservation->date}}",
            className: "m-fc-event--primary",
            description: "{{$reservation->inspection_center->city->name_en}}-{{$reservation->inspection_center->name_en}}"
        },
        @endforeach

      ];
      CalendarBasic.init(my_events);
  } );

</script>
@endsection
