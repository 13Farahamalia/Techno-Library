<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Faker\Factory;
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
        User::create([
            'id' => '1',
            'name' => 'admin',
            'gender' => 'Perempuan',
            'status' => 'Pustakawan',
            'password' => Hash::make(1111),
        ]);
    }
}
