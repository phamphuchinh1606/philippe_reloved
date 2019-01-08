<?php ?>
@extends('layouts.master')
@section('title', 'List Model')
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
            <a href="{{route('model.create')}}" class="btn btn-md btn-primary pull-right"><i class="fa fa-plus"></i> New Model</a>
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
                        <td>Name Model</td>
                        <th>Description</th>
                        <th>Branch Name</th>
                        <th>Year</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($models as $key => $model)
                        <tr>
                            <td width="40" align="center">
                                {{$key+1}}
                            </td>
                            <td>
                                {{$model->name}}
                            </td>
                            <td>
                                {{$model->description}}
                            </td>
                            <td>
                                @if(isset($model->brand))
                                    {{$model->brand->name}}
                                @endif
                            </td>
                            <td>
                                {{$model->year}}
                            </td>
                            <td class="actions text-center" style="width: 100px">
                                {{--<a href="" class="btn btn-xs btn-success" title="View"><i class="fa fa-eye"></i></a>--}}
                                <a href="{{route('model.edit',['id'=> $model->id])}}" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil"></i></a>

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
