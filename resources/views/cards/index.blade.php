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
                        <th width="7%">Ficha</th>
                        <th width="10%">Professor</th>
                        <th width="16%"></th>
                    @endslot
                    @slot('body')
                        @foreach ($cards as $card)
                            @can('view', $card)
                            <tr>
                                <td>{{ $card->identifier }}</td>
                                <td>{{ $card->personal->name }}</td>
                                <td class="options">

                                    @can('update', $card)
                                        <a href="{{ route('cards.edit', $card->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
                                    @endcan

                                    @can('view', $card)
                                        <a href="{{ route('cards.show', $card->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                    @endcan

                                    @can('delete', $card)
                                        <form class="form-delete inline-block" action="{{ route('cards.destroy', $card->id) }}" method="post">
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
