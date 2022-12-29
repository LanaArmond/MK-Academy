@extends('layouts.adminlte')

@section('content')

@component('components.edit')
    @slot('title', 'Editar Aluno')
    @slot('url', route('clients.update', $client->id))
    @slot('form')
        @include('client.form', ['create' => true])
    @endslot

@endcomponent
@endsection