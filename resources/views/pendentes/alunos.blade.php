@extends('layouts.adminlte')

@section('title', 'Mk Academy')

@section('header')
    <h1>Alunos Pendentes</h1>
@stop

@section('content')

    <div class="row">
        @foreach ($alunos as $aluno)
            
      
            <div class="col-md-3 mt-2">
                <div class="card card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" style="height: 100px;width:100px" src="{{ asset("img/profilePic/" . $aluno->picture ) }}" alt="User profile picture">
                        </div>
                        <br>
                        <h3 class="profile-username text-center">{{ $aluno->name}}</h3>
                        <div class="options text-center d-flex mt-2 justify-content-center">
                            <form class="form-confirm" action="{{ route('confirmaAluno.pendente', $aluno->id) }}" method="post">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-success mr-2"><i class="fas fa-check"></i></button>
                            </form>

                            <form class="form-delete" action="{{ route('recusaAluno', $aluno) }}" method="post">
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
    <link rel="stylesheet" href="/css/aluno_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop