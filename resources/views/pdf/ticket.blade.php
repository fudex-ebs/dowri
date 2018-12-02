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

.ticket-design header {
padding: 12px 20px;
height: 60px;
background-color: #c81e54;
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
    </style>

    <title>دوري</title>
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
    <div class="logo"> <img src="data:image/png;base64,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
      " alt="" width='45px' ></div>
  </header>
  <div class="mainSection">

    <div class="rightSection">
      <div class="eventDetails">
        <div class="eventDetail">
          <small>رقم الحجز</small>
          <strong>{{$reservation->slug}}</strong>
        </div>
      </div>
      <div class="infos">
        <div class="places">
          <div class="box">
            <small>الاسم</small>
            <strong>{{$reservation->user->name}}</strong>
          </div>
        </div>
        <div class="times">
          <div class="box">
            <small>رقم الجوال</small>
            <strong>{{$reservation->user->mobile_number}}</strong>
          </div>
        </div>
      </div>
      <div class="infos">
        <div class="places">
          <div class="box">
            <small>الوقت والتاريخ</small>
            <strong>{{$reservation->date}} | {{time_format($reservation->time_period)}}</strong>
          </div>
        </div>
        <div class="times">
          <div class="box">
            <small>الموقع</small>
            <strong>{{$reservation->inspection_center->name}} - {{$reservation->inspection_center->city->name_ar}}</strong>
          </div>
        </div>
      </div>

      <div class=" infos_2">
        <div class="places">
          <div class="box">
            <div class="passenger">
              <small>رقم اللوحة</small>
              <strong>{{$reservation->car->plate_number}}</strong>
            </div>
            <div class="date">
              <small>رقم الشاصية</small>
              <strong>{{$reservation->car->serial_number}}</strong>
            </div>
          </div>
        </div>
        <div class="times">

            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($reservation->slug)) !!} " style="position: absolute;left: 0;float:left">

        </div>
      </div>

    </div>
  </div>
</div>


    </div>

 <!--  <end ticket> -->




        </section>


</div>



</body>
</html>
