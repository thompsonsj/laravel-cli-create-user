<?php

namespace BOAIdeas\CreateUser\Commands;

use App\User;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new laravel user';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('User name');
        $email = $this->ask('User email');
        $password = $this->ask('User password');

        User::create([
            'name'     => $name,
            'email'    => $email,
            'password' => bcrypt($password),
            ]);
        $this->info('New user created!');
    }
}