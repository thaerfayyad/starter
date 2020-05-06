<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'users expire every 5 mimute  automaticlly';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::where('expire' ,0 )->get(); //collections of all users

        foreach($users as $user ){
            $user -> DB::update(['expire' => 1]);
        }

    }
}
