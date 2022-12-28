@extends('adminlte::page')

@section('title', 'Mk Academy')

@section('content_header')
@stop

@section('content')

<div id="app" class="container-fluid">
                    
    <div class="col-md-10 offset-md-1 col-12">
        <div class="card card-outline">
            <div class="card-header">
                <h5>Visualizando {{ $admin->name }}</h5>
            </div>
        <div class="card-body">
            <form>
                <fieldset disabled>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <img class="profile-user-img img-fluid img-circle" style="height: 100px;width:100px" src="" alt="User profile picture">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="exampleFormControlTextarea1">Nome</label>
                        <input type="text" class="form-control" value="{{ $admin->name }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="exampleFormControlTextarea1">E-mail</label>
                        <input type="email" class="form-control" value="{{ $admin->email }}">
                    </div>
                    
                </div>
                </fieldset>
            </form>
        </div>

        <div class="card-footer d-flex justify-content-end">
            <a type="button" href="{{ route('admin.index') }}" class="btn btn-danger mr-3 float-right">Retornar</a>
        </div>
    </div>
    </div>
    
    </div>
@stop
 
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop