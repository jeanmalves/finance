@extends('layouts.app')

@section('title', 'Categorias de lançamento')

@section('content_header')
    <h1>
        <i class="fa fa-user"></i>
        Categorias de Lançamento
        <small>Lista de categorias</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/categories"> Categorias de lançamento</a></li>
        <li class="active">Lista de categorias</li>
    </ol>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>
                <i class="icon fa fa-check"></i>
                {{ session('success') }}
            </h4>
        </div>
    @endif

    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <a href="/categories/create" class="btn btn-primary">
                <i class="fa fa-database"></i>
                Adicionar nova categoria
            </a>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                            <!-- /.box-header -->
                    <div class="box-body">
                        <table id="categories" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Tipo de lançamento</th>
                                    <th>Data criação</th>
                                    <th class="actions">&nbsp;</th>
                                    <th class="actions">&nbsp;</th>
                                </tr>
                            </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->type == 'C' ? 'Entrada' : 'Saída'  }}</td>
                                    <td>{{ $category->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <i class="fa fa-fw fa-edit"></i>
                                    </td>
                                    <td>
                                        <i class="fa fa-fw fa-trash-o"></i>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>Tipo de lançamento</th>
                                    <th>Data criação</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- /.box-body -->
                    </div>
                   <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@stop
@push('js')
    <script type="text/javascript">
    $( document ).ready(function() {
        var table = $('#categories').DataTable({
            "columns": [
                {"data": "name"},
                {"data": "type"},
                {"data": "created_at"},
                {"data": "update", "defaultContent": "<i class=\"fa fa-fw fa-edit\"></i>"},
                {"data": "delete", "defaultContent": "<i class=\"fa fa-fw fa-trash-o\"></i>"},
            ],
            "columnDefs": [{
                "targets"  : [3, 4],
                "orderable": false,
                "searchable": false
             }],
             "order": [[ 2, 'desc' ]],
            "lengthChange": false

        });
    });
    </script>
@endpush
