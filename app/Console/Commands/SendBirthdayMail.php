<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Jobs\sendBirthdayMailJob;

class SendBirthdayMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:sendBirthdayMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends an email to users with birthday today';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        date_default_timezone_set('America/Sao_Paulo');

        $users = User::where('type', 2)->where('birth_date', date('Y-m-d'))->get();

        foreach($users as $user){
            sendBirthdayMailJob::dispatch($user);
        }

        return Command::SUCCESS;
    }
}
