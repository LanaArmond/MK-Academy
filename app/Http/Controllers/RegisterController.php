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
        
        if($request->hasFile('picture') && $request->file('picture')->isValid()){

            $requestImg = $request->picture;
            $extension = $requestImg->extension();

            $imgName = md5($requestImg->getClientOriginalName() . strtotime("now") . "." . $extension);

            $requestImg->move(public_path('img/profilePic'), $imgName);
        }

        User::create([
            'name' => Crypt::encryptString($request->name),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => Crypt::encryptString($request->cpf),
            'number'=> Crypt::encryptString($request->number),
            'picture' => $imgName,
            'type' => "2",
            'status' => "0"
        ]);
    }

    public function registraProfessor(Request $request){

        if($request->hasFile('picture') && $request->file('picture')->isValid()){

            $requestImg = $request->picture;
            $extension = $requestImg->extension();

            $imgName = md5($requestImg->getClientOriginalName() . strtotime("now") . "." . $extension);

            $requestImg->move(public_path('img/profilePic'), $imgName);
        }

        User::create([
            'name' => Crypt::encryptString($request->name),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'picture' => $imgName,
            'type' => "1",
            'status' => "0"
        ]);
    }
    
}
