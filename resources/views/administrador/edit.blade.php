@extends('layouts.adminlte')

@section('title', 'Mk Academy')

@section('header')
@stop

@section('content')

<div id="app" class="container-fluid">
                    
    <div class="col-md-10 offset-md-1 col-12">
        <div class="card card-outline">
            <div class="card-header">
                <h5>Editando {{ $admin->name }}</h5>
            </div>
    <div class="card-body">
        <form id="form" action="{{ route('admin.update', $admin->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-sm-12 col-md-6">
                    <label for="name" class="required">Nome</label>
                    <input type="text" name="name" id="name" autofocus="" class="form-control" required="" value="{{ $admin->name }}">
                </div>
                <div class="form-group col-sm-12 col-md-6">
                    <label for="email" class="required">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" required="" value="{{ $admin->email }}">
                </div>
                <div class="form-group col-sm-6">  
                    <label for="picture">Imagem </label>
                    <input type="file" accept="image/*" class="form-control-file" name="picture">
                </div>
            </div>
    </div>
    <div class="card-footer d-flex justify-content-end">
        <a type="button" href="{{ route('admin.index') }}" class="btn btn-danger mr-3 float-right">Cancelar</a>
        <button type="submit" class="btn btn-success float-right">Salvar Alterações</button>
    </div>
        </form>
        </div>
    </div>
    
    </div>
@stop
 