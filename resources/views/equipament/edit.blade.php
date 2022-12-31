@extends('layouts.adminlte')

@section('content')

@component('components.edit')
    @slot('title', 'Editar Equipamento')
    @slot('url', route('equipaments.update', $equipament->id))
    @slot('form')
        @include('equipament.form', ['create' => false])
    @endslot
    @slot('voltar')
        <a href="{{ route('equipaments.index') }}" class="btn btn-danger float-right mr-2">Voltar</a>
    @endslot
@endcomponent
@endsection