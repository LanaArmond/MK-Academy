@extends('layouts.adminlte')

@section('content')
    @component('components.show')
        @slot('title', 'Detalhes da Ficha')
        @slot('content')
            @include('cards.form', ['create'=> false, 'show'=> true])
        @endslot
        @slot('back')
            <a href="{{ route('cards.edit', $card->id) }}" class="btn btn-primary float-right ml-1"><i class="fas fa-pen"></i> Editar</a>
            <a href="{{ route('cards.index') }}" class="btn btn-dark float-right"><i class="fas fa-undo-alt"></i> Voltar</a>
        @endslot
    @endcomponent
@endsection
@push('scripts')
    <script>
        $(".form-control").attr("disabled", true);
    </script>
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
@endpush
