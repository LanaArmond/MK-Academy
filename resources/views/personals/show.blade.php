@extends('adminlte::page')

@section('title', 'Mk Academy')

@section('content_header')
@stop

@section('content')

<div id="app" class="container-fluid">

    <div class="col-md-10 offset-md-1 col-12">
        <div class="card card-outline">
            <div class="card-header">
                <h5>Professor/Professora {{ $personal->name }}</h5>
            </div>
        <div class="card-body">
            <form>
                <fieldset disabled>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <img class="profile-user-img img-fluid img-circle" style="height: 100px;width:100px" src="" alt="Foto de perfil">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="exampleFormControlTextarea1">Nome:</label>
                        <input type="text" class="form-control" value="{{ $personal->name }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="exampleFormControlTextarea1">Email:</label>
                        <input type="email" class="form-control" value="{{ $personal->email }}">
                    </div>

                </div>
                </fieldset>
            </form>
        </div>

        <div class="card-footer d-flex justify-content-end">
            <a type="button" href="{{ route('personals.index') }}" class="btn btn-danger mr-3 float-right">Voltar</a>
        </div>
    </div>
    </div>

    </div>
@stop

@section('css')

@stop

@section('js')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
@stop
