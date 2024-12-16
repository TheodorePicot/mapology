<?php

namespace App\Console\Commands;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallMapology extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:mapology';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs the Mapology application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('migrate:fresh');

        $response = $this->confirm('Create an admin account?', true);
        if ($response) {
            $email = $this->ask('Admin email');
            $password = $this->secret('Admin password');


            $user = User::create(
                [
                    'email' => $email,
                    'username' => 'administrator',
                    'password' => bcrypt($password),
                    'email_verified_at' => now(),
                ]
            );
            $user->assignRole(UserRole::Administrator);
        }
    }
}
