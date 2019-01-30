
<div >
        <p> عزيزى العميل لقد تم حجز موعدك في الفحص الدوري للسيارات فى يوم {{  $reservation->date }} </p>
        <p> فى وقت {{ time_format($reservation->time_period) }}</p>
        <p> رقم حجزك<strong> {{ $reservation->slug }}</strong> </p>
        <p> , وذلك في فرع {{ $reservation->inspection_center->name }} </p>
        <p> , الرجاء الحضور مبكراً بخمسة دقائق و احضار استماره المركبة. حريصين كل الحرص لخدمتك في وقت موعدك</p><br>
        <a href="#">  عزز_موقفك_بموعد &#x23;</a>

</div>
