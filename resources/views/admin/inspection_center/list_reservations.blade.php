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
                    <div class="row search-field">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" id="slug" index="1" class="form-control" placeholder="{{__("messages.search_num")}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" id="name" index="2" class="form-control" placeholder="{{__("messages.name")}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" id="email" index="3" class="form-control" placeholder="{{__("messages.email")}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" id="plate_number" index="4" class="form-control" placeholder="{{__("messages.plate_num")}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" id="chase_number" index="5" class="form-control" placeholder="{{__("messages.serial_num")}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" id="date" index="6" class="form-control" placeholder="{{__("messages.date")}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" id="time" index="7" class="form-control" placeholder="{{__("messages.time")}}">
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="list-table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__("messages.search_num")}}</th>
                                    <th scope="col">{{__("messages.name")}}</th>
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
                                        <td>{{$reservation->slug}}</td>
                                        <td>{{$reservation->user->name}}</td>
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
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            var table = $("#list-table").DataTable({
                // "searching" :false,
                "paging":   false,
                // "ordering": false,
                "info":     false
            })
            $('.dataTables_filter').addClass('hide');

            $(".search-field input").on('keyup change', function() {
                var index = $(this).attr('index');
                // table.column( index).visible( false );

                table.column(index).search(this.value).draw();
            });

            var page_name = $(".admin-page").attr("id");
        });
    </script>

@endsection
