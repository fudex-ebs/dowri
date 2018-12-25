@extends('layouts.front')
@section('page_css')

@endsection
@section('content')
<!--Start Form-->

  <section class="suitable">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @if (session('cancel'))
      <script>
          swal ( "{{__('messages.cancel_res')}}" ,  "{{__('messages.cancel_msg')}}" ,  "error" )
      </script>
      @php
        Session::forget('cancel');
      @endphp
    @endif
    @if (session('cancel_update'))
        <script>
            swal ( "{{__('messages.update')}}" ,  "{{__('messages.cancel_update_msg')}}" ,  "error" )
        </script>
        @php
            Session::forget('cancel_update');
        @endphp
    @endif
    @if (session('update'))
        <script>
            swal ( "{{__('messages.update')}}" ,  "{{__('messages.update_msg')}}" ,  "success" )
        </script>
        @php
            Session::forget('update');
        @endphp
    @endif
      <div class=" mb-12 col-md-6 col-sm-12 col-12  myl justify-content-md-center text-center  m-auto">
        <table class=" table   table-bordered success-table shadow p-3 mb-5 bg-white rounded ">
        <thead class=" red">
          <tr class="red">
            <th class="red" colspan="2" scope="col" ><img src="{{ asset('/front2/images/right.png') }}"> {{__('messages.success_reserve')}} </th>
            </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row"> {{__('messages.reserve_num')}}</th>
            <td>{{$reservation->slug}}</td>
          </tr>
          <tr>
              @if($reservation->discount)
                  <th scope="row">{{__('messages.tic_price_discount')}}</th>
                  <td>{{ ($reservation->car->car_type->price + $reservation->car->car_type->dowri_fee) - $reservation->discount->discount_code->amount}}</td>
              @else
                  <th scope="row">{{__('messages.ticket_price')}}</th>
                  <td>{{ $reservation->car->car_type->price + $reservation->car->car_type->dowri_fee }}</td>
              @endif
          </tr>
          <tr>
            <th scope="row">{{__('messages.name')}}</th>
            <td>{{$reservation->user->name}}</td>
          </tr>
          <tr>
            <th scope="row">{{__('messages.reserve_date')}}</th>
            <td>{{$reservation->date}} | {{time_format($reservation->time_period)}}</td>
          </tr>
          <tr>
            <th scope="row">{{__('messages.car_type')}}</th>
            <td>{{App::getLocale()=="ar" ? $reservation->car->car_type->name_ar : $reservation->car->car_type->name_en}}</td>
          </tr>
          <tr>
            <th scope="row">{{__('messages.plate_num')}}</th>
            <td>{{$reservation->car->plate_number}}</td>
          </tr>
          <tr>
            <th scope="row">{{__('messages.serial_num')}}</th>
            <td>{{$reservation->car->serial_number}}</td>
          </tr>
          <tr>
            <th scope="row">{{__('messages.address')}}</th>
              @if( App::getLocale()=="ar")
                    <td>{{$reservation->inspection_center->city->name_ar}} - {{$reservation->inspection_center->name}}</td>
              @else
                    <td>{{$reservation->inspection_center->city->name_en}} - {{$reservation->inspection_center->name_en}}</td>
              @endif
          </tr>

        </tbody>
        </table>
      </div>

       <div class=" mb-12 col-md-6 col-sm-12 col-12  myl justify-content-md-center text-center  m-auto print-warp">
            <a href="{{route('reservation.download',['reservation' => $reservation->slug])}}" ><img src="{{ asset('/front2/images/pdf.png') }}"> {{__('messages.download')}}  </a>
            <a href="{{route('reservation.print',['reservation' => $reservation->slug])}}"  target="_blank"><img src="{{ asset('/front2/images/print.png') }}">{{__('messages.print')}}</a>
{{--            <a href="{{route('reservation.cancel',['reservation_slug' => $reservation->slug])}}" ><img src="{{ asset('/front2/images/x-ico.png') }}" width="30px"> الغاء الحجز</a>--}}
            {{--Cancel without confirmed --}}
           <a href="{{route('reservation.cancel',['reservation_slug' => $reservation->slug])}}" ><img src="{{ asset('/front2/images/x-ico.png') }}" width="30px">{{__('messages.cancel_res')}}</a>
           <a href="{{route('reservation.edit',['reservation_slug' => $reservation->slug])}}" ><img src="{{ asset('/front2/images/code.png') }}" width="30px">{{__('messages.update')}}</a>
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
