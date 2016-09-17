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
            'name'      => 'R. Kukuh',
            'email'     => 'rkukuh@gmail.com',
            'password'  => bcrypt('a'),
        ]);
    }
}
