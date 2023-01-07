<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use App\Models\Exercise;
use Illuminate\Http\Request;

use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::all();

        return view('cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personals = User::where('type', "1")->get();
        $clients = User::where('type', "2")->get();
        $exercises = Exercise::all();
        $card = new Card();
        return view('cards.create', compact('card', 'personals', 'clients', 'exercises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCardRequest $request)
    {
        $data = $request->validated();
        $exercise_id = $data['exercise_id'];
        unset($data['exercise_id']);
        $card = Card::create($data);
        $card->exercises()->sync($exercise_id);

        return redirect()->route('cards.index')->with('success', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        $personals = User::where('type', "1")->get();
        $clients = User::where('type', "2")->get();
        $exercises = Exercise::all();
        return view('cards.show', compact('card', 'personals', 'clients', 'exercises'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        $personals = User::where('type', "1")->get();
        $clients = User::where('type', "2")->get();
        $exercises = Exercise::all();
        return view('cards.edit', compact('card', 'personals', 'clients', 'exercises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCardRequest $request, Card $card)
    {
        $data = $request->validated();
        $exercise_id = $data['exercise_id'];
        unset($data['exercise_id']);
        $card->update($data);
        $card->exercises()->sync($exercise_id);

        return redirect()->route('cards.index')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();

        return redirect()->route('cards.index')->with('success', true);
    }
}
