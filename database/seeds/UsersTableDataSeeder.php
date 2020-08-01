<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'firstName' => 'admin',
                'lastName' => 'admin',
                'email' => 'admin@gmail.com',
                'userName' => 'admin123',
                'password' => Hash::make('admin123'),
                'contact_no' => '1234567890',
                'address' => 'abc',
                'role' => '1',
                'status' => '1',
            ],
        ]);
    }
}
