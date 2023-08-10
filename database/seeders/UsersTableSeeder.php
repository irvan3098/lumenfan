<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\user;

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
            'nama' => 'ipan2',
            'email' => 'ada@gmail.com',
            'npp' => 12345,
            'npp_supervisor' => 11111,
            'password' => app('hash')->make("adaapa"),
            'api_token' => Str::random(40)
        ]);
    }
    
}
