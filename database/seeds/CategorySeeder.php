<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        define('title', 'title');
        define('description', 'description');
        define('slug', 'slug');
        define('parent_id', 'parent_id');
        DB::table('categories')->insert(array(
            array(
                title           => 'PHPBB3',
                description     => 'phpBB is a free flat-forum bulletin board software solution that can be used to stay in touch with a group of people or can power your entire website. With an extensive database of user-created modifications and styles database containing hundreds of style and image packages to customise your board, you can create a very unique forum in minutes.',
                slug            => 'phpbb'
            ),
            array(
                title           => 'Wordpress',
                description     => 'WordPress is web software you can use to create a beautiful website, blog, or app. We like to say that WordPress is both free and priceless at the same time.',
                slug            => 'wordpress'
            ),
            array(
                title           => 'Django',
                description     => 'Django makes it easier to build better Web apps more quickly and with less code.',
                slug            => 'django'
            )
        ));

        DB::table('categories')->insert(array(
            array(
                title           => 'Extensions in Development',
                description     => 'A place for Extension Authors to post and receive feedback on Extensions still in development. <b>No Extensions within this forum should be used within a live environment!</b>',
                slug            => 'extensions-in-development',
                parent_id       => 1
            ),
            array(
                title           => '[3.x.y] Support Forum',
                description     => 'Get help with installation and running phpBB 3.2.x here. Please do <b>not</b> post bug reports, feature requests, or extension related questions here.',
                slug            => '3-x-y-support-forum',
                parent_id       => 1
            ),
            array(
                title           => '[3.1.x] Styles in Development',
                description     => 'For style authors to post and receive feedback on styles still in development. Any development styles you wish to use on your live board should be installed with caution!',
                slug            => '3-1-x-styles-in-development',
                parent_id       => 1
            )
        ));
        DB::table('categories')->insert(array(
            array(
                title           => '[3.1.x] Convertors',
                description     => '',
                slug            => '3-1-x-convertors',
                parent_id       => 5
            ),
            array(
                title           => '[3.1.x] Translations',
                description     => '',
                slug            => '3-1-x-translations',
                parent_id       => 5
            )
        ));
    }
}
