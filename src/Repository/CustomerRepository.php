<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\Customer;

class CustomerRepository
{
    private array $customers = [];

    public function __construct()
    {
    }

    public function store(Customer $customer): void
    {
        $this->customers[] = $customer;
    }

    public function findAll(): array
    {
        return $this->customers;
    }
}
