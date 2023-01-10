<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Jobs\sendRegistrationMailJob;

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

        $tomorrow = date('d', strtotime('+1 day'));

        $users = User::where('type', 2)->get();


        foreach($users as $user){
            $userRegistrationDay = date('d', strtotime($user->registration_date));
            
            if($userRegistrationDay == $tomorrow){
                sendRegistrationMailJob::dispatch($user);
            }
        }

        return Command::SUCCESS;
    }
}
