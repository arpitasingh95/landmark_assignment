<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Str;
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
        $password = "abc@123";
        DB::table('users')->insert(
            [
                'name' => 'Arpita Singh',
                'email' => 'arpitasingh10@gmail.com',
                'password' => Hash::make($password),
                'api_token' =>  Str::random(60)
            ]
        );
    }
}
