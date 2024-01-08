<?php

namespace Database\Seeders;

use App\Models\User;
use FontLib\Table\Type\name;
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
        //
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);
        [
            'name' => 'Pembina Siswa',
            'email' => 'pembina@gmail.com',
            'password' => Hash::make('pembina'),
            'role' => 'pembina',

        ];
    }
}
