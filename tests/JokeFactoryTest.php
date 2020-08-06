<?php

namespace Emmy\ChukNorrisJokes\Tests;

use Emmy\ChukNorrisJokes\JokeFactory;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        $jokes = new JokeFactory([
            'This is a joke',
        ]);

        $joke = $jokes->getRandomJoke();

        $this->assertSame('This is a joke', $joke);
    }

    /** @test */
    public function it_returns_a_predefined_joke()
    {
        $chukNorrisJokes = [
            'Chuck Norris really can get chicken from a tuna can.',
            'Before going to bed, the Boogeyman always checks his closet for Chuck Norris.',
            'Chuck Norris doesn\'t tell lies. He changes facts.',
        ];

        $jokes = new JokeFactory();

        $joke = $jokes->getRandomJoke();

        $this->assertContains($joke, $chukNorrisJokes);
    }
}
