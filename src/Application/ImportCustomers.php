<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\Customer;
use App\Domain\Reader;

class ImportCustomers
{
    private Reader $reader;

    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
    }

    /**
     * @return Customer[]
     */
    public function __invoke(): array
    {
        return $this->reader->read();
    }
}
