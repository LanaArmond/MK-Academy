@extends('layouts.adminlte')

@section('content')

@component('components.edit')
    @slot('title', 'Editar Professor')
    @slot('url', route('personals.update', $personal->id))
    @slot('form')
        @include('personals.form')
    @endslot

@endcomponent
@endsection
