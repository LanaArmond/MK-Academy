<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use App\Jobs\sendStreakMailJob;


class SendStreakMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:sendStreakMail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verify if the streak is 1 day to expiring and send an email to the user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('type', 2)->where('streak', '>', 0)->get();

        foreach($users as $user){
            $diference = Carbon::now()->diffInDays($user->streakDate);

            if($diference == 6){
                sendStreakMailJob::dispatch($user);
            }

            if($diference > 7){
                $user->streak = 0;
                $user->save();
            }
        }

        //streak dura 7 dias
        return Command::SUCCESS;
    }
}
