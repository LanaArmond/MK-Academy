@extends('layouts.adminlte')

@section('content')

@component('components.create')
    @slot('title', 'Cadastrar Aluno')
    @slot('url', route('clients.store'))
    @slot('form')
        @include('client.form', ['create' => true, 'show' => false])
    @endslot
@endcomponent
@endsection