@extends('layouts.front')
@section('page_css')

@endsection
@section('content')
<!--Start Eye animation-->
<section class="our-terms">
        <div class="flex-row">
            <div class="col-md-12">
                <ul class="nav nav-tabs terms-tabs" id="myTab" role="tablist">
                  <?php $mydate = new Carbon\Carbon($date)?>
                    <li class="nav-item col p-0">
                        <a class="nav-link " id="Saturday-tab" href="{{route('reservation.check',['center_id'=>$center_id,'date' => $mydate->subDays(3)->format('Y-m-d') ])}}" role="tab" aria-controls="Saturday" aria-selected="true">{{$mydate->format('d-m-Y')}}</a>
                    </li>
                    <li class="nav-item col p-0">
                        <a class="nav-link" id="Sunday-tab"  href="{{route('reservation.check',['center_id'=>$center_id,'date' => $mydate->addDays(1)->format('Y-m-d') ])}}" role="tab" aria-controls="Sunday" aria-selected="false">{{$mydate->format('d-m-Y')}}</a>
                    </li>
                    <li class="nav-item col p-0">
                        <a class="nav-link" id="Monday-tab" href="{{route('reservation.check',['center_id'=>$center_id,'date' => $mydate->addDays(1)->format('Y-m-d') ])}}" role="tab" aria-controls="Monday" aria-selected="false">{{$mydate->format('d-m-Y')}}</a>
                    </li>
                    <li class="nav-item col p-0 active">
                        <a class="nav-link active" id="Tuseday-tab" data-toggle="tab"  role="tab" aria-controls="Tuseday" aria-selected="false">{{$mydate->addDays(1)->format('d-m-Y')}}</a>
                    </li>
                    <li class="nav-item col p-0">
                        <a class="nav-link" id="Wednesday-tab"  href="{{route('reservation.check',['center_id'=>$center_id,'date' => $mydate->addDays(1)->format('Y-m-d') ])}}" role="tab" aria-controls="Wednesday" aria-selected="false">{{$mydate->format('d-m-Y')}}</a>
                    </li>
                    <li class="nav-item col p-0">
                        <a class="nav-link" id="Thursday-tab" href="{{route('reservation.check',['center_id'=>$center_id,'date' => $mydate->addDays(1)->format('Y-m-d') ])}}" role="tab" aria-controls="Thursday" aria-selected="false">{{$mydate->format('d-m-Y')}}</a>
                    </li>
                    <li class="nav-item col p-0">
                        <a class="nav-link" id="Friday-tab" href="{{route('reservation.check',['center_id'=>$center_id,'date' => $mydate->addDays(1)->format('Y-m-d') ])}}" role="tab" aria-controls="Friday" aria-selected="false">{{$mydate->format('d-m-Y')}}</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="Tuseday" role="tabpanel" aria-labelledby="Tuseday-tab">
                      <form>
                          <div class="container">
                            <div class="row time_period_warp">
                              <?php $time_periods = get_time_periods(); ?>
                              @foreach($time_periods as $time_period)
                              @if(!$ReservationService->time_period_is_hidden($date,$time_period,$center_id))
                                  @if($is_sat == "true")
                                      @foreach(sat_work_hours() as $slot)
                                            @if($time_period == $slot)
                                                  <div class="col-md-3 ">
                                                              <a href="{{route('reservation.create',['center_id' => $center_id ,'date' => $date,'time' =>$time_period])}}" class="{!! $ReservationService->check_availability($date,$time_period,$center_id) ? 'active' : 'disable' !!}">
                                                                  <div class="time_period">
                                                                      <span class="glyphicon glyphicon-time"></span>
                                                                      {{time_format($time_period)}}
                                                                  </div>
                                                              </a>
                                                          </div>
                                            @endif
                                      @endforeach
                                  @else
                                          <div class="col-md-3 ">
                                                  <a href="{{route('reservation.create',['center_id' => $center_id ,'date' => $date,'time' =>$time_period])}}" class="{!! $ReservationService->check_availability($date,$time_period,$center_id) ? 'active' : 'disable' !!}">
                                                      <div class="time_period">
                                                          <span class="glyphicon glyphicon-time"></span>
                                                          {{time_format($time_period)}}
                                                      </div>
                                                  </a>
                                              </div>
                                  @endif

                              @endif
                              @endforeach

                            </div>
                            <div class="color-des">

                             <span class="alert-box c-box" ></span>&nbsp;<strong>{{__('messages.not_available')}}</strong>&nbsp;&nbsp;
                              <span class="success-box c-box"></span>&nbsp;<strong>{{__('messages.available')}}</strong>
                            </div>

                          </div>

                      </form>
                    </div>

                    <div class="tab-pane fade" id="Wednesday" role="tabpanel" aria-labelledby="Wednesday-tab">Wednesday-tab</div>

                    <div class="tab-pane fade" id="Thursday" role="tabpanel" aria-labelledby="Thursday-tab">Thursday-tab</div>

                    <div class="tab-pane fade" id="Friday" role="tabpanel" aria-labelledby="Friday-tab">Friday-tab</div>
                </div>
            </div>
        </div>
</section>
<!--End Eye animation -->

<!--Start Form-->
<section class="ad text-center mb-3">
    <div class="flex-row">
        <div class="col-md-12">
            <a href="javascript:void(0)">
                <img src="{{ asset('/front2/images/ad.png') }}" alt="">
            </a>
        </div>
    </div>

</section>
<!--End Form -->

@endsection
@section('page_js')

@endsection
