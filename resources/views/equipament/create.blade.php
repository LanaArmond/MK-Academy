@extends('layouts.adminlte')

@section('content')

@component('components.create')
    @slot('title', 'Cadastrar Equipamento')
    @slot('url', route('equipaments.store'))
    @slot('form')
        @include('equipament.form', ['create' => true])
    @endslot
@endcomponent
@endsection