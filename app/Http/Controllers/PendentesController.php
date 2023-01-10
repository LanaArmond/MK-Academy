<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PendentesController extends Controller
{
    public function alunos(){
        $alunos = User::where('type', "2")->where('status', "0")->get();

        return view('pendentes.alunos', compact('alunos'));
    }

    public function professores(){
        $professores = User::where('type', "1")->where('status', "0")->get();
        
        return view('pendentes.professores', compact('professores'));
    }

    public function confirmaAluno(User $aluno){
        $aluno->status = "1";
        $aluno->save();
        return redirect('/alunos/pendentes');
    }

    public function confirmaProfessor(User $professor){
        $professor->status = "1";
        $professor->save();
        return redirect('/professores/pendentes');
    }

    public function recusaAluno(User $aluno){
        $aluno->delete();
        return redirect('/alunos/pendentes');
    }

    public function recusaProfessor(User $professor){
        $professor->delete();
        return redirect('/professores/pendentes');
    }
}
