<?php

declare(strict_types=1);

namespace App\Domain;

class Customer
{
    private string $name;
    private string $lastname;

    public function __construct(string $name, string $lastname)
    {
        $this->name = $name;
        $this->lastname = $lastname;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }
}
