<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'User AAA',
            'email'     => 'a@a.com',
            'password'  => bcrypt('a'),
        ]);
    }
}
