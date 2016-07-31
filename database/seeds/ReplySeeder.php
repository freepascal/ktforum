<?php

use Illuminate\Database\Seeder;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        define('body', 'body');
        define('topic_id', 'topic_id');
        define('user_id', 'user_id');
        for($i = 1; $i <= 1000; $i++) {
            DB::table('replies')->insert(array(
                body => 'Reply #'. $i,
                topic_id => 1,
                user_id => 2
            ));
        }
        DB::table('replies')->insert(array(
            body => 'Khang Tran is a fullstack developer',
            topic_id => 2,
            user_id => 2
        ));
    }
}
