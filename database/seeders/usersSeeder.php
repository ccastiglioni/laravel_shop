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
        $user = new User();
        $user->name = 'cleber castiglioni';
        $user->email = 'cleber@gmail.com';
        $user->password = '$2y$10$Qh.LFT248VhVnncYweBXh.GpC5fRmRKP3HvRKIjbt10uFcSK6dIje'; //123
        $user->save();
    }
}
