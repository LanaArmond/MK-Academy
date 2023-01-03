@extends('layouts.adminlte')

@section('content')

@component('components.create')
    @slot('title', 'Cadastrar Aluno')
    @slot('url', route('clients.store'))
    @slot('form')
        @include('client.form', ['create' => true, 'show' => false])
    @endslot
    @slot('footer')
        <a type="button" href="{{ route('clients.index') }}" class="btn btn-danger mr-3 float-right">Cancelar</a>
    @endslot

@endcomponent
@endsection