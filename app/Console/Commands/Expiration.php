<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class Expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'users subscription expiry';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('expire', '0')->get();
        foreach($users as $user)
        {
            if( date('Y-m-d') == $user->subscription_expiry)
            {
                $user->update([
                    'expire' => '1'
                ]);
            }

        }
    }
}
