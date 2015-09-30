<?php
namespace App\Tests\Controllers;

use App\Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends TestCase {

    use DatabaseMigrations;

    /**
     * Тестирование функции регистрации, авторизации и разлогирования
     */
	public function testRegister()
	{
        //Register
        $this->visit('/auth/register')
            ->type('Test', 'name')
            ->type('test@email.com', 'email')
            ->type('password', 'password')
            ->type('password', 'password_confirmation')
            ->press("Register")
            ->seePageIs('/');

        //Check if new user record exist
        $this->seeInDatabase('users', [
            'name' => 'Test',
            'email' => 'test@email.com',
        ]);
    }

    public function testLoginAndLogout(){

        //Create new user
        factory(\App\Models\User::class)->create([
            'email' => 'test@email.com',
            'password' => $this->app['hash']->make('secret')
        ]);

        //Check log in
        $this->visit('/auth/login')
            ->type('test@email.com', 'email')
            ->type('secret', 'password')
            ->press("Login")
            ->seePageIs('/');

        $this->assertTrue($this->app['auth']->check());

        //Check log out
        $this->visit('/auth/logout')
            ->seePageIs('/');

        $this->assertFalse($this->app['auth']->check());
    }
}
