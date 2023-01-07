@extends('layouts.adminlte')

@section('content')

@component('components.edit')
    @slot('title', 'Editar Exercício')
    @slot('url', route('exercises.update', $exercise->id))
    @slot('form')
        @include('exercises.form')
    @endslot
@endcomponent
@endsection