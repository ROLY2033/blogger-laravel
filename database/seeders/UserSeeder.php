<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');
        User::create([
            'name' => 'dev',
            'email' => 'dev@gmail.com',
            'password' => bcrypt('73771608')
        ])->assignRole('Blogger');

        User::factory(10)->create();
    }
}
