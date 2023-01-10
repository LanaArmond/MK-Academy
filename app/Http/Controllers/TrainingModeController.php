<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingModeRequest;
use App\Models\Card;
use Carbon\Carbon;

class TrainingModeController extends Controller
{
    public function trainingMode(Card $card)
    {
        $exercises = $card->exercises;

        return view('cards.trainingMode', compact('card', 'exercises'));
    }

    public function endTraining(TrainingModeRequest $request, Card $card)
    {
        $data = $request->validated();

        $date = Carbon::now();
        
        if(isset($card->client->streakDate)){
            $difference = Carbon::parse($card->client->streakDate)->diffInDays($date);

            if($difference < 7){
                $card->client->streak = $card->client->streak + 1;
            }else{
                $card->client->streak = 1;
            }
        }else{
            $card->client->streakDate = $date->parse('Y-m-d');
            $card->client->streak = 1;
        }

        $card->client->save();

        return redirect()->route('cards.index')->with('success', true);
    }
}
