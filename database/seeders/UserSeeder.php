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
            'name' => 'SCMAdmin',
            'email' => 'scmadmin@gmail.com',
            'password' => Hash::make('12345678SCM'),
            'type' => '0',
            'phone' => '09798059425',
            'address' => 'Yangon',
            'dob' => '1995-06-16',
            'created_at'=>'2021-06-16 04:27:49',
            'updated_at' => '2021-06-16 04:27:49'
        ]);
        DB::table('users')->insert([
            'name' => 'User1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('12345678USER1'),
            'type' => '1',
            'phone' => '09977826355',
            'address' => 'Yangon',
            'dob' => '1997-12-21',
            'created_at'=>'2021-06-16 04:27:49',
            'updated_at' => '2021-06-16 04:27:49'
        ]);
        DB::table('users')->insert([
            'name' => 'User2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('12345678USER2'),
            'type' => '1',
            'phone' => '09876354212',
            'address' => 'Yangon',
            'dob' => '1985-06-20',
            'created_at'=>'2021-06-16 04:27:49',
            'updated_at' => '2021-06-16 04:27:49'
        ]);
        DB::table('users')->insert([
            'name' => 'User3',
            'email' => 'user3@gmail.com',
            'password' => Hash::make('12345678USER3'),
            'type' => '1',
            'phone' => '09874038212',
            'address' => 'Yangon',
            'dob' => '1996-07-28',
            'created_at'=>'2021-06-16 04:27:49',
            'updated_at' => '2021-06-16 04:27:49'
        ]);
    }
}
