<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Admin::create([
            'username' => 'masteroffice',
            'fullname' => 'Ultimate',
            'email' => 'backoffice@master.com',
            'password' => Hash::make('backoffice'),
            'level' => 'master',
            'status' => 1,
        ]);
    }
}
