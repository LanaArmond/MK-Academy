@extends('layouts.adminlte')
@section('content')
    @component('components.show')
        @slot('title', 'Detalhes do Equipamento')
        @slot('content')
            @include('equipament.form', ['create' => false])
        @endslot
        @slot('back')
            <a href="{{ route('equipaments.edit', $equipament->id) }}" class="btn btn-success float-right"><i class="fas fa-pen"></i> Editar</a>
            <a href="{{ route('equipaments.index') }}" class="btn btn-danger float-right mr-3"><i class="fas fa-undo-alt"></i> Voltar</a>
        @endslot
    @endcomponent    
@endsection
@push('scripts')
    <script>
        $(".form-control").attr("disabled", true);
    </script>
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
@endpush