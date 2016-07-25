<?php

use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        define('title', 'title');
        define('slug', 'slug');
        define('body', 'body');
        define('category_id', 'category_id');
        define('user_id', 'user_id');
        define('is_sticked', 'is_sticked');
        define('is_locked', 'is_locked');

        DB::table('topics')->insert(array(
            array(
                title   => 'THE #1 FREE, OPEN SOURCE BULLETIN BOARD SOFTWARE',
                slug    => 'the-1-free-open-source-bulletin-board-software',
                body    => 'phpBB is a free flat-forum bulletin board software solution that can be used to stay in touch with a group of people or can power your entire website. With an extensive database of user-created modifications and styles database containing hundreds of style and image packages to customise your board, you can create a very unique forum in minutes.

No other bulletin board software offers a greater complement of features, while maintaining efficiency and ease of use. Best of all, phpBB is completely free. We welcome you to test it for yourself today. If you have any questions please visit our Community Forum where our staff and members of the community will be happy to assist you with anything from configuring the software to modifying the code for individual needs. Learn more about phpBB.',
                user_id => 1
            ),
            array(
                title   => 'phpBB 3.2 Rhea is near – help us test it now!',
                slug    => 'phpbb-3-2-rhea-is-near-help-us-test-it-now',
                body    => '

On October 28th, 2014, we published phpBB 3.1 Ascraeus, the culmination of nearly 8 years of development since phpBB 3.0—an eternity when it comes to web development. We learned our lesson from trying to build a major feature release over a timespan that saw major changes in web technologies; while our roadmap had to change frequently, none of the progress was made available to you—our users. When we finally released phpBB 3.1, I announced that phpBB would from now on see feature releases on an annual basis.

It has now been one year and 6 months since I made this statement. Our most recent release has been phpBB 3.2 Rhea 3.2.0 Beta2, on March 7th 2016. So we missed our goal, but we’re well on the way to reaching a new stable feature release before summer this year. We’ve been making great progress with tweaking our workflows to more strictly adhere to the schedule in the future.

As the Development Team Leader, I updated you much too infrequently on development progress, partly due to having many other tasks to also focus on. Unless you follow our development forums at Area51, or our social media accounts on Facebook or Twitter, you are unlikely to have heard of our recent 3.2 Beta releases. As these responsibilities exceed what a single person can do well, Marc Alexander stepped up in February to take over the Development Team Lead position. From now on, I will be responsible for more frequently informing you of all developments regarding phpBB, as its new Product Manager.

We are looking forward to your feedback on the Beta releases and upcoming final release candidates of phpBB 3.2 Rhea.We cannot produce a stable final product without your testing and bug reporting. Download Beta packages from our archive at https://download.phpbb.com/pub/release/3.2/unstable/3.2.0-b2/. Please keep in mind that you should not run this version of phpBB on your live sites yet, and no support will be offered until the RC phase.

If you’d like to get involved with phpBB development to help us finish new features faster, check out the information available on Area51. And lastly, if you’d like to stay up to date on phpBB development progress, follow this blog!

You can follow any responses to this entry through the RSS 2.0 feed. Both comments and pings are currently closed.',
                user_id => 1
            ),
            array(
                title   => 'AutoMOD',
                slug    => 'automod',
                body    => 'AutoMOD is a tool designed to parse and automatically install MODX MODifications for phpBB3. It also has the ability to uninstall MODs. It is a useful tool for MOD authors and end users alike: All MODs are installed with AutoMOD prior to being accepted in the MODs Database. As such, any MOD listed in the MOD Database should install with AutoMOD. Support for AutoMOD is available via the forums.',
                user_id => 1
            )
        ));
    }
}
