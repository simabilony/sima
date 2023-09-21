<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        User::factory(10)->create([
            'name'=>'sima',
            'email'=>'sima@gmail.com',
            'password'=>Hash::make('123456789'),
        ]);
//        User::factory(10)->create([
//            'name'=>'simabi',
//            'email'=>'bisi@gmail.com',
//            'password'=>Hash::make('987654321'),
//        ]);

    }
}
