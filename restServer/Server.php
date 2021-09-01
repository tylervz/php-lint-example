<?php

namespace restServer;

class Server
{

    $id;
    string $protocol;
    protected string $domain;
    protected string $description;

    public function __construct(
        int $id,
        string $protocol,
        string $domain,
        string $description
    ) {
        $this->id = $id;
        $this->protocol = $protocol;
        $this->domain = $domain;
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function addTwoNumbers(int $a, int $b): int
    {
        return $a + $b;
    }
}
