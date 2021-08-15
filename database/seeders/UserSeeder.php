<?php

namespace Database\Seeders;

use App\Models\User;
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
        $users = [
            [
                'name' => 'Rahmat Setiawan',
                'email' => 'setiawaneggy@gmail.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Tiara Ramadayanti',
                'email' => 'tiara@mail.com',
                'password' => bcrypt('password')
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
