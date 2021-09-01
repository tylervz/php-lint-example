<?php

namespace example;

require 'restServer/Server.php';

class ServerTest extends \Codeception\Test\Unit
{

    public function testGetDescription(): void
    {
        $server = new \restServer\Server(
            1,
            'https',
            'https://en.wikipedia.org',
            'Wikipedia'
        );
        $result = $server->getDescription();
        $this->assertEquals($result, 'Wikipedia');
    }

    public function testAddition(): void
    {
        $server = new \restServer\Server(
            1,
            'https',
            'https://en.wikipedia.org',
            'Wikipedia'
        );
        $result = $server->addTwoNumbers(5, 74);
        $this->assertEquals($result, 79);
    }
}
