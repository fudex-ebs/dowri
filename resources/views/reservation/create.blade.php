@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{route('reservation.store')}}" enctype="multipart/form-data">
                        <input type='hidden' name='_token' value="{!! csrf_token() !!}">
                        <h4>user</h4>
                        <div class="row">
                          <div class="form-group ">
                              <label>name </label>
                              <input type="text" name="name" class="form-control" value="moosa">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">
                              <label>mobile number </label>
                              <input type="text" name="mobile_number" class="form-control" value="0540237587">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group ">
                              <label>email </label>
                              <input type="email" name="email" class="form-control" value="moosabukhamsin@gmail.com">
                          </div>
                        </div>
                          <h4>car</h4>
                        <div class="row">
                          <div class="form-group ">
                              <label>plate number </label>
                              <input type="text" name="plate_number" class="form-control" value="123">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group ">
                              <label>chase number </label>
                              <input type="text" name="serial_number" class="form-control" value="321">
                          </div>
                        </div>
                          <h4>reservations</h4>
                        <div class="row">
                          <div class="form-group ">
                              <label>Date </label>
                              <input type="date" name="date" class="form-control" >
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group ">
                              <label>time period </label>

                              <select name="time_period" class="form-control">
                                <option value="p_8_00">8:00-8:30</option>
                                <option value="p_8_30">8:30-9:00</option>
                                <option value="p_9_00">9:00-9:30</option>
                                <option value="p_9_30">9:30-10:00</option>
                                <option value="p_10_00">19:00-10:30</option>
                                <option value="p_10_30">10:30-11:00</option>
                                <option value="p_11_00">11:00-11:30</option>
                                <option value="p_11_30">11:30-12:00</option>
                                <option value="p_12_00">12:00-12:30</option>
                                <option value="p_12_30">12:30-13:00</option>
                                <option value="p_13_00">13:00-13:30</option>
                                <option value="p_13_30">13:30-14:00</option>
                                <option value="p_14_00">14:00-14:30</option>
                                <option value="p_14_30">14:30-15:00</option>
                                <option value="p_15_30">15:30-16:00</option>
                                <option value="p_16_00">16:00-16:30</option>
                                <option value="p_16_30">16:30-17:00</option>

                              </select>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group ">
                              <label>inspection center id </label>
                              <select class="form-control" name="inspection_center_id">
                                @foreach($InspectionCenters as $center)
                                <option value="{{$center->id}}">{{$center->name}}</option>
                                @endforeach
                              </select>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group ">
                              <label>discount code </label>
                              <input type="text" name="discount_code" class="form-control" >
                          </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="send">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
