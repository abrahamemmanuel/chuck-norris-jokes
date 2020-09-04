<?php

namespace Emmy\ChuckNorrisJokes;

use Illuminate\Support\ServiceProvider;
use Emmy\ChuckNorrisJokes\Console\ChuckNorrisJoke;

class ChuckNorrisJokesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if($this->app->runningInConsole()){
            $this->commands([
                ChuckNorrisJoke::class
            ]);
        }
    }

    public function register()
    {
        $this->app->bind('chuck-norris', function () {
            return new JokeFactory();
        });
    }
}
