<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_users')->insert([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'noTelfon'  => '083344221122',
            'password'  => Hash::make('admin321'),
        ]);
    }
}
