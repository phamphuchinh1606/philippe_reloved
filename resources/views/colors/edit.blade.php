@extends('layouts.master')
@section('title', 'Edit Color')
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('color.edit',$color->name) }}
@stop
@section('body.content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">@yield('title')</h3>
            {{--<a href="{{route('regions.index')}}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Back to list</a>--}}
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-6 col-sm-push-3">
                    <form role="form" method="post" action="{{route('color.edit',['id' => $color->id])}}" enctype = "multipart/form-data">
                        {{ csrf_field() }}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @if (count($errors) > 0)
                                    <strong>Whoops!</strong> There were some problems with your input.
                                @endif
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div>
                        @endif
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>Color Name</label>
                            <input name="name" value="{{ $color->name }}" type="text" class="form-control" placeholder="Enter ..." required>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-action">
                            <a href="{{route('color.delete',['id' => $color->id])}}" class="btn btn-danger">Delete</a>
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                        </div>
                        <!-- /.box-body -->
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col -->

    </div>
    {{--@endif--}}
@endsection
