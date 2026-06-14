<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'role' => 'admin',
                'data' => [
                    'name' => 'Rafał',
                    'surname' => 'Sieczkowski',
                    'email' => 'rafal.sieczkowski@onet.eu',
                    'password' => Hash::make('qwerty'),
                ]
            ],
            [
                'role' => 'user',
                'data' => [
                    'name' => 'Kira',
                    'surname' => 'Green',
                    'email' => 'kgreen@onet.eu',
                    'password' => Hash::make('qwerty'),
                ]
            ]
        ];

        foreach ($users  as $userData) {
            $user = User::create($userData['data']);
            $user->assignRole($userData['role']);
        }


    }
}

