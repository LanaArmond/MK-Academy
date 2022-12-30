@extends('layouts.adminlte')

@section('content')

@component('components.create')
    @slot('title', 'Cadastrar Professor')
    @slot('url', route('personals.store'))
    @slot('form')
        @include('personals.form')
    @endslot

@endcomponent

@endsection
