@extends('layouts.admin',['page' => 'inspection_center'])
@section('page_css')
    <link href="{{asset('/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/metronic/assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
  {{--<link href="/metronic/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />--}}
  {{--<link href="/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />--}}
@endsection
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

  <!-- BEGIN: Subheader -->
  <div class="m-subheader ">
    <div class="d-flex align-items-center">
      <div class="mr-auto">
        <h3 class="m-subheader__title ">inspection center - {{$inspection_center->name}}</h3>
      </div>
      <button type="button" name="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Inspection Center</button>
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
        <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height " style="height:fit-content;">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                  table
                </h3>
              </div>
            </div>

          </div>
          <div class="m-portlet__body">
            <div class="row search-field">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" id="slug" index="1" class="form-control" placeholder="reservation number">
                    </div>
                </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="name" index="2" class="form-control" placeholder="name">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="mobile_number" index="3" class="form-control" placeholder="mobile number">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="email" index="4" class="form-control" placeholder="email">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="plate_number" index="5" class="form-control" placeholder="plate number">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="chase_number" index="6" class="form-control" placeholder="chase number">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="date" index="7" class="form-control" placeholder="date">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" id="time" index="8" class="form-control" placeholder="time">
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
                  <th scope="col">Create time</th>
                  <th scope="col">Discount code</th>

                </tr>
              </thead>
              <tbody>
                @foreach($inspection_center->valid_reservations as $count => $reservation)
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
                          <td>{{ date("d-m-Y", strtotime($reservation->created_at))}}</td>
                          <td>{{isset($reservation->discount) ? $reservation->discount->discount_code->code : '--'}}</td>

                        </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <!--end:: Widgets/Top Products-->
      </div>
      <div class="col-md-6">
        <div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
        	<div class="m-portlet__head">
        		<div class="m-portlet__head-caption">
        			<div class="m-portlet__head-title">
        				<h3 class="m-portlet__head-text">
        					update center

        				</h3>
        			</div>
        		</div>
        	</div>
        	<div class="m-portlet__body">
            <form method="post" action="{{ route('inspection_center.update',['slug' => $inspection_center->id]) }}" enctype="multipart/form-data">
                <input type='hidden' name='_token' value="{!! csrf_token() !!}"/>
                <div class="row">
                  <div class="form-group col-md-12">
                      <label>name arabic</label>
                      <input type="text" name="name" class="form-control" value="{{$inspection_center->name}}"/>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                      <label>name english</label>
                      <input type="text" name="name_en" class="form-control" value="{{$inspection_center->name_en}}"/>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                      <label>city </label>
                      <select name="city_id" class="form-control" required id="city_id">
                      @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name_en}}</option>
                      @endforeach
                      </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                      <label>hourly_capacity </label>
                      <input type="text" name="hourly_capacity" class="form-control" value="{{$inspection_center->hourly_capacity}}"/>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                      <label>mobile_number </label>
                      <input type="text" name="mobile_number" class="form-control" value="{{$inspection_center->mobile_number}}"/>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                      <label>email </label>
                      <input type="text" name="email" class="form-control" value="{{$inspection_center->email}}"/>
                  </div>

                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                      <label>advertisement </label>
                      @if($inspection_center->ad_img)
                        <img src="{{asset('/adds/'.$inspection_center->ad_img)}}" alt="" width="100%">
                      @endif

                      <input type="file" name="photo" class="form-control"/>
                  </div>

                </div>
                <input type="submit" value="update" class="btn btn-primary"/>
            </form>

        	</div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
        	<div class="m-portlet__head">
        		<div class="m-portlet__head-caption">
        			<div class="m-portlet__head-title">
        				<h3 class="m-portlet__head-text">
        					capacity modification
        				</h3>
        			</div>
        		</div>
        	</div>
        	<div class="m-portlet__body">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <input class='form-control' type="text" id="m_datepicker_6" data-date-format="yyyy-mm-dd" placeholder="Select date"/>
            </div>
        	</div>
        </div>
          <div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
              <div class="m-portlet__head">
                  <div class="m-portlet__head-caption">
                      <div class="m-portlet__head-title">
                          <h3 class="m-portlet__head-text">
                              Center Reservations
                          </h3>
                      </div>
                  </div>
              </div>
              <div class="m-portlet__body">
                  <a class="col-lg-12 col-md-12 col-sm-12">
                      <a href="{{route('inspection_center.list',['center_slug' => $inspection_center->slug])}}" target="_blank" ><i class="fa fa-link"></i>   show All</a>
              </div>
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
  {{--<script src="/metronic/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>--}}
  {{--<script src="/metronic/assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>--}}
  {{--<script src="/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>--}}
  {{--<script src="/metronic/assets/demo/default/custom/components/calendar/basic.js" type="text/javascript"></script>--}}
  <script src="{{asset('/metronic/assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
  <script src="{{asset('/metronic/assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js')}}" type="text/javascript"></script>
  <script src="{{asset('/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
  <script src="{{asset('/metronic/assets/demo/default/custom/components/calendar/basic.js')}}" type="text/javascript"></script>

  <script src="{{asset('/js/admin/custom.js')}}" type="text/javascript"></script>
  <script type="text/javascript">
  $(document).ready( function () {
      $('#m_datepicker_6').datepicker().on('changeDate', function (ev) {
        window.location.href = "/admin/capacity_modification/{{$inspection_center->id}}/"+this.value ;
      });

      my_events = [
        @foreach ($inspection_center->reservations as $reservation)
        {
            title: "{{$reservation->user->name}}",
            start: "{{$reservation->date}}",
            className: "m-fc-event--primary",
            description: "plate number : {{$reservation->car->plate_number}} - time : {{$reservation->time_period}}"
        },
        @endforeach

      ];
      CalendarBasic.init(my_events);
      $("#city_id").val("{{$inspection_center->city_id}}");

  } );
  </script>
@endsection
