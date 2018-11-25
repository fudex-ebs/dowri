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
    				            $18M
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
    				            1349
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
    				            567
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
                        <h3 class="m-widget1__title">today sales number</h3>

                      </div>
                      <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">$17,800</span>
                      </div>
                    </div>
                  </div>
                  <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                      <div class="col">
                        <h3 class="m-widget1__title">today sales value</h3>

                      </div>
                      <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">$17,800</span>
                      </div>
                    </div>
                  </div>
                  <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                      <div class="col">
                        <h3 class="m-widget1__title">today sales number</h3>

                      </div>
                      <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">$17,800</span>
                      </div>
                    </div>
                  </div>

                </div>

                <!--end:: Widgets/Stats2-1 -->
              </div>

              <div class="col-xl-6">

                <!--begin:: Widgets/Profit Share-->
                <div class="m-widget1">
                  <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                      <div class="col">
                        <h3 class="m-widget1__title">today sales number</h3>

                      </div>
                      <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">$17,800</span>
                      </div>
                    </div>
                  </div>
                  <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                      <div class="col">
                        <h3 class="m-widget1__title">last 7 days</h3>

                      </div>
                      <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">$17,800</span>
                      </div>
                    </div>
                  </div>
                  <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                      <div class="col">
                        <h3 class="m-widget1__title">last 30 days</h3>

                      </div>
                      <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">$17,800</span>
                      </div>
                    </div>
                  </div>

                </div>

                <!--end:: Widgets/Profit Share-->
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
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
                        <h3 class="m-widget1__title">for today sales number</h3>

                      </div>
                      <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">$17,800</span>
                      </div>
                    </div>
                  </div>
                  <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                      <div class="col">
                        <h3 class="m-widget1__title">for today sales value</h3>

                      </div>
                      <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">$17,800</span>
                      </div>
                    </div>
                  </div>
                  <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                      <div class="col">
                        <h3 class="m-widget1__title">for today sales value</h3>

                      </div>
                      <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">$17,800</span>
                      </div>
                    </div>
                  </div>
                  <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                      <div class="col">
                        <h3 class="m-widget1__title">for today sales value</h3>

                      </div>
                      <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">$17,800</span>
                      </div>
                    </div>
                  </div>
                  <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                      <div class="col">
                        <h3 class="m-widget1__title">for today sales value</h3>

                      </div>
                      <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">$17,800</span>
                      </div>
                    </div>
                  </div>
                  <div class="m-widget1__item">
                    <div class="row m-row--no-padding align-items-center">
                      <div class="col">
                        <h3 class="m-widget1__title">for today sales value</h3>

                      </div>
                      <div class="col m--align-right">
                        <span class="m-widget1__number m--font-brand">$17,800</span>
                      </div>
                    </div>
                  </div>



                </div>

                <!--end:: Widgets/Stats2-1 -->
              </div>

              <div class="col-xl-6">

                <!--begin:: Widgets/Profit Share-->
                <div class="m-widget14">
                  <div class="m-widget14__header">
                    <h3 class="m-widget14__title">
                      Profit Share
                    </h3>
                    <span class="m-widget14__desc">
                      Profit Share between customers
                    </span>
                  </div>
                  <div class="row  align-items-center">
                    <div class="col">
                      <div id="m_chart_profit_share" class="m-widget14__chart" style="height: 160px">
                        <div class="m-widget14__stat">45</div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="m-widget14__legends">
                        <div class="m-widget14__legend">
                          <span class="m-widget14__legend-bullet m--bg-accent"></span>
                          <span class="m-widget14__legend-text">37% Sport Tickets</span>
                        </div>
                        <div class="m-widget14__legend">
                          <span class="m-widget14__legend-bullet m--bg-warning"></span>
                          <span class="m-widget14__legend-text">47% Business Events</span>
                        </div>
                        <div class="m-widget14__legend">
                          <span class="m-widget14__legend-bullet m--bg-brand"></span>
                          <span class="m-widget14__legend-text">19% Others</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!--end:: Widgets/Profit Share-->
              </div>
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
		<script src="{{asset('/metronic/assets/app/js/dashboard.js')}}" type="text/javascript"></script>
    <!-- <script src="/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script> -->


@endsection
