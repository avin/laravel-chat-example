<?php
namespace App\Tests;

class TestCase extends \Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://chat.site.dev';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Becomes a user.
     *
     * @return void
     */
    protected function beUser()
    {
        $this->user = factory(\App\Models\User::class)->create();
        $this->be($this->user);
    }

}
