@extends('layouts.adminlte')

@section('content')

@component('components.create')
    @slot('title', 'Cadastrar Exercício')
    @slot('url', route('exercises.store'))
    @slot('form')
        @include('exercises.form')
    @endslot
    
@endcomponent
    
@endsection