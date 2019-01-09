<!DOCTYPE html>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/pdf; charset=utf-8"/>
    <!-- Bootstrap CSS -->
    <style>
body {
color: #363c44;
font-size: 14px;
font-family: 'Roboto', sans-serif;
}

.ticket-design {
top: 50%;
left: 50%;
background: #fff;
border: 2px solid #c81e54;
box-shadow: 0 5px 30px rgba(0, 0, 0, .2);
overflow: hidden;
direction: rtl;
font-family: 'amr';
}

.ticket-design small {
display: block;
font-size: 11px;
color: #a2a9b3;
margin-bottom: 2px;
}

.ticket-design small {
    display: block;
    font-size: 11px;
    color: #a2a9b3;
    margin-bottom: 2px;
  }

  .ticket-design header {
      height: 90px;
      background-color: #c81e54;
      padding-top: 12px;
      padding-right: 20px;
      padding-bottom: 12px;
      padding-left: 20px;
      text-align: center
  }

  .ticket-design header .logo img {
      max-height:76px;
      float: none;
      margin: auto;
      clear: both;
      display: block;
  }
  .ticket-design header .logo span {
      float: right;
      font-size: 24px;
      color: #FFFFFF;
      text-transform: uppercase;
      padding-right: 20px;
  }

.ticket-design .rightSection .eventDetails {
position: relative; text-align:right
}

.ticket-design .mainSection:after,
.ticket-design .mainSection .leftSection::after,
.ticket-design .mainSection .times::after,
.ticket-design .rightSection .infos:after,
.ticket-design .rightSection .eventDetails::after,
.ticket-design .rightSection .infos .places::after,
.ticket-design .rightSection .infos .times::after,
.ticket-design .strap::after {
content: '';
display: table;
clear: both;
}

.ticket-design .rightSection .eventDetails .eventDetail {
padding: 20px 18px;
float: right;
}

.ticket-design .rightSection .eventDetails .eventDetail:nth-child(2) {
float: left;
}

.ticket-design .rightSection .eventDetails .eventDetail strong {
font-size: 20px;
font-weight: 300;
line-height: 1;
}

.ticket-design .rightSection .eventDetails .eventDetail small {
margin-bottom: 0;
margin-right: 3px;
}

.ticket-design .rightSection .infos {
width: 100%;
border-top-width: 1px;
border-bottom-width: 1px;
border-top-style: dashed;
border-bottom-style: dashed;
border-top-color: #d44572;
border-bottom-color: #d44572;
}

.ticket-design .rightSection .infos .places,
.ticket-design .rightSection .infos .times {
width: 49%;
height: 80px;
padding: 10px 0;
}

.ticket-design .rightSection .infos .places {
float: right;
}

.ticket-design .rightSection .infos .times {
float: left;
}

.ticket-design .rightSection .infos .times strong {
transform: scale(0.9);
transform-origin: right bottom;
}

.ticket-design .rightSection .infos .places {
border-left-width: 5px;
border-left-style: solid;
border-left-color: #d44572;
}

.ticket-design .rightSection .infos .places small {
color: #97a1ad;
}

.ticket-design .rightSection .infos .box {
padding: 10px 20px 10px;
float: right; text-align:right
}

.ticket-design .rightSection .infos .box small {
font-size: 10px;
width: 100%;
}

.ticket-design .mainSection {
position: relative;
border-top-width: 2px;
border-top-style: solid;
border-top-color: #d44572;
}

.ticket-design .mainSection .leftSection {
width: 20%;
position: absolute;
left: 0;
right: 0;
top: 0;
bottom: 0;
border-right-width: 1px;
border-right-style: dashed;
border-right-color: #d44572;
}

.ticket-design .mainSection .leftSection .qrcode img {
width: auto;
height: auto;
position: absolute;
left: 0;
right: 0;
margin: auto;
}

.ticket-design .mainSection .rightSection {
width: 100%;
float: left;
}

.ticket-design .mainSection .times strong {
transform: scale(0.9);
transform-origin: right bottom;
}

.ticket-design .mainSection .box {
padding: 10px 20px 10px;
float: right;
font-size: 13px;
}

.ticket-design .mainSection .box small {
font-size: 10px;
}

.ticket-design .strap {
clear: both;
position: relative; text-align:right
/*border-top: 1px solid #99d298;*/
}

.ticket-design .strap .box {
padding-top: 23px;
padding-right: 20;
padding-bottom: 20px;
padding-left: 0px;
}

.ticket-design .strap .box div {
margin-bottom: 15px;
}

.ticket-design .strap .box div small {
font-size: 10px;
}

.ticket-design .strap .box div strong {
font-size: 13px;
}

.ticket-design .strap .box sup {
font-size: 8px;
position: relative;
top: -5px;
}

.ticket-design .strap .eventLogo img {
position: absolute;
top: 20px;
left: 20px;
width: 100px;
height: 100px;
float: right;
}

.ticket-design .rightSection .infos_2 {
width: 100%;
border-top-width: 1px;
border-bottom-width: 1px;
border-top-style: dashed;
border-bottom-style: dashed;
border-top-color: #d44572;
border-bottom-color: #d44572;
}

.ticket-design .rightSection .infos_2 .places,
.ticket-design .rightSection .infos_2 .times {
width: 49%;
height: 80px;
padding: 10px 0;
}

.ticket-design .rightSection .infos_2 .places {
float: right;
}

.ticket-design .rightSection .infos_2 .times {
float: left;
}

.ticket-design .rightSection .infos_2 .times strong {
transform: scale(0.9);
transform-origin: right bottom;
}

.ticket-design .rightSection .infos_2 .places {

}

.ticket-design .rightSection .infos_2 .places small {
color: #97a1ad;
}

.ticket-design .rightSection .infos_2 .box {
padding: 10px 20px 10px;
float: right; text-align:right
}

.ticket-design .rightSection .infos_2 .box small {
font-size: 10px;
width: 100%;
}
.ticket-design .rightSection .infos_2 .times .box{
  left: 0;
  position: absolute;
}
.ticket-design .rightSection .infos_3 .times {
  position: absolute;
  text-align: center;
  margin: 10px;
}

    </style>

    <title>{{__('messages.dowri')}}</title>
</head>
<body>

<div class="container-fluid">

    <!--End Loader -->

    <!--Start Header --><!--End Header -->

    <!--Start Form-->
  <section class="suitable">

<!--  <start ticket> -->
<div class=" mb-12  col-md-6 col-sm-12 col-12  myl justify-content-md-center text-left  m-auto pt-5 pb-5 ">
          <div class="ticket-design">
  <header>
    <div class="logo"> <img src=" data:image/png;base64,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 " alt="" width='45px' ></div>
  </header>
  <div class="mainSection">

    <div class="rightSection">
      <div class="eventDetails">
        <div class="eventDetail">
          <small> {{__('messages.search_num')}} </small>
          <strong>{{$reservation->slug}}</strong>
        </div>
      </div>
      <div class="infos">
        <div class="places">
          <div class="box">
            <small>{{__('messages.name')}} </small>
            <strong>{{$reservation->user->name}}</strong>
          </div>
        </div>
        <div class="times">
          <div class="box">
            <small>{{__('messages.mobile')}}</small>
            <strong>{{$reservation->user->mobile_number}}</strong>
          </div>
        </div>
      </div>
      <div class="infos">
        <div class="places">
          <div class="box">
            <small>  {{__('messages.date_time')}}</small>
            <strong>{{$reservation->date}} | {{time_format($reservation->time_period)}}</strong>
          </div>
        </div>
        <div class="times">
          <div class="box">
            <small>{{__('messages.location')}}</small>
            @if( App::getLocale()=="ar")
              <strong>{{$reservation->inspection_center->city->name_ar}} - {{$reservation->inspection_center->name}}</strong>
            @else
              <strong>{{$reservation->inspection_center->city->name_en}} - {{$reservation->inspection_center->name_en}}</strong>
            @endif
          </div>
        </div>
      </div>

      <div class=" infos_2">
        <div class="places">
          <div class="box">
            <div class="passenger">
              <small> {{__('messages.plate_num')}}</small>
              <strong>{{$reservation->car->plate_number}}</strong>
            </div>
            <div class="date">
              <small>{{__('messages.serial_num')}}</small>
              <strong>{{$reservation->car->serial_number}}</strong>
            </div>
          </div>
        </div>
        <div class="times">
          <div class="box">
            <small> {{__('messages.reserved_date')}}</small>
            <strong>{{$reservation->created_at->format('d-m-Y')}} </strong>
          </div>
        </div>
        <div class="times">

            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($reservation->slug)) !!} " style="position: absolute;left: 0;float:left">

        </div>
      </div>
      @if(isset($reservation->inspection_center->ad_img))
        <div class=" infos_3">
          <div class="times">
              <img src="{{$reservation->img_code}}" style="width: 300px;height: 300px;">
          </div>
        </div>
      @endif


    </div>
  </div>
</div>


    </div>

 <!--  <end ticket> -->




        </section>


</div>



</body>
</html>
