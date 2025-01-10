<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    static $users = [
        [
            'name' => 'Nicolau NP',
            'email' => "nicolau@gmail.com",
            'password' => "hello2023",
        ],
        [
            'name' => 'Auber TD',
            'email' => "auber@gmail.com",
            'password' => "hello2023",
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Self::$users as $key => $user) {
            User::create($user);
        }
    }
}
