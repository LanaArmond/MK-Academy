@extends('layouts.adminlte')

@section('content')

@component('components.edit')
    @slot('title', 'Editar Ficha')
    @slot('url', route('cards.update', $card->id))
    @slot('form')
        @include('cards.form')
    @endslot

@endcomponent
@endsection
