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
        $user = User::create([
            'name' => 'Rafał',
            'surname' => 'Sieczkowski',
            'email' => 'rafal.sieczkowski@onet.eu',
            'password' => Hash::make('qwerty'),
        ]);

        $user->assignRole('admin');
    }
}

