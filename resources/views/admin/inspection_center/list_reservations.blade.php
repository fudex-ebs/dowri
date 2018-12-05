@extends('layouts.admin',['page' => 'inspection_center'])
@section('page_css')
    <link href="/metronic/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">

            <!--Begin::Section-->
            <div class="row">
                <div class="col-xl-12">

                    <!--begin:: Widgets/Top Products-->
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height " style="height:fit-content;">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                       {{$center_name}} Inspection Center Reservations
                                    </h3>
                                </div>
                            </div>

                        </div>
                        <div class="m-portlet__body">
                            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">name</th>
                                    <th scope="col">mobile number</th>
                                    <th scope="col">email</th>
                                    <th scope="col">plate number</th>
                                    <th scope="col">chase number</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">time</th>
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
                                        <td>{{$reservation->time_period}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>                        </div>
                    </div>

                    <!--end:: Widgets/Top Products-->
                </div>
            </div>

            <!--End::Section-->

        </div>
    </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">add car type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('car_type.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">

                        <input type='hidden' name='_token' value="{!! csrf_token() !!}">
                        <div class="row">
                            <div class="form-group col-md-9">
                                <label>name ar </label>
                                <input type="text" name="name_ar" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-9">
                                <label>name en </label>
                                <input type="text" name="name_en" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-9">
                                <label>price </label>
                                <input type="number" name="price" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <input type="submit" class="btn btn-primary" value="حفظ">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('page_js')
    <script src="/metronic/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
    <script src="/metronic/assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
    <script src="/metronic/assets/demo/default/custom/components/calendar/basic.js" type="text/javascript"></script>
    <script src="/js/admin/custom.js" type="text/javascript"></script>
@endsection
