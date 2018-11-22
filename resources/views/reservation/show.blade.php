@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> ticket <a class="btn btn-primary" href="{{route('reservation.download',['Reservation'=> $reservation])}}">download</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                      <label for="">reservation number: </label> {{$reservation->slug}}
                    </p>
                    <p>
                      <label for="">name: </label> {{$reservation->user->name}}
                    </p>
                    <hr />
                    <p>
                      <label for="">plate number : </label> {{$reservation->car->plate_number}}
                    </p>
                    <p>
                      <label for="">serial number: </label> {{$reservation->car->serial_number}}
                    </p>
                    <hr />
                    <p>
                      <label for="">inspection center: </label> {{$reservation->inspection_center->name}}
                    </p>
                    <p>
                      <label for="">city: </label> {{$reservation->inspection_center->city->name_ar}}
                    </p>
                    <hr />
                    <p>
                      <label for="">date: </label> {{$reservation->date}} - {{$reservation->time_period}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
