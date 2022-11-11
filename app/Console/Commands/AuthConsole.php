<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
class AuthConsole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auth with console';

    /**
     * Execute the console command.
     *
     * @return string
     */
    public function handle()
    {
        $login = $this->ask('Set your login:');
        $password = $this->secret('Set your password:');


        $this->table(
            ['Name', 'Email'],
            User::all(['name', 'email'])->where('name', $login)->toArray()
        );
    }
}
