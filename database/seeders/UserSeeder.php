<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'chezaad',
            'email'=>'soporte@chezaad.com',
            'password'=>bcrypt('Samuel+Dali+Chezaad+2023#voto'),
        ])->assignRole('admin');
        //
    }
}