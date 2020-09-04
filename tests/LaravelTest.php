<?php

namespace Emmy\ChuckNorrisJokes\Tests;

use Emmy\ChuckNorrisJokes\ChuckNorrisJokesServiceProvider;
use Emmy\ChuckNorrisJokes\Console\ChuckNorrisJoke;
use Emmy\ChuckNorrisJokes\Facades\ChuckNorris;
use Illuminate\Support\Facades\Artisan;
use Orchestra\Testbench\TestCase;

class LaravelTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ChuckNorrisJokesServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'ChuckNorris' => ChuckNorrisJoke::class,
        ];
    }

    /** @test */
    public function the_console_command_returns_a_joke()
    {
        $this->withoutMockingConsoleOutput();

        ChuckNorris::shouldReceive('getRandomJoke')
              ->once()
              ->andReturn('some joke');

        $this->artisan('chuck-norris');

        $output = Artisan::output();

        $this->assertSame('some joke'.PHP_EOL, $output);
    }
}
