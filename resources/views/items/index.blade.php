<?php ?>
@extends('layouts.master')
@section('title', 'List Of Item')
@section('javascript')
    <script src="{{ asset('js/admin/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/admin/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#viewList').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true,
                'order': [],
                'columnDefs': [ { orderable: false, targets: [0]}]
            })
        });
    </script>
@stop
@section('body.breadcrumbs')
    {{ Breadcrumbs::render('model') }}
@stop
@section('body.content')
    <div class="box box-list">
        <div class="box-header clearfix">
            <h3 class="box-title">@yield('title')</h3>
            <a href="{{route('item.create')}}" class="btn btn-md btn-primary pull-right"><i class="fa fa-plus"></i> New Item</a>
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
                                <a href="{{route('item.edit',['id'=> $item->id])}}" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil"></i></a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
@endsection
