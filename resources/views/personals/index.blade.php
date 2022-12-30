@extends('layouts.adminlte')

@section('header')
    <h1>Professores</h1>
    <p>Professores ativos na academia</p>
@endsection

@section('content')
    <div class="py-2 d-flex justify-content-end">
        <a type="button" class="mx-2 btn btn-dark" href="{{ route('personals.create') }}">Adicionar Novo</a>
    </div>

    <div class="row">
        @foreach ($personals as $personal)
            <div class="col-md-3 mt-2">
                <div class="card card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" style="height: 100px;width:100px" src="/img/profilePic/{{ $personal->picture }}" alt="User profile picture">
                        </div>
                        <br>
                        <h3 class="profile-username text-center">{{ $personal->name }}</h3>
                        <div class="options text-center d-flex mt-2 justify-content-center">
                            <a href="{{ route('personals.show', $personal->id) }}" class="btn btn-dark mr-2"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('personals.edit', $personal->id) }}" class="btn btn-primary mr-2"><i class="fas fa-pen"></i></a>
                                <form class="form-delete" action="{{ route('personals.destroy', $personal->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger "><i class="fas fa-trash "></i></button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
    {{-- Coloque os Scripts aqui --}}
@endpush

@push('styles')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush
