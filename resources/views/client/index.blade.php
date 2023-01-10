@extends('layouts.adminlte')

@section('header')
    <h1>Alunos</h1>
@endsection

@section('content')
@include('includes.success')
    <div class="py-2 d-flex justify-content-end">
        <a type="button" class="mx-2 btn btn-dark" href="{{ route('clients.create') }}"><b> Adicionar <i class="fas fa-plus-circle"></i></b></a>
    </div>

    <div class="row">
        {{-- @can('viewAny', App\Models\Client::class) --}}
            @foreach ($clients as $client)
                <div class="col-md-3 mt-2">
                    <div class="card card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" style="height: 100px;width:100px" src="{{ asset("img/profilePic/" . $client->picture ) }}" alt="User profile picture">
                            </div>
                            <br>
                            <h3 class="profile-username text-center">{{ $client->name}}</h3>
                            <div class="options text-center d-flex mt-2 justify-content-center">
                                {{-- @can('view',  $client, App\Models\Client::class) --}}
                                    <a href="{{ route('clients.show', $client->id) }}" class="btn btn-dark mr-2"><i class="fas fa-eye"></i></a>
                                {{-- @endcan --}}
                                {{-- @can('update', $client,  App\Models\Client::class) --}}
                                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary mr-2"><i class="fas fa-pen"></i></a>
                                {{-- @endcan --}}
                                {{-- @can('delete', $client,  App\Models\Client::class) --}}
                                    <form class="form-delete" action="{{ route('clients.destroy', $client->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger "><i class="fas fa-trash "></i></button>
                                    </form>
                                {{-- @endcan --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        {{-- @endcan --}}
        
        @if($clients->count() == 0)
            <div class="text-center" style="color: #949699">
                <i class="fas fa-exclamation-circle" style="font-size: 10em"></i>
                <p class="mb-4 h2">Nenhum item encontrado!</p>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush

@push('styles')
    {{-- Coloque os estilos aqui --}}
@endpush
