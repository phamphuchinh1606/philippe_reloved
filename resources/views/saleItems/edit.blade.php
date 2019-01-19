
@extends('layouts.master')
@section('title', 'Edit Item')
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('sale_item.edit',$item->title) }}
@stop

@section('body.content')

    <div class="row">
        <div class="col-md-8">
            <form role="form" method="post" action="{{route('sale_item.edit',['id' => $item->id])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
                <!-- create manager form -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">@yield('title')</h3>
                        <a href="{{route('sale_item.index')}}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Back to list</a>
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
                                    <input name="title" value="{{$item->title}}" type="text" class="form-control" placeholder="Enter ..." required>
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
                                    <input name="model" value="{{$item->model}}" type="text" class="form-control" placeholder="Enter ..." required>
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
                                    <input name="bought_price" value="{{$item->bought_price}}" type="number" class="form-control" placeholder="Enter ..." required>
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
                                    <textarea name="description" class="form-control" rows="4" placeholder="Enter ..." required>{{$item->description}}</textarea>
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
                        <a href="{{route('item.delete',['id' => $item->id])}}" class="btn btn-danger">Delete</a>
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                    </div>
                </div>
            <!-- /.box -->
            </form>
        </div>
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">List Photo</h3>
                    <button class="btn btn-xs btn-primary pull-right" type="button" data-toggle="collapse" data-target="#collapseAddImage"
                            aria-expanded="true" aria-controls="collapseExample"
                            data-placement="top" data-toggle="tooltip" title data-original-title="Add Image">
                        <i class="fa fa fa-plus fa-lg"></i>
                    </button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <form action="{{route('item_photo.create',['itemId' => $item->id])}}" method="post"  enctype="multipart/form-data" id="formBanner">
                            @csrf
                            <div class="col-md-12 collapse" id="collapseAddImage">
                                <div class="text-right p-sm-1" id="btn_add_image" style="display: none">
                                    <button type="submit" class="btn btn-primary">Add Image</button>
                                </div>
                                <div class="form-group">
                                    <label>Label</label>
                                    <input name="label" type="text" class="form-control" placeholder="Enter ..." required>
                                    @if ($errors->has('label'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('label') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="upload__area-image">
                            <span>
                                <img id="imgAdd" style="max-height: 400px" src="http://beats-city.amagumolabs.io/images/upload/no_image_available.jpg">
                                <label for="imageFileAdd">Upload image</label>
                            </span>
                                    <p><small>(Please upload a file of type: jpeg, png, jpg, gif, svg.)</small></p>
                                </div>
                                <div class="form__upload">
                                    <div class="form-inline-simple">
                                        <input type="file" name="photo_src" class="form-control imgAnchorInput" style="display: none" id="imageFileAdd" onchange="loadFileImage(event)">
                                    </div>
                                    <script>
                                        var loadFileImage = function(event) {
                                            var output = document.getElementById('imgAdd');
                                            console.log(output);
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            document.getElementById('btn_add_image').style.display = 'block';
                                        };
                                    </script>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if(isset($item->photos) && count($item->photos))
                        <div class="row" style="padding: 10px">
                            <div class="col-md-4" style="font-weight: bold">Image</div>
                            <div class="col-md-6" style="font-weight: bold">Label</div>
                        </div>
                        @foreach($item->photos as $key => $photo)
                            <div class="row" style="border-bottom: solid 1px #3f729b;  @if($key == 0) border-top: solid 1px #3f729b; @endif padding: 10px">
                                <div class="col-md-4">
                                    <img src="{{\App\Common\ImageCommon::showImage($photo->photo_src)}}" style="width: 100%"/>
                                </div>
                                <div class="col-md-6">
                                    {{$photo->label}}
                                </div>
                                <div class="col-md-2">
                                    <a href="{{route('item_photo.delete',['itemId' => $item->id, 'id' => $photo->id])}}" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
