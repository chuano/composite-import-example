<?php

declare(strict_types=1);

namespace App\Infrastructure\Reader;

use App\Domain\Customer;
use App\Domain\Reader;

class MultiReader implements Reader
{
    private array $readers;
    private array $customers = [];

    /**
     * @param Reader[] $readers
     */
    public function __construct(array $readers)
    {
        $this->readers = $readers;
    }

    /**
     * @return Customer[]
     */
    public function read(): array
    {
        foreach ($this->readers as $reader) {
            $this->addCustomers($reader);
        }

        return $this->customers;
    }

    private function addCustomers(Reader $reader): void
    {
        foreach ($reader->read() as $customer) {
            $this->customers[] = $customer;
        }
    }
}
