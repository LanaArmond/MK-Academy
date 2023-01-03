@extends('layouts.adminlte')

@section('content')

@component('components.edit')
    @slot('title', 'Editar Aluno')
    @slot('url', route('clients.update', $client->id))
    @slot('form')
        @include('client.form', ['create' => true, 'show' => true])
    @endslot
    @slot('footer')
        <a href="{{ route('clients.index') }}" class="btn btn-danger float-right mr-3">Cancelar</a>
    @endslot
@endcomponent
@endsection