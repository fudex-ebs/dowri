@extends('layouts.admin',['page'=>'setting'])
@section('page_css')
    <link href="{{asset('/metronic/assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">Setting</h3>
                </div>
            </div>
        </div>

        <!-- END: Subheader -->
        <div class="m-content">

            <!--Begin::Section-->
            <div class="row">
                <div class="col-xl-12">

                    <!--begin:: Widgets/Top Products-->
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Setting
                                    </h3>
                                </div>
                            </div>

                        </div>
                        <div class="m-portlet__body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if(!empty($setting))
{{--                                {{$setting[0]->id}}--}}
                                <form method="post" action="{{route('setting.update',['id' => $setting->id ])}}" enctype="multipart/form-data">
                                    <input type='hidden' name='_token' value="{!! csrf_token() !!}"/>
                                    @foreach($cols as $col)
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label> {{ucwords(str_replace("_", " ", $col))}}</label>
                                                <input type="text" name="{{$col}}" class="form-control" value="{{$setting->$col ? $setting->$col : ''}}"/>
                                            </div>
                                        </div>
                                    @endforeach

                                    <input type="submit" value="update" class="btn btn-primary"/>
                                </form>
                                @else
                                <form method="post" action="{{route('setting.update')}}" enctype="multipart/form-data">
                                    <input type='hidden' name='_token' value="{!! csrf_token() !!}"/>
                                    @foreach($cols as $col)
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label> {{ucwords(str_replace("_", " ", $col))}}</label>
                                                <input type="text" name="{{$col}}" class="form-control" value=""/>
                                            </div>
                                        </div>
                                    @endforeach

                                    <input type="submit" value="update" class="btn btn-primary"/>
                                </form>

                            @endif


                        </div>

                    </div>

                    <!--end:: Widgets/Top Products-->
                </div>


            </div>

            <!--End::Section-->

        </div>
    </div>
    </div>
@endsection
@section('page_js')
    <script src="{{asset('/metronic/assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#m_table_55').DataTable({
                scrollY: "50vh",
                scrollX: !0,
            });
        } );
    </script>
@endsection
