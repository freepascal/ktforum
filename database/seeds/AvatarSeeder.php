<?php

use Illuminate\Database\Seeder;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        define('slug',      'slug');
        define('path',      'path');
        define('user_id',   'user_id');
        DB::table('avatars')->insert(array(
            array(
                slug    => '50108',
                path    => '50108.jpg',
                user_id => 1,
            )
        ));
    }
}
