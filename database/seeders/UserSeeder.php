<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'cat user',
            'email' => 'cat@cattube.com',
            'password' => bcrypt('cat'),
        ]);
    }
}
