<?php ?>
@extends('layouts.master')
@section('title', 'List Of Item')
@section('javascript')
@stop
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('sale_item') }}
@stop
@section('body.content')
    <div class="box box-list">
        <div class="box-header clearfix">
            <h3 class="box-title">@yield('title')</h3>
            <div class="pull-right">
                <button class="btn btn-md btn-success" data-toggle="collapse" data-target="#searchForm"
                   aria-expanded="true" aria-controls="collapseExample">
                    <i class="fa fa-search-plus"></i>
                </button>
            </div>
        </div>
        <div class="box-header clearfix" id="searchForm" style="display: none">
            <form action="{{route('sale_item.index')}}" method="get">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label class="col-form-label" for="status_id">Status</label>
                            @include('commons.status.__select_status',['selectName' => 'status_id','defaultValue' => $searchForm['status_id']])
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label class="col-form-label" for="brand_id">Brand</label>
                            @include('commons.brands.__select_brand',['selectName' => 'brand_id','defaultValue' => $searchForm['brand_id']])
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label class="col-form-label" for="category_id">Category</label>
                            @include('commons.categories.__select_category',['selectName' => 'category_id','defaultValue' => $searchForm['category_id']])
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <label class="col-form-label" for="product_id">Product</label>
                            @include('commons.products.__select_product',['selectName' => 'product_id','defaultValue' => $searchForm['product_id']])
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <button class="btn btn-md btn-primary"><i class="fa fa-search"></i> Search</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            @if (\Session::has('success'))
                <div class="alert alert-success clearfix">
                    <p>{{ \Session::get('success') }}</p>
                </div>
                <br />
            @endif
            <div class="table-responsive">
                <table id="viewList" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Color</th>
                        <th>Status</th>
                        <th>Bought Price</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($items) <= 0)
                        <tr class="odd"><td valign="top" colspan="8" class="dataTables_empty text-center">No data available in table</td></tr>
                    @else
                        @foreach($items as $key => $item)
                            <tr>
                                <td width="40" align="center">
                                    {{$key+1}}
                                </td>
                                <td>
                                    {{$item->title}}
                                </td>
                                <td>
                                    @if(isset($item->brand))
                                        {{$item->brand->name}}
                                    @endif
                                </td>
                                <td>
                                    @if(isset($item->category))
                                        {{$item->category->name}}
                                    @endif
                                </td>
                                <td>
                                    @if(isset($item->color))
                                        {{$item->color->name}}
                                    @endif
                                </td>
                                <td>
                                    @if(isset($item->status))
                                        {{$item->status->name}}
                                    @endif
                                </td>
                                <td>
                                    {{\App\Common\AppCommon::formatMoney($item->bought_price)}}
                                </td>
                                <td class="actions text-center" style="width: 100px">
                                    <a href="{{route('sale_item.edit',['id'=> $item->id])}}" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @if(isset($items))
                    <div class="pull-right">
                        {{$items->appends($searchForm)->links()}}
                    </div>
                @endif
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@endsection
