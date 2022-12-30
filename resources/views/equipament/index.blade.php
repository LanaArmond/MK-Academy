@extends('layouts.adminlte')
@section('content')
    @include('includes.success')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @component('components.table')
                    @slot('create', route('equipaments.create'))
                    @slot('title', 'Equipamentos')
                    @slot('head')
                        <th width="7%">Nome</th>
                        <th width="10%">Número</th>
                        <th width="16%"></th>
                    @endslot
                    @slot('body')
                        @foreach ($equipaments as $equipament)
                            @can('view', $equipament)
                            <tr>
                                <td>{{ $equipament->name }}</td>
                                <td>{{ $equipament->number }}</td>

                                <td class="options d-flex gap-2">

                                    @can('view', $equipament)
                                        <a href="{{ route('equipaments.show', $equipament->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                    @endcan
            
                                    @can('update', $equipament)
                                        <a href="{{ route('equipaments.edit', $equipament->id) }}" class="btn btn-sm btn-success"><i class="fas fa-pen"></i></a>
                                    @endcan
            
                                    @can('delete', $equipament)
                                        <form class="form-delete" action="{{ route('equipaments.destroy', $equipament->id) }}" method="post">
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