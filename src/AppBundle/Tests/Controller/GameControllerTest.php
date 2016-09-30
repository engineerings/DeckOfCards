<?php

declare (strict_types=1);

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GameControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/game');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Game of cards', $crawler->filter('h1')->text());

        $link_smaller = $crawler->selectLink('Smaller')->link();
        $client->click( $link_smaller );
        $link_bigger = $crawler->selectLink('Bigger')->link();
        $client->click( $link_bigger );
    }

    public function testGameOver()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/over');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Game over try again', $crawler->filter('h1')->text());

        $link_start = $crawler->selectLink('Start Game')->link();
        $client->click( $link_start );

    }
}
