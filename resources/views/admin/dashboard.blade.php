@extends('layouts.admin',['page' => 'dashboard'])
@section('page_css')
  <link href="/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
  <!--RTL version:<link href="/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
@endsection
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

  <!-- BEGIN: Subheader -->
  <div class="m-subheader ">
    <div class="d-flex align-items-center">
      <div class="mr-auto">
        <h3 class="m-subheader__title ">Dashboard</h3>
      </div>
    </div>
  </div>

  <!-- END: Subheader -->
  <div class="m-content">

    <div class="m-portlet ">
    	<div class="m-portlet__body  m-portlet__body--no-padding">
    		<div class="row m-row--no-padding m-row--col-separator-xl">
    			<div class="col-md-12 col-lg-6 col-xl-4">
    				<!--begin::Total Profit-->
    				<div class="m-widget24 m--margin-bottom-40" >
    				    <div class="m-widget24__item">
    				        <h4 class="m-widget24__title">
    				            Total Sales
    				        </h4><br>
    				        <span class="m-widget24__desc">
    				            All Customs Value
    				        </span>
    				        <span class="m-widget24__stats m--font-brand">
    				            {{$ReservationService->total_sale_value()}}
    				        </span>


    				    </div>
    				</div>
    				<!--end::Total Profit-->
    			</div>
    			<div class="col-md-12 col-lg-6 col-xl-4">
    				<!--begin::New Feedbacks-->
    				<div class="m-widget24">
    					 <div class="m-widget24__item">
    				        <h4 class="m-widget24__title">
    				            Reservation number
    				        </h4><br>
    				        <span class="m-widget24__desc">
    				            Customer Review
    				        </span>
    				        <span class="m-widget24__stats m--font-info">
    				            {{$ReservationService->total_sale_number()}}
    				        </span>
    				        <div class="m--space-10"></div>

    				    </div>
    				</div>
    				<!--end::New Feedbacks-->
    			</div>
    			<div class="col-md-12 col-lg-6 col-xl-4">
    				<!--begin::New Orders-->
    				<div class="m-widget24">
    					<div class="m-widget24__item">
    				        <h4 class="m-widget24__title">
    				            Canceled Reservation
    				        </h4><br>
    				        <span class="m-widget24__desc">
    				            Fresh Order Amount
    				        </span>
    				        <span class="m-widget24__stats m--font-danger">
                        {{$ReservationService->total_cancel_number()}}
    				        </span>
    				        <div class="m--space-10"></div>
    				    </div>
    				</div>
    				<!--end::New Orders-->
    			</div>

    		</div>
    	</div>
    </div>
    <!--Begin::Section-->
    <div class="row">
      <div class="col-xl-12">
        <div class="m-portlet">
          <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">
              <div class="col-xl-6">

                <!--begin:: Widgets/Stats2-1 -->
                <div class="m-widget1">
                  <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                      <div class="col">
                        <h3 class="m-widget1__title">for today reservation number</h3>

                      </div>
                      <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">{{$ReservationService->reservation_count_for( Carbon\Carbon::now()->format('Y-m-d'), Carbon\Carbon::now()->format('Y-m-d'))}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                      <div class="col">
                        <h3 class="m-widget1__title">for last 7 days</h3>

                      </div>
                      <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">{{$ReservationService->reservation_count_for( Carbon\Carbon::now()->subDays(7)->format('Y-m-d'),Carbon\Carbon::now()->format('Y-m-d') )}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                      <div class="col">
                        <h3 class="m-widget1__title">for last 30 days</h3>

                      </div>
                      <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">{{$ReservationService->reservation_count_for( Carbon\Carbon::now()->subDays(30)->format('Y-m-d'),Carbon\Carbon::now()->format('Y-m-d') )}}</span>
                      </div>
                    </div>
                  </div>

                </div>

                <!--end:: Widgets/Stats2-1 -->
              </div>
              <div class="col-xl-6">

                <!--begin:: Widgets/Stats2-1 -->
                <div class="m-widget1">
                  <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                      <div class="col">
                        <h3 class="m-widget1__title">on today reservation number</h3>

                      </div>
                      <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">{{$ReservationService->reservation_count_on( Carbon\Carbon::now()->format('Y-m-d'),Carbon\Carbon::now()->format('Y-m-d'))}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                      <div class="col">
                        <h3 class="m-widget1__title">on last 7 days</h3>

                      </div>
                      <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">{{$ReservationService->reservation_count_on( Carbon\Carbon::now()->subDays(7)->format('Y-m-d') , Carbon\Carbon::now()->format('Y-m-d'))}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                      <div class="col">
                        <h3 class="m-widget1__title">on last 30 days</h3>

                      </div>
                      <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">{{$ReservationService->reservation_count_on( Carbon\Carbon::now()->subDays(30)->format('Y-m-d'),Carbon\Carbon::now()->format('Y-m-d') )}}</span>
                      </div>
                    </div>
                  </div>

                </div>

                <!--end:: Widgets/Stats2-1 -->
              </div>


            </div>
          </div>
        </div>
      </div>


    </div>


  </div>
</div>
</div>
@endsection
@section('page_js')
		<script src="{{asset('/metronic/assets/app/js/dashboard.js')}}" type="text/javascript"></script>
    <!-- <script src="/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script> -->


@endsection
