@extends('layouts.adminlte')

@section('content')

@component('components.create')
    @slot('title', 'Cadastrar Equipamento')
    @slot('url', route('equipaments.store'))
    @slot('form')
        @include('equipament.form', ['create' => true])
    @endslot
    @slot('voltar')
        <a href="{{ route('equipaments.index') }}" class="btn btn-danger float-right mr-2">Voltar</a>
    @endslot
@endcomponent
@endsection