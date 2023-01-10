<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function storeProfessor(StoreClientRequest $request){

        dd("chegou");
        $request->validated();

        $professor = new User();
        $professor->name = $request->name;
        $professor->email = $request->email;
        $professor->password = Hash::make($request->password);
        $professor->type = "2";
        $professor->status = "0";

        dd($professor);

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImg = $request->image;
            $extension = $requestImg->extension();

            $imgName = md5($requestImg->getClientOriginalName() . strtotime("now") . "." . $extension);

            $requestImg->move(public_path('img/profilePic'), $imgName);
            $professor->picture = $imgName;
        }

        $professor->save();

        return redirect()->route('login')->with('success', true);
    }
}
