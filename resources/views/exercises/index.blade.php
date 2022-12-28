@extends('layouts.app')
@section('content')
    @include('includes.success')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @component('components.table')
                    @slot('create', route('exercises.create'))
                    @slot('title', 'Exercícios')
                    @slot('head')
                        <th width="10%">Nome</th>
                        <th width="10%">Descrição</th>
                        <th width="10%">Número de Séries</th>
                        <th width="10%">Número de Repetições</th>
                        <th width="10%">Video Tutorial</th>
                        <th width="10%"></th>
                    @endslot
                    @slot('body')
                        @foreach ($exercises as $exercise)
                            @can('view', $exercise)
                            <tr>
                                <td>{{ $exercise->name }}</td>
                                <td>{{ $exercise->description }}</td>
                                <td>{{ $exercise->seriesNumber }}</td>
                                <td>{{ $exercise->repetitionNumber }}</td>
                                <td><a href="{{ $exercise->tutorialVideo }}" target="_blank" rel="noopener noreferrer"></a>{{ $exercise->tutorialVideo }}</td>
                                <td class="options">
            
                                    @can('update', $exercise)
                                        <a href="{{ route('exercises.edit', $exercise->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
                                    @endcan
            
                                    @can('view', $exercise)
                                        <a href="{{ route('exercises.show', $exercise->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                    @endcan
            
                                    @can('delete', $exercise)
                                        <form class="form-delete inline-block" action="{{ route('exercises.destroy', $exercise->id) }}" method="post">
                                            @csrf
                                            @method('delete')
            
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                            @endcan
                        @endforeach
                        @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/sweetAlert.js') }}"></script>

@endpush