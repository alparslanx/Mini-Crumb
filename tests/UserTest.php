<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{

    public function testUserCanRegister()
    {

        $this->visit('/register')
             ->type('Admin', 'username')
             ->type('mini-crumb@mini-crumb.com', 'email')
             ->type('admin', 'password')
             ->press('Gonder')
             ->seePageIs('/');

    }

    public function testUserCanLogin()
    {

        $this->visit('/login')
            ->type('mini-crumb@mini-crumb.com', 'email')
            ->type('admin', 'password')
            ->press('Gonder')
            ->seePageIs('/');

    }
}
