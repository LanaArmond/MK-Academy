<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Psy\Readline\Userland;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = User::where('type', "2")->get();
        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new User();
        return view('client.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $request->validated();
        
        $client = new User();
        $client->name = Crypt::encryptString($request->name);
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        $client->cpf = Crypt::encryptString($request->cpf);
        $client->number = Crypt::encryptString($request->number);
        $client->birth_date = $request->birth_date;
        $client->registration_date = $request->registration_date;
        $client->type = "2";
        $client->status = "1";

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImg = $request->image;
            $extension = $requestImg->extension();

            $imgName = md5($requestImg->getClientOriginalName() . strtotime("now") . "." . $extension);

            $requestImg->move(public_path('img/profilePic'), $imgName);
            $client->picture = $imgName;
        }

        $client->save();

        return redirect()->route('clients.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $client)
    {
        
        $client->name = $client->getDecrypted($client->name);
        $client->cpf = $client->getDecrypted($client->cpf);
        $client->number = $client->getDecrypted($client->number);

        return view('client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $client)
    {
        $client->name = $client->getDecrypted($client->name);
        $client->cpf = $client->getDecrypted($client->cpf);
        $client->number = $client->getDecrypted($client->number);

        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, User $client)
    {
        $data = $request->validated();
        unset($data['password_confirmation']);

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImg = $request->image;
            $extension = $requestImg->extension();

            $imgName = md5($requestImg->getClientOriginalName() . strtotime("now") . "." . $extension);

            $requestImg->move(public_path('img/profilePic'), $imgName);
            $data['picture'] = $imgName;
        }

        $data['name'] = Crypt::encryptString($request->name);
        $data['cpf'] = Crypt::encryptString($request->cpf);
        $data['number'] = Crypt::encryptString($request->number);

        if(!$request->password){
            unset($data['password']);
        }else{
            $data['password'] = Hash::make($request->password);
        }


        $client->update($data);

        return redirect()->route('clients.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', true);
    }
}
