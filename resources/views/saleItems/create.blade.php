
@extends('layouts.master')
@section('title', 'Create Item')
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('sale_item.create') }}
@stop

@section('body.content')

    <form role="form" method="post" action="{{route('item.create')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <!-- create manager form -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">@yield('title')</h3>
                        <a href="{{route('item.index')}}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Back to list</a>
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
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label>Name</label>
                                    <input name="title" value="{{old('title')}}" type="text" class="form-control" placeholder="Enter ..." required>
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group{{ $errors->has('brand_id') ? ' has-error' : '' }}">
                                    <label class="col-form-label" for="brand_id">Brand</label>
                                    @include('commons.brands.__select_brand',['selectName' => 'brand_id','defaultValue' => $item->brand_id])
                                    @if ($errors->has('brand_id'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('brand_id') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                    <label class="col-form-label" for="category_id">Category</label>
                                    @include('commons.categories.__select_category',['selectName' => 'category_id','defaultValue' => $item->category_id])
                                    @if ($errors->has('category_id'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('category_id') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group{{ $errors->has('color_id') ? ' has-error' : '' }}">
                                    <label class="col-form-label" for="category_id">Color</label>
                                    @include('commons.colors.__select_color',['selectName' => 'color_id','defaultValue' => $item->color_id])
                                    @if ($errors->has('color_id'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('color_id') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group{{ $errors->has('product_id') ? ' has-error' : '' }}">
                                    <label class="col-form-label" for="product_id">Product</label>
                                    @include('commons.products.__select_product',['selectName' => 'product_id','defaultValue' => $item->product_id])
                                    @if ($errors->has('product_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('product_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">
                                    <label class="col-form-label" for="status_id">Status</label>
                                    @include('commons.status.__select_status',['selectName' => 'status_id','defaultValue' => $item->status_id])
                                    @if ($errors->has('status_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('status_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                                    <label>Model</label>
                                    <input name="model" value="{{old('model')}}" type="text" class="form-control" placeholder="Enter ..." required>
                                    @if ($errors->has('model'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('model') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group{{ $errors->has('bought_price') ? ' has-error' : '' }}">
                                    <label>Bought Price</label>
                                    <input name="bought_price" value="{{old('bought_price')}}" type="number" class="form-control" placeholder="Enter ..." required>
                                    @if ($errors->has('bought_price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('bought_price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="4" placeholder="Enter ..." required>{{old('bought_price')}}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('bought_price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('item.index')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Create</button>
                    </div>
                </div>

                <!-- /.box -->
            </div>

        </div>
    </form>
@endsection
