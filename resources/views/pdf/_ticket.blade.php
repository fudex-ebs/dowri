<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>دوري</title>
    <style media="screen">
    *,
*::before,
*::after {
box-sizing: border-box;
}

@font-face{font-family:"amr";src: url("../fonts/eccf498f40f4409aa2f90ea06324c255.ttf");}@font-face{font-family:"amr";src: url("../fonts/eccf498f40f4409aa2f90ea06324c255.otf");}@font-face{font-family:"amr";src: url("../fonts/eccf498f40f4409aa2f90ea06324c255.woff");}

body {
color: #363c44;
font-size: 14px;
font-family: 'Roboto', sans-serif;
background-image:url("{{asset('http://127.0.0.1:8011/front2/images/ad.png')}}")
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
height: 53px;
background-color: #c81e54;
}

.ticket-design header .logo img {
float: right;
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
width: 50%;
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
width: 80%;
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
    </style>
</head>
<body>

<div class="container-fluid">
    <div id="preloader">
        <div class="classy-load"></div>
    </div>
    <!--End Loader -->

    <!--Start Header --><!--End Header -->

    <!--Start Form-->
  <section class="suitable">

<!--  <start ticket> -->
<div class=" mb-12  col-md-6 col-sm-12 col-12  myl justify-content-md-center text-left  m-auto pt-5 pb-5 ">
          <div class="ticket-design">
  <header>

  </header>
  <div class="mainSection">
    <div class="leftSection">
      <img src="/front2/images/eye-full.png" class="img-fluid home-img" alt="" >
    </div>
    <div class="rightSection">
      <div class="eventDetails">
        <div class="eventDetail">
          <small>رقم الحجز</small>
          <strong>564789</strong>
        </div>
      </div>
      <div class="infos">
        <div class="places">
          <div class="box">
            <small>الوقت والتاريخ</small>
            <strong>الأحد 30th ابريل 17 (12:00pm/4:00pm)</strong>
          </div>
        </div>
        <div class="times">
          <div class="box">
            <small>الموقع</small>
            <strong>عنوان الموقع هنا</strong>
          </div>
        </div>
      </div>
      <div class="strap">
        <div class="box">
          <div class="passenger">
            <small>رقم اللوحة</small>
            <strong>5678</strong>
          </div>
          <div class="date">
            <small>رقم الشاصية</small>
            <strong>56899</strong>
          </div>
        </div>
        <div class="eventLogo">

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
