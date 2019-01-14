
@extends('layouts.master')
@section('title', 'Update Product')
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('model.create') }}
@stop

@section('body.content')

    <form role="form" method="post" action="{{route('product.edit',['id' => $product->id])}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <!-- create manager form -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">@yield('title')</h3>
                        <a href="{{route('product.index')}}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Back to list</a>
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
                            <div class="col-xs-12">
                                <!-- text input -->
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label>Name</label>
                                    <input name="name" value="{{$product->name}}" type="text" class="form-control" placeholder="Enter ..." required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <!-- text input -->
                                <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                    <label>Name</label>
                                    <input name="level" value="{{$product->level}}" type="number" min="0" max="1" class="form-control" placeholder="Enter ..." required>
                                    @if ($errors->has('level'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('level') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Parent Product</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="" disabled="" selected="">Please pick a product</option>
                                        @foreach($productLevelOne as $productItem)
                                            <option value="{{$productItem->id}}" @if($product->parent_id == $productItem->id) selected @endif>{{$productItem->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('product.delete',['id' => $product->id])}}" class="btn btn-danger">Delete</a>
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                    </div>
                </div>

                <!-- /.box -->
            </div>

        </div>
    </form>
@endsection
