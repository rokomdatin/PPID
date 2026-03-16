<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'admin:create
                            {--name= : Nama admin}
                            {--email= : Email admin}
                            {--password= : Password admin}';

    protected $description = 'Buat atau reset password akun admin Filament';

    public function handle(): int
    {
        $name     = $this->option('name')     ?? $this->ask('Nama admin');
        $email    = $this->option('email')    ?? $this->ask('Email admin');
        $password = $this->option('password') ?? $this->secret('Password admin');

        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name'     => $name,
                'password' => Hash::make($password),
                'email_verified_at' => now(),
            ]
        );

        $action = $user->wasRecentlyCreated ? 'dibuat' : 'diperbarui';
        $this->info("✅ Admin berhasil {$action}:");
        $this->table(['ID', 'Nama', 'Email'], [[$user->id, $user->name, $user->email]]);

        return Command::SUCCESS;
    }
}
