<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function indexProfessor(){
        $professor = new User();
        return view('auth.registerPersonal', compact('professor'));
    }
    public function indexAluno(){
        return view('auth.registerAluno');
    }

    public function registraAluno(StoreClientRequest $request){
        
        $request->validated();

        if($request->hasFile('picture') && $request->file('picture')->isValid()){

            $requestImg = $request->picture;
            $extension = $requestImg->extension();

            $imgName = md5($requestImg->getClientOriginalName() . strtotime("now") . "." . $extension);

            $requestImg->move(public_path('img/profilePic'), $imgName);
        }

        $now = Carbon::now();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'number'=> $request->number,
            'birth_date' => $request->birth_date,
            'registration_date' => $now,
            'picture' => $imgName,
            'type' => "2",
            'status' => "0"
        ]);

        return redirect('/login');

    }

    public function registraProfessor(Request $request){

        if($request->hasFile('picture') && $request->file('picture')->isValid()){

            $requestImg = $request->picture;
            $extension = $requestImg->extension();

            $imgName = md5($requestImg->getClientOriginalName() . strtotime("now") . "." . $extension);

            $requestImg->move(public_path('img/profilePic'), $imgName);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'picture' => $imgName,
            'type' => "1",
            'status' => "0"
        ]);

        return redirect('/login');
    }
    
}
