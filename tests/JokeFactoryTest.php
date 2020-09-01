<?php

namespace Emmy\ChuckNorrisJokes\Tests;

use Emmy\ChuckNorrisJokes\JokeFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        // Create a mock and queue two responses.
        $mock = new MockHandler([
            new Response(200, [], '{ "type": "success", "value": { "id": 98, "joke": "In the beginning there was nothing...then Chuck Norris Roundhouse kicked that nothing in the face and said &quot;Get a job&quot;. That is the story of the universe.", "categories": [] } }'),
        ]);

        $handlerStack = HandlerStack::create($mock);

        $client = new Client(['handler' => $handlerStack]);

        $jokes = new JokeFactory($client);

        $joke = $jokes->getRandomJoke();

        $this->assertSame('In the beginning there was nothing...then Chuck Norris Roundhouse kicked that nothing in the face and said &quot;Get a job&quot;. That is the story of the universe.', $joke);
    }
}
