<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/pdf; charset=utf-8"/>
    <style>
           /* *,
            *::before,
            *::after {
              box-sizing: border-box;
            }*/


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
        font-family: 'Roboto', sans-serif;

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
    text-align:center;
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
.ticket-design .rightSection .eventDetails .general {
	float: right;
	padding-top: 0px;
	padding-right: 18px;
	padding-bottom: 0px;
	padding-left: 18px;
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
  width: 100%;
}
.ticket-design .rightSection .infos .times .box{
    position: absolute;
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
.ticket-design .strap2 {
  clear: both;
  position: relative;
  /*border-top: 1px solid #99d298;*/
}

.ticket-design .strap img {
	clear: both;
	position: relative;
	margin: auto;
	float: none;  /*border-top: 1px solid #99d298;*/
	display: block;
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
.ico{
	float: right;
	height: 40px;
	width: 40px;
}

.ticket-design .strap .eventLogo img {
	position: relative;
	width: 100px;
	height: 100px;
	float: none;
	text-align:center;
	clear: both;
	display: block;
	margin-top: 20px;
	margin-right: auto;
	margin-bottom: 20px;
	margin-left: auto;
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

</style>

<title>دوري</title>
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
<div class=" mb-12  col-md-4 col-sm-12 col-12  myl justify-content-md-center text-left  m-auto pt-5 pb-5 ">
          <div class="ticket-design">
  <header>
    <div class="logo "><img src=" data:image/png;base64,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" ></div>
  </header>
  <div class="mainSection">

    <div class="rightSection">
      <div class="eventDetails">
        <div class="eventDetail">
            <small>اﻷسم </small>
            <strong>{{$reservation->user->name}}</strong>
        </div>
      </div>
      <div class="infos">
        <div class="places">
          <div class="box">
            <small> رقم الحجز </small>
            <strong>{{$reservation->slug}}</strong>
          </div>
        </div>
        <div class="times">
          <div class="box">
            <small>مكان الحجز</small>
            @if( App::getLocale()=="ar")
              <strong>{{$reservation->inspection_center->city->name_ar}} - {{$reservation->inspection_center->name}}</strong>
            @else
              <strong>{{$reservation->inspection_center->city->name_en}} - {{$reservation->inspection_center->name_en}}</strong>
            @endif
          </div>
        </div>
      </div>
      <div class="infos">
        <div class="places">
          <div class="box">
            <small>وقت الحجز</small>
            <strong>{{$reservation->date}} | {{time_format($reservation->time_period)}}</strong>

          </div>
        </div>
        <div class="times">
          <div class="box">
            <small>معلومات المركبة</small>
            <strong>{{$reservation->car->plate_number}}</strong> | <strong>{{$reservation->car->serial_number}}</strong>
          </div>
        </div>
    </div>
    <div class="strap">
        <div class="eventLogo" style="text-align: center ; left:0">
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($reservation->slug)) !!} ">
        </div>
    </div>

    <div class="eventDetails">
        <div class="eventDetail">
            <ul class="list-unstyled" style="list-style: none">
                <li>
                    <img src=" data:image/png;base64,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"  class="mx-auto mr-2"  > الرجاء الحضور قبل الموعد بعشر دقائق</li>
                <li>
                    <img src=" data:image/png;base64,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"  class="mx-auto mr-2"  > احضار استمارة السيارة</li>

            </ul>
        </div>
    </div>

      <div class="eventDetails "> <div class="general">
       <h3>الشروط والاحكام</h3>
       <p>لايمكن تغير او إالغاء الموعد قبل الموعد المحجوز بأقل من اربعة و عشرون ساعة.</p>
       <p>بينما اذا تم الإلغاء خلال المدة المسموح فيها بالتعديل و الإلغاء فسوف يتم خصم 30% من اجمالي سعر التذكرة المدفوعة و سوف يتم أرجاع باقي المبلغ وفقاً لسياسة البنوك السعودية المتبعة.</p>
       <p>لا توجد أي رسوم مصاحبه لتغيير الموعد و لكن هناك حد اقصى للتغير و هو مرتين متتاليتي.</p>
    </div>
</row>
      <div class="eventDetail eventLogo" style="float:left; text-align:center">
            @if(isset($reservation->inspection_center->ad_img))
                  <img src="{{$reservation->img_code}}" class="img-fluid" style="width: 300px;height: 250px;">
            @else
                <img src="" class="img-fluid"></div>
            @endif

      <div class="general" style="margin-top:100px">
        <p><strong>العنوان :</strong> الدمام - الواحة - المملكة العربية السعودية </p>
        <p><strong>الايميل :</strong> Support@doari.co </p>
      </div>
    </div>
  </div>
</div>


    </div>

</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="plugins/menu/webslidemenu.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
