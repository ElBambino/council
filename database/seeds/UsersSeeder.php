<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::truncate();

        factory(User::class)
            ->create([
                'name'     => 'John Doe',
                'email'    => 'johndoe@example.com',
                'password' => bcrypt('johndoe'),
            ]);
    }
}
