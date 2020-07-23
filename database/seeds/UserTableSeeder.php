<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name'              => 'Carlos Javier Molina',
            'email'             => 'carlosjavier10@gmail.com',
            'email_verified_at' => '2020-06-25 00:00:00',
            'password'          => Hash::make('12345678'),

        ]);

    }
}
