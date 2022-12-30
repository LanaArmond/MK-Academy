<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client();
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

        if($request->hasfile('image')){
            $ext = $request->image->getClientOriginalExtension();
            $slug = Str::slug($request->name, '-');
            $name = "{$slug}.{$ext}";
            $request->image->storeAs('public/img', $name);
            $request->image = 'img/' . $name;
        }else{
            $request->image = 'profile_default.png';
        }

        Client::create([
            'name' => Crypt::encryptString($request->name),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => Crypt::encryptString($request->cpf),
            'phone' => Crypt::encryptString($request->phone),
            'image' => $request->image,
            'birth_date' => $request->birth_date,
            'registration_date' => $request->registration_date,
        ]);

        return redirect()->route('clients.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $client->name = $client->getDecrypted($client->name);
        $client->cpf = $client->getDecrypted($client->cpf);
        $client->phone = $client->getDecrypted($client->phone);

        return view('client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $client->name = $client->getDecrypted($client->name);
        $client->cpf = $client->getDecrypted($client->cpf);
        $client->phone = $client->getDecrypted($client->phone);

        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $data = $request->validated();
        unset($data['password_confirmation']);

        if($request->hasfile('image')){
            $ext = $request->image->getClientOriginalExtension();
            $slug = Str::slug($request->name, '-');
            $name = "{$slug}.{$ext}";
            $request->image->storeAs('public/img', $name);
            $data['image'] = 'img/' . $name;
        }else{
            unset($data['image']);
        }



        $data['name'] = Crypt::encryptString($request->name);
        $data['cpf'] = Crypt::encryptString($request->cpf);
        $data['phone'] = Crypt::encryptString($request->phone);

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
    public function destroy(Client $client)
    {
        File::delete('storage/' . $client->image);
        $client->delete();
        return redirect()->route('clients.index')->with('success', true);
    }
}
