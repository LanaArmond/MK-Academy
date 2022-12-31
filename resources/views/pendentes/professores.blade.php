@extends('layouts.adminlte')

@section('title', 'Mk Academy')

@section('header')
    <h1>Professores Pendentes</h1>
@stop

@section('content')

    <div class="row">
        @foreach ($professores as $professor)
            
      
            <div class="col-md-3 mt-2">
                <div class="card card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" style="height: 100px;width:100px" src="{{ asset("img/profilePic/" . $professor->picture ) }}" alt="User profile picture">
                        </div>
                        <br>
                        <h3 class="profile-username text-center">{{ $professor->getDecrypted($professor->name)}}</h3>
                        <div class="options text-center d-flex mt-2 justify-content-center">
                            <form class="form-confirm" action="{{ route('confirmaProfessor.pendente', $professor) }}" method="post">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-success mr-2"><i class="fas fa-check"></i></button>
                            </form>

                            <form class="form-delete" action="{{ route('recusaProfessor', $professor->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger "><i class="fas fa-skull"></i></button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
 
@section('css')
    <link rel="stylesheet" href="/css/professor_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop