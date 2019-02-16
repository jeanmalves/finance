@extends('adminlte::page')

@section('content_header')
    <h1>
        <i class="fa fa-user"></i>
        Categorias de Lançamento
        <small>Adicionar nova categoria</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/categories"> Categorias de lançamento</a></li>
        <li class="active">Adicionar nova categoria</li>
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
        <div class="box-header with-border"></div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <form id="category-form" method="POST" action="{{ url('/categories') }}" class="form-horizontal">
                        @csrf

                        <div class="box-body">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="inputName" class="col-sm-2 control-label">Nome</label>
                                <div class="col-sm-10">
                                    <input
                                            type="text"
                                            name="name"
                                            class="form-control"
                                            id="inputName"
                                            placeholder="Digite a categoria"
                                    >
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                                <label for="category-type" class="col-sm-2 control-label">Tipo</label>
                                <div class="col-sm-10">
                                    <select name="type" id="category-type" class="form-control">
                                        <option value="C">Entrada</option>
                                        <option value="D">Saída</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Adicionar</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>

                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
@stop