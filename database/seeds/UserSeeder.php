<?php

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
        DB::table('users')->insert(array(
            array(
                'name'      => 'injury',
                'email'     => 'magicalmoon17@gmail.com',
                'password'  => bcrypt('123456')
            ),
            array(
                'name'      => 'admin',
                'email'     => 'khang.tuson@gmail.com',
                'password'  => bcrypt('123456')
            )
        ));
    }
}
