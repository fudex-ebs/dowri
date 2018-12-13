@extends('layouts.front')
@section('page_css')

@endsection

@section('content')
    <section class="suitable">
        <h2> {{__('messages.contact_us')}}</h2>
        @if($errors->all())

            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $message)
                        <li> {{$message}}</li>
                    @endforeach
                </ul>
            </div>

        @endif
        @if(session('contact'))
            <div class="alert alert-success">
                <p> {{__('messages.contact_msg')}}</p>
            </div>
        @endif
        <form method="post" action="{{route('contact.store')}}" enctype="multipart/form-data">
            <input type='hidden' name='_token' value="{!! csrf_token() !!}">

            <div class="form-group mb-3 col-md-6 col-sm-6 col-6">
                <div class="input-group input remove-icon">
                    <div class="input-group-prepend p-3">
                        <div class="input-group-text"><img src="{{ asset('/front2/images/name.png') }}" width="26" height="18"></div>
                        <input type="text" class="form-control" placeholder="{{__('messages.name')}}" name="name"  value="{{ old('name') }}"
                               data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.name').' '.__('messages.required')}}</span>" >
                    </div>
                </div>
            </div>

            <div class="form-group mb-3 col-md-6 col-sm-6 col-6">
                <div class="input-group input remove-icon">
                    <div class="input-group-prepend p-3">
                        <div class="input-group-text"><img src="{{ asset('/front2/images/email.png') }}" width="26" height="18"></div>
                        <input type="email" class="form-control" placeholder="{{__('messages.email')}}" name="email" value="{{ old('email') }}"
                               data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.email').' '.__('messages.required')}}</span>" >
                    </div>
                </div>
            </div>

            <div class="form-group mb-3 col-md-6 col-sm-6 col-6">
                <div class="input-group input remove-icon">
                    <div class="input-group-prepend p-3">
                        <div class="input-group-text"><img src="{{ asset('/front2/images/mobile.png') }}" width="26" height="18"></div>
                        <input type="tel" class="form-control" placeholder="{{__('messages.mobile')}}" name="mobile_number" value="{{ old('mobile_number') }}"
                               data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.mobile').' '.__('messages.required')}}</span>" >
                    </div>
                </div>
            </div>

            <div class="form-group mb-3 col-md-6 col-sm-6 col-6">
                <div class="input-group input remove-icon">
                    <div class="input-group-prepend p-3">
                        <div class="input-group-text"><img src="{{ asset('/front2/images/name.png') }}" width="26" height="18"></div>
                        <textarea  placeholder="{{__('messages.content')}}" class="form-control" name="content" data-validation="required" data-validation-error-msg-required="<span class='jq-error'>{{__('messages.content').' '.__('messages.required')}}</span>" >{{old('content')}}</textarea>
                    </div>
                </div>
            </div>

            <div class=" mb-3 col-md-12 col-sm-12 col-12" >
                <div class=" input-group mb-3 col-md-12 col-sm-12 col-12">
                    <div class="text-right mt-md-2 mt-2 ">
                        <button class="btn btn-danger">{{__('messages.send')}}</button>
                        <button type="button" class="btn btn-info"><img src="{{ asset('/front2/images/x-ico.png') }}" width="28" height="29" class="align-middle ml-1"> {{__('messages.cancel')}}</button>
                    </div>
                </div>
            </div>

        </form>
    </section>

@endsection
