
@extends('layouts.master')
@section('title', 'Create User')
@section('body.breadcrumbs')
    {{--{{ Breadcrumbs::render('leads.create') }}--}}
@stop
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link rel="stylesheet" href="{{asset('css/admin/intlTelInput.css')}}">
@endsection

@section('javascript')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script src="{{asset('js/admin/intlTelInput.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var date_input=$('input.date'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'dd/mm/yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            });

            $("#phone").intlTelInput({
                allowDropdown: false,
                localizedCountries: {'de': 'Deutschland' },
                preferredCountries: ['vn', 'jp'],
                separateDialCode: true,
                utilsScript: "{{asset('js/admin/utils.js')}}"
            });
        })
    </script>
@endsection

@section('body.content')

    <form role="form" method="post" action="{{route('user.create')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <!-- create manager form -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">@yield('title')</h3>
                        <a href="{{route('user.index')}}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Back to list</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-xs-6">
                                <!-- text input -->
                                <div class="form-group{{ $errors->has('full_name') ? ' has-error' : '' }}">
                                    <label>Full Name</label>
                                    <input name="full_name" value="{{old('full_name')}}" type="text" class="form-control" placeholder="Enter ..." required>
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('full_name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <!-- text input -->
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label>Email</label>
                                    <input name="email" value="{{old('email')}}" type="text" class="form-control" placeholder="Enter ..." required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <!-- text input -->
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label>Password</label>
                                    <input name="password" value="{{old('password')}}" type="password" class="form-control" placeholder="Enter ..." required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <!-- text input -->
                                <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                                    <label>Confirm Password</label>
                                    <input name="confirm_password" value="{{old('confirm_password')}}" type="password" class="form-control" placeholder="Enter ..." required>
                                    @if ($errors->has('confirm_password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('confirm_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6">
                                <!-- text input -->
                                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                    <label>City</label>
                                    <input name="city" value="{{old('city')}}" type="text" class="form-control" placeholder="Enter ...">
                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group group__gender">
                                    <label style="width: 100%">Status</label>
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" value="Public" name="active" checked>
                                            Active
                                        </label>
                                    </div>
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" value="Un Public" name="active">
                                            Un Active
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input id="imgHandleInput" name="avatar" type="file" value="">
                        <a href="{{route('user.index')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Create</button>
                    </div>
                </div>

                <!-- /.box -->
            </div>
            <div class="col-md-4">
                <!-- Profile Image -->
                <div class="box box-warning">
                    <div class="box-body">
                        <div class="upload__area-image">
                        <span>
                            <img id="imgHandle" src="{{asset('images/no_image_available.jpg')}}" style="height: 335px">
                            <label for="imgAnchorInput">Upload image</label>
                        </span>
                            <p><small>(Please upload a file of type: jpeg, png, jpg, gif, svg.)</small></p>
                        </div>
                        <div class="form__upload">
                            <form action="" enctype="multipart/form-data" method="post">
                                <div class="form-inline-simple">
                                    <input type="file" class="'form-control" id="imgAnchorInput" onchange="loadFile(event)">
                                    {{--{!! Form::file('image', array('class' => 'form-control', 'id' => 'imgAnchorInput', 'onchange' =>'loadFile(event)')) !!}--}}
                                    {{--<button type="submit" class="btn btn-info">Upload</button>--}}
                                </div>
                                <script>
                                    var loadFile = function(event) {
                                        var output = document.getElementById('imgHandle');
                                        output.src = URL.createObjectURL(event.target.files[0]);
                                        document.getElementById('imgHandleInput').files = event.target.files;
                                    };
                                </script>

                            </form>

                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>

        </div>
    </form>
@endsection
