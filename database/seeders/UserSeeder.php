<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder {

    protected static ?string $password;

    public function run(): void {
        $user = User::create(['name' => 'Test User',
                              'email' => 'test@example.com',
                              'email_verified_at' => now(),
                              'password' => static::$password ??= Hash::make('password'),
                              'remember_token' => Str::random(10),                            
                            ]);
    }
}
