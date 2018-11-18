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
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4></h4>
    </div>
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-database"></i>
                Adicionar nova categoria
            </button>
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="category-form" action="{{ url('/categories') }}" class="form-horizontal">
                            @csrf
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Adicionar Nova Categoria de Lançamento</h4>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <div id="fg-category-name" class="form-group">
                                        <label for="category-name">Categoria</label>
                                        <input type="text" name="name" class="form-control" id="category-name" placeholder="Digite a categoria">
                                    </div>
                                    <div id="fg-category-type" class="form-group">
                                        <label for="category-type">Tipo da categoria</label>
                                        <select name="type" id="category-type" class="form-control">
                                            <option value="C">Entrada</option>
                                            <option value="D">Saída</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
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
        $('.alert-success').hide();
        $('.alert-success').find('h4').text('');
        $('#modal-default').on('hidden.bs.modal', function(e) {
            resetForm();
        });

        var table = $('#categories').DataTable({
            "columnDefs": [{
                "targets"  : 'actions',
                "orderable": false,
                "order": []
             }],
            'lengthChange': false
        });

        $('#category-form').submit((e) => {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: $('#category-form').attr('action'),
                method: 'POST',
                data: {
                    name: $('#category-name').val(),
                    type: $('#category-type').children('option:selected').val()
                },
                success: (result) => {
                    if (result.errors) {
                        if (result.errors.name) {
                            $('#category-form').find('#fg-category-name').addClass('has-error');
                            $('#category-form').find('#fg-category-name').append(
                                '<span class="help-block">' +
                                '    <strong>' + result.errors.name + '</strong>' +
                                '</span>');
                        }

                        if (result.errors.type) {
                            $('#category-form').find('#fg-category-type').addClass('has-error');
                            $('#category-form').find('#fg-category-type').append(
                                '<span class="help-block">' +
                                '    <strong>' + result.errors.type + '</strong>' +
                                '</span>');
                        }
                    }

                    if (result.success) {
                        $('#modal-default').modal('hide');
                        $('.alert-success').find('h4').html('<i class="icon fa fa-check"></i>' + result.success);
                        $('.alert-success').show();
                    }
                },
                error: (err) => {
                    console.log(err);
                }
            });
        });
    });

    function resetForm() {
        $('#category-name').val('');
        $('#category-form').find('#fg-category-name').removeClass('has-error');
        $('#category-form').find('#fg-category-type').removeClass('has-error');
        $('#category-form').find('.help-block').remove();
    }
    </script>
@endpush
