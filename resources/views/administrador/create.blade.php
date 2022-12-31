@extends('layouts.adminlte')

@section('title', 'Mk Academy')

@section('content_header')
@stop

@section('content')

<div id="app" class="container-fluid">
                    
    <div class="col-md-10 offset-md-1 col-12">
        <div class="card card-outline">
            <div class="card-header card-outline card-danger">
                <h5>Cadastrando novo Administrador</h5>
            </div>
    <div class="card-body">
        <form id="form" action="/admin/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-sm-12 col-md-6">
                    <label for="name" class="required">Nome</label>
                    <input type="text" name="name" id="name" autofocus="" class="form-control" required="" value="{{ old('name', $admin->name) }}">
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <label for="email" class="required">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" required="" value="{{ old('email', $admin->email) }}">
                </div>
                
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="password">Senha</label> 
                    <div class="input-group">
                        <div class="input-group-append" id="visible">
                            <span class="input-group-text rounded-left border-right-0" id="span">
                                <i class="fa fa-eye-slash" id="icon"></i>
                            </span> 
                        </div>    
                        <input autocomplete="new-password" type="password" class="senhaID form-control" name="password" id="password">
                    </div>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="password">Confirme sua senha</label>
                    <input autocomplete="new-password" type="password" class="senhaID form-control" name="password_confirmation" id="password">
                </div>
            </div>
        </div>
        <div class="form-group col-sm-6">  
            <label for="picture">Imagem </label>
            <input type="file" accept="image/*" class="form-control-file" id="picture" name="picture">
        </div>
        <div class="card-footer d-flex justify-content-end">
            <a type="button" href="{{ route('admin.index') }}" class="btn btn-danger mr-3 float-right">Cancelar</a>
            <button type="submit" class="btn btn-success float-right">Cadastrar</button>
        </div>
    </form>
        </div>
    </div>
    
    </div>
@stop
 