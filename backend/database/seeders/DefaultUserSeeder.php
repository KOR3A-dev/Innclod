<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = [
            'name' => 'user test',
            'email' => 'defaultuser@example.com',
            'password' => bcrypt('mypassword123')
        ];
        
        DB::table('users')->insert($user);
    }
    
}
