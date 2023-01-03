@extends('layouts.adminlte')
@section('content')
    @component('components.show')
        @slot('title', 'Detalhes do Aluno')
        @slot('content')
            @include('client.form', ['create'=> false, 'show'=> true])
        @endslot
        @slot('back')
            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-success float-right"><i class="fas fa-pen"></i> Editar</a>
            <a href="{{ route('clients.index') }}" class="btn btn-danger float-right mr-3"><i class="fas fa-undo-alt"></i> Cancelar</a>
        @endslot
    @endcomponent    
@endsection
@push('scripts')
    <script>
        $(".form-control").attr("disabled", true);
    </script>
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
@endpush