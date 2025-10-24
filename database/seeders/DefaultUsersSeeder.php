<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $today = \Carbon\Carbon::now();

        \DB::table('users')->insert([
            [
                'username' => 'superadmin',
                'password' => bcrypt('password'),
                'role' => 0,
                'created_at' => $today,
                'updated_at' => $today,
            ],
            [
                'username' => 'admin',
                'password' => bcrypt('password'),
                'role' => 1,
                'created_at' => $today,
                'updated_at' => $today,
            ],
            [
                'username' => 'manager',
                'password' => bcrypt('password'),
                'role' => 2,
                'created_at' => $today,
                'updated_at' => $today,
            ],
            [
                'username' => 'user',
                'password' => bcrypt('password'),
                'role' => 3,
                'created_at' => $today,
                'updated_at' => $today,
            ],
        ]);
    }
}
