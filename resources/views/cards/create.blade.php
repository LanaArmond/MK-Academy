@extends('layouts.adminlte')

@section('content')

@component('components.create')
    @slot('title', 'Cadastrar Ficha')
    @slot('url', route('cards.store'))
    @slot('form')
        @include('cards.form')
    @endslot

@endcomponent

@endsection
