<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipament;
use Faker\Core\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EquipamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipaments = Equipament::all();
        return view('equipament.index', compact('equipaments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipament = new Equipament();
        return view('equipament.create', compact('equipament'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if($request->hasfile('image')){
            $ext = $request->image->getClientOriginalExtension();
            $slug = Str::slug($request->name);
            $name = "{$slug}.{$ext}";
            $request->image->storeAs('public/img', $name);
            $data['image'] = 'img/' . $name;
        }else{
            $data['image'] = 'default.jpg';
        }


        Equipament::create($data);

        return redirect()->route('equipaments.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Equipament $equipament)
    {
        return view('equipament.show', compact('equipament'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipament $equipament)
    {
        return view('equipament.edit', compact('equipament'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipament $equipament)
    {
        $data = $request->all();

        if($request->hasfile('image')){
            $ext = $request->image->getClientOriginalExtension();
            $slug = Str::slug($request->name);
            $name = "{$slug}.{$ext}";
            $request->image->storeAs('public/img', $name);
            $data['image'] = 'img/' . $name;
        }else{
            $data['image'] = 'default.jpg';
        }


        $equipament->update($data);

        return redirect()->route('equipaments.index')->with('success', true);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipament $equipament)
    {
        Storage::delete('public/' . $equipament->image);
        $equipament->delete();
        return redirect()->route('equipaments.index')->with('success', true);
    }
}
