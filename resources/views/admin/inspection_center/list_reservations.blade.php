@extends('layouts.front')
@section('page_css')
    {{--<style link="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" ></style>--}}
    {{--<style link="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css"> </style>--}}
@endsection
@section('content')
    <section class="suitable">
        <h2>{{__('messages.center_reservation')}}  {{App::getLocale()=="ar" ? $center->name : $center->name_en}} </h2>
    </section>


            <!--Begin::Section-->
            <div class="row listed_table">
                <div class="col-xl-12">

                    <!--begin:: Widgets/Top Products-->
                            <table class="table table-striped- table-bordered table-hover table-checkable" id="list-table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__("messages.name")}}</th>
                                    <th scope="col">{{__("messages.mobile")}}</th>
                                    <th scope="col">{{__("messages.email")}}</th>
                                    <th scope="col">{{__("messages.plate_num")}}</th>
                                    <th scope="col">{{__("messages.serial_num")}}</th>
                                    <th scope="col">{{__("messages.date")}}</th>
                                    <th scope="col">{{__("messages.time")}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($center_reservations as $count => $reservation)
                                    <tr>
                                        <th scope="row">{{$count+1}}</th>
                                        <td>{{$reservation->user->name}}</td>
                                        <td>{{$reservation->user->mobile_number}}</td>
                                        <td>{{$reservation->user->email}}</td>
                                        <td>{{$reservation->car->plate_number}}</td>
                                        <td>{{$reservation->car->serial_number}}</td>
                                        <td>{{$reservation->date}}</td>
                                        <td>{{time_format($reservation->time_period)}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                    <!--end:: Widgets/Top Products-->
                </div>
            </div>

            <!--End::Section-->

@endsection
@section('page_js')
    {{--<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>--}}
    {{--<script>--}}
        {{--$(document).ready(function() {--}}
            {{--$('#list-table').DataTable();--}}
        {{--} );--}}
    {{--</script>--}}

@endsection
