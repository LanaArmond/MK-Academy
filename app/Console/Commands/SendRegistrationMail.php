<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class SendRegistrationMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:sendRegistrationMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email to users that registration is 1 day to expiring';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        date_default_timezone_set('America/Sao_Paulo');

        $day = date('d');
        $users = User::where('type',2)->where('Day(registration_date)', $day)->get();
        dd($users);
        return Command::SUCCESS;
    }
}
