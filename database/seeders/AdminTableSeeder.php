<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /**
     * Run the database seeders.
     */
    public function run()
    {
        DB::table('admins')->delete();

        DB::table('admins')->insert([
            'name' => 'Super Admin',
            'email' => 'super_admin@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
