<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = Sentry::createGroup(array(
            'name'        => 'Admin',
            'permissions' => array(
                'settings.change' => 1,
                'topic.edit' => 1,
                'topic.delete' => 1,
                'entry.edit' => 1,
                'entry.delete' => 1,
                'user.edit' => 1,
                'user.delete' => 1,
            ),
        ));

        $group = Sentry::createGroup(array(
            'name'        => 'Moderator',
            'permissions' => array(
                'topic.edit' => 1,
                'topic.delete' => 1,
                'entry.edit' => 1,
                'entry.delete' => 1,
            ),
        ));

        $user = Sentry::createUser(array(
            'email'     => 'admin@mini-crumb.com',
            'username'  => 'admin',
            'password'  => 'admin',
            'activated' => true,
        ));

        // Find the group using the group id
        $adminGroup = Sentry::findGroupByName('Admin');

        // Assign the group to the user
        $user->addGroup($adminGroup);
    }
}
