<?php

namespace App\Tests\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
    public function testApiCheckpointGetAll()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/characters');

        $this->assertResponseStatusCodeSame(200);
        $this->assertResponseHeaderSame('Content-Type', 'application/json');
    }

    public function testApiCheckpointGetOne()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/characters/2');

        $this->assertResponseStatusCodeSame(200);
        $this->assertResponseHeaderSame('Content-Type', 'application/json');
    }
}
