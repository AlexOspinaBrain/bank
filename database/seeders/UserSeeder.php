<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Alexander Ospina',
            'email'=>'eiji2l@gmail.com',
            'identificacion' => '80059462',
            'password'=> Hash::make('1234'),
        ]);
    }
}
