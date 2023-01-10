@extends('layouts.adminlte')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('card.endTraining', $card) }}" class="row pb-2" method="POST">
                    @csrf
                    @component('components.table')
                        @slot('title', "Ficha $card->identifier")
                        @slot('card', $card)
                        @slot('head')
                            <th width="20%">Exercício</th>
                            <th width="20%">Séries</th>
                            <th width="20%">Equipamento</th>
                            <th width="20%">Tutorial</th>
                            <th width="20%">Feito</th>
                        @endslot
                        @slot('body')
                                @foreach ($exercises as $exercise)
                                    {{-- @can('view', $card) --}}
                                    <tr>
                                        <td>{{ $exercise->name }}</td>
                                        <td>{{ $exercise->seriesNumber }} X {{ $exercise->repetitionNumber }}</td>
                                        <td>
                                            @if(isset($exercise->equipament))
                                                {{ $exercise->equipament->name }} - {{ $exercise->equipament->number }}
                                            @else

                                            @endif

                                        </td>
                                        <td>
                                            <a target="_blank" href="{{ $exercise->tutorialVideo }}" class="btn btn-sm btn-success mr-1"><i class="fas fa-play"></i></a>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="exercises_ids[]" value="{{$exercise->id}}" required/>
                                        </td>

                                    </tr>
                                    {{-- @endcan --}}
                                @endforeach
                                @endslot
                                
                                @endcomponent
                                <div>
                                    <button type="submit" class="btn btn-success offset-sm-10 col-sm-2 mr-4">Terminar Treino</button>
                                </div>
                            </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush
