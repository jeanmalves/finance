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
    <div class="box box-default">
        <div class="box-header with-border"></div>
        <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <form class="form-horizontal">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Nome</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Nome">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label">Password</label>

                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputPassword" placeholder="Password">
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
