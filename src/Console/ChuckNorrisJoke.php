<?php

namespace Emmy\ChuckNorrisJokes\Console;

use Emmy\ChuckNorrisJokes\Facades\ChuckNorris;
use Illuminate\Console\Command;

class ChuckNorrisJoke extends Command
{
    protected $signature = 'chuck-norris';

    protected $description = 'Output a funny Chuck Norris Joke.';

    public function handle()
    {
        $this->info(ChuckNorris::getRandomJoke());
    }
}
