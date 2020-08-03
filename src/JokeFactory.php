<?php

namespace Emmy\ChukNorrisJokes;

class JokeFactory
{
    protected $jokes = [
        'Chuck Norris really can get chicken from a tuna can.',
        'Before going to bed, the Boogeyman always checks his closet for Chuck Norris.',
        'Chuck Norris doesn\'t tell lies. He changes facts.',
    ];

    public function __construct(array $jokes = null)
    {
        if ($jokes) {
            $this->jokes = $jokes;
        };
    }

    public function getRandomJoke()
    {
        return $this->jokes[array_rand($this->jokes)];
    } 
}
