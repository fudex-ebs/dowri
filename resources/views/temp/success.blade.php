@extends('layouts.front')
@section('page_css')

@endsection
@section('content')
<!--Start Form-->
  <section class="suitable">
      <div class=" mb-12 col-md-6 col-sm-12 col-12  myl justify-content-md-center text-center  m-auto">
        <table class=" table   table-bordered success-table shadow p-3 mb-5 bg-white rounded ">
        <thead class=" red">
          <tr class="red">
            <th class="red" colspan="2" scope="col" ><img src="/front2/images/right.png">  تم الحجز بنجاح</th>
            </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">رقم الحجز</th>
            <td>{{$reservation->slug}}</td>
          </tr>
          <tr>
            <th scope="row">سعر التذكرة</th>
            <td>{{$reservation->car->car_type->price}}</td>
          </tr>
          <tr>
            <th scope="row">الاسم</th>
            <td>{{$reservation->user->name}}</td>
          </tr>
          <tr>
            <th scope="row">تاريخ الحجز</th>
            <td>{{$reservation->date}} | {{time_format($reservation->time_period)}}</td>
          </tr>
          <tr>
            <th scope="row">نوع السيارة</th>
            <td>{{$reservation->car->car_type->name_ar}}</td>
          </tr>
          <tr>
            <th scope="row">رقم اللوحة</th>
            <td>{{$reservation->car->plate_number}}</td>
          </tr>
          <tr>
            <th scope="row">رقم الشاصيه</th>
            <td>{{$reservation->car->serial_number}}</td>
          </tr>
          <tr>
            <th scope="row">العنوان</th>
            <td>{{$reservation->inspection_center->city->name_ar}} - {{$reservation->inspection_center->name}}</td>
          </tr>

        </tbody>
        </table>
      </div>

       <div class=" mb-12 col-md-6 col-sm-12 col-12  myl justify-content-md-center text-center  m-auto print-warp">
         <a href="{{route('reservation.download',['reservation' => $reservation->slug])}}" ><img src="/front2/images/pdf.png"> تحميل التذكرة</a>
         <a href="{{route('reservation.print',['reservation' => $reservation->slug])}}"  target="_blank"><img src="/front2/images/print.png"> طباعة التذكرة</a>
         <a href="{{route('reservation.cancel',['reservation_slug' => $reservation->slug])}}"  target="_blank"><img src="/front2/images/x-ico.png" width="30px"> الغاء الحجز</a>
       </div>
    </section>
<!--End Eye animation -->

<!--Start Form-->
<section class="ad text-center mb-3">
    <div class="flex-row">
        <div class="col-md-12">
            <a href="javascript:void(0)">
                <img src="/front2/images/ad.png" alt="">
            </a>
        </div>
    </div>

</section>
<!--End Form -->
@endsection
@section('page_js')

@endsection
