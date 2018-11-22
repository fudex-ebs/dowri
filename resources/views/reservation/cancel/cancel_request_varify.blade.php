@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">reservation cancel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{route('reservation.cancel_verify_post',['slug'=>$slug])}}" enctype="multipart/form-data">
                        <input type='hidden' name='_token' value="{!! csrf_token() !!}">
                        <div class="row">
                          <div class="form-group ">
                              <label>an sms has been send please enter the number </label>
                              <input type="text" name="verify_code" class="form-control" >
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
