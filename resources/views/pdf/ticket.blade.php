<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/pdf; charset=utf-8"/>
<style>
  body { font-family: DejaVu Sans, sans-serif;
          direction: rtl !important;}

</style>
<body>
  <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($reservation->slug)) !!} ">
  <p>
    <label for="">رقم الحجز: </label> {{$reservation->slug}}
  </p>
  <p>
    <label for="">الاسم: </label> {{$reservation->user->name}}
  </p>
  <hr />
  <p>
    <label for="">رقم اللوحة : </label> {{$reservation->car->plate_number}}
  </p>
  <p>
    <label for="">رقم الشاصي: </label> {{$reservation->car->serial_number}}
  </p>
  <hr />
  <p>
    <label for="">الموقع: </label> {{$reservation->inspection_center->name}} - {{$reservation->inspection_center->city->name_ar}}
  </p>
  <hr />
  <p>
    <label for="">التاريخ: </label> {{$reservation->date}} | {{time_format($reservation->time_period)}}
  </p>

</body>
</html>
