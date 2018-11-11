@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h1>
        <i class="fa fa-user"></i>
        Perfil do Usuário
        <small>Editar perfil</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Perfil</li>
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
    <div class="box box-default">
        <div class="box-header with-border"></div>
        <div class="box-body">

        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="/user" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                      <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="inputName" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                id="inputName"
                                placeholder="Nome"
                                value="{{ $user->name }}"
                            >
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                      <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="inputPassword" class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-10">
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                id="inputPassword"
                                placeholder="Password"
                            >
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary pull-right">Editar</button>
                    </div>
                    <!-- /.box-footer -->
                  </form>
            </div>
        <!-- /.row -->
        </div>
        <!-- /.box-body -->
    </div>
@stop
