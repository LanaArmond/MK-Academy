@extends('layouts.adminlte')

@section('content')

@component('components.edit')
    @slot('title', 'Editar Equipamento')
    @slot('url', route('equipaments.update', $equipament->id))
    @slot('form')
        @include('equipament.form', ['create' => false])
    @endslot
@endcomponent
@endsection