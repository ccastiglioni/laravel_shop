<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'cleber@gmail.com'],
            [
                'name' => 'cleber castiglioni',
                'password' => '$2y$10$Qh.LFT248VhVnncYweBXh.GpC5fRmRKP3HvRKIjbt10uFcSK6dIje', // 123
            ]
        );
    }
}
