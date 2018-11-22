@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">inspection center - {{$inspection_center->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2>set capacity manualy</h2>
                    <input type="date" id="date" class="form-control" >
                    <hr>
                    <h2>change inspection data</h2>
                    <form method="post" action="{{ route('inspection_center.store') }}" enctype="multipart/form-data">
                    <input type='hidden' name='_token' value="{!! csrf_token() !!}">
                        <div class="row">
                          <div class="form-group col-md-6">
                              <label>name </label>
                              <input type="text" name="name" class="form-control" value="{{$inspection_center->name}}">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6">
                              <label>city </label>
                              <input type="text" name="city" class="form-control" value="{{$inspection_center->city}}">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6">
                              <label>hourly_capacity </label>
                              <input type="text" name="hourly_capacity" class="form-control" value="{{$inspection_center->hourly_capacity}}">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6">
                              <label>mobile_number </label>
                              <input type="text" name="mobile_number" class="form-control" value="{{$inspection_center->mobile_number}}">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6">
                              <label>email </label>
                              <input type="text" name="email" class="form-control" value="{{$inspection_center->email}}">
                          </div>
                          
                        </div>
                        <input type="submit" valu="update" class="btn btn-primary">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
 
  $( document ).ready(function() {
      $('#date').change(function(){
        window.location.href = "/admin/capacity_modification/{{$inspection_center->id}}/"+this.value ;
      });
  });
  
</script>
@endsection
