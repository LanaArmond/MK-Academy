@extends('layouts.adminlte')
@section('content')
    @include('includes.success')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @component('components.table')
                    @slot('create', route('cards.create'))
                    @slot('title', 'Fichas')
                    @slot('head')
                        <th width="20%">Ficha</th>
                        <th width="20%">Professor</th>
                        <th width="20%">Aluno</th>
                        <th width="40%"></th>
                    @endslot
                    @slot('body')
                        @foreach ($cards as $card)
                            {{-- @can('view', $card) --}}
                            <tr>
                                <td>{{ $card->identifier }}</td>
                                <td>{{ $card->personal->name ?? null }}</td>
                                <td>{{ $card->client->name ?? null }}</td>
                                <td class="options d-flex justify-content-end">
                                    @can('view', TrainingModePolicy::class)
                                        <a href="{{ route('card.trainingMode', $card->id) }}" class="btn btn-sm btn-success mr-1"><i class="fas fa-flag"></i></a>
                                    @endcan

                                    {{-- @can('update', $card) --}}
                                        <a href="{{ route('cards.edit', $card->id) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-pen"></i></a>
                                    {{-- @endcan --}}

                                    {{-- @can('view', $card) --}}
                                        <a href="{{ route('cards.show', $card->id) }}" class="btn btn-sm btn-secondary mr-1"><i class="fas fa-eye"></i></a>
                                    {{-- @endcan --}}

                                    {{-- @can('delete', $card) --}}
                                        <form class="form-delete d-inline-block" action="{{ route('cards.destroy', $card->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    {{-- @endcan --}}
                                </td>
                            </tr>
                            {{-- @endcan --}}
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
