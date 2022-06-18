<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SeedUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_user = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123123'),
                'level' => 1
            ], [
                'name' => 'people 1',
                'email' => 'people1@gmail.com',
                'password' => Hash::make('people 1'),
                'level' => 1
            ], [
                'name' => 'people 2',
                'email' => 'people2@gmail.com',
                'password' => Hash::make('people 2'),
                'level' => 1
            ],
        ];

        User::insert($array_user);
    }
}
