@extends('layouts.adminlte')

@section('content')

    @if(session('message'))
        <div class="d-flex justify-content-center text-center">
            <div class="border bg-success p-1 rounded">
                <h1>{{session('message')}}</h1>
            </div>
        </div>
    @endif

    <div class="d-flex gap-2 mt-5">
            <a href="{{ route('sendBirthdayMail') }}"><button class="btn btn-primary"> Envia email para alunos fazendo aniversário hoje </button></a>
            <a href="{{ route('sendStreakMail') }}"><button class="btn btn-secondary"> Envia email para alunos com prazo para streak acabando </button></a>
            <a href="{{ route('sendRegistrationMail')}}"><button class="btn btn-success"> Envia email para alunos com o prazo de mensalidade acabando </button> </a>
    </div>
@endsection
