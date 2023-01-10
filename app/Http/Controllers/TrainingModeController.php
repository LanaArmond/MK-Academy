<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class TrainingModeController extends Controller
{
    public function trainingMode(Card $card)
    {
        $exercises = $card->exercises;
        return view('cards.trainingMode', compact('card', 'exercises'));
    }
}
