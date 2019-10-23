<?php

use Illuminate\Database\Seeder;
use App\user;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= User::where('email','asif@gmail.com')->first();

        if (!$user) {
        	
        	User::create([

        		'name'=>'nazim uddin',
        		'email'=>'asif@gmail.com',
        		'role'=>'admin',
        		'password'=>Hash::make('password')

        		]);
        }
    }
}
