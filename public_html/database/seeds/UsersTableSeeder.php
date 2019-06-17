<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personnel')->insert([
            'id' => 1,
            'email' => 'tranminhtuyenphong3@gmail.com',
            'password' => bcrypt('12345'),
            'level'=>1,
        ]);    }
}
