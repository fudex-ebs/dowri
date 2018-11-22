<h2 >{{$reservation->slug}}</h2>

<div >
	<p>لقد تم تاكيد حجزك بتاريخ {{$reservation->date}} | {{time_format($reservation->time_period)}}</p>

</div>
