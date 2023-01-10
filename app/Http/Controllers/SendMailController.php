<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;


class SendMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sendMessage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendBirthdayMail()
    {
        Artisan::call('send:sendBirthdayMail');
        
        return to_route('sendMailIndex')->with('message', 'Email de Aniversário enviado com sucesso !');
    }

    public function sendStreakMail()
    {
        Artisan::call('send:sendStreakMail');

        return to_route('sendMailIndex')->with('message', 'Email de Streak enviado com sucesso !');
    }

    public function sendRegistrationMail()
    {
        Artisan::call('send:sendRegistrationMail');

        return to_route('sendMailIndex')->with('message', 'Email de Mensalidade enviado com sucesso !');
    }

}
