<?php

require('vendor/autoload.php');
use PHPUnit\schema\Framework\TestCase;
class BooksTest extends TestCase {
    protected $client;

    protected function setUp() {
        $this->client = new GuzzleHttp\Client([
            'base_uri' => 'http://localhost/restapi/api/'
        ]);
    }

    public function testGet_ValidInput_BookObject() {
        $response = $this->client->get('/read.php', [
            'query' => [
                'id' => '1'
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        $data = json_decode($response->getBody(), true);

        $this->assertArrayHasKey('bookId', $data);
        $this->assertArrayHasKey('name', $data);
        $this->assertArrayHasKey('properties', $data);
        $this->assertEquals(42, $data['price']);
    }
}