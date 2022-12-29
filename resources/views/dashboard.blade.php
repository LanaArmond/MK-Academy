@extends('layouts.adminlte')

@section('header')
    <h1>Aqui é o header</h1>
    <p>Pode colocar tags com o estilo que quiser</p>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h1>Aqui é o Conteudo</h1>
            <p>Pode colocar tags com o estilo que quiser</p>
            <p>Recomendo usar essas classes que coloquei</p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{-- Coloque os Scripts aqui --}}
@endpush

@push('styles')
    {{-- Coloque os estilos aqui --}}
@endpush
