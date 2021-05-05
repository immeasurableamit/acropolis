<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('admins')->delete();

        DB::table('admins')->insert([
            'id' => 1,
            'name' => 'Admin',
            'password' => Hash::make('qawsed53'),
            'email' => 'superadmin@gmail.com',
            'created_at' => now(),
        ]);


    }
}
