<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registraAlunoIndex(){
        return view('auth.registraAluno');
    }

    public function registraProfessorIndex(){
        return view('auth.registraProfessor');
    }

    public function registraAluno(Request $request){
        
        User::create([
            'name' => Crypt::encryptString($request->name),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => Crypt::encryptString($request->cpf),
            'number'=> Crypt::encryptString($request->number),
            'picture' => $request->picture,
            'type' => "2",
            'status' => "0"
        ]);
    }

    public function registraProfessor(Request $request){

        User::create([
            'name' => Crypt::encryptString($request->name),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'picture' => $request->picture,
            'type' => "1",
            'status' => "0"
        ]);
    }
    
}
