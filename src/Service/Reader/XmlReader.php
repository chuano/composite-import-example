<?php

declare(strict_types=1);

namespace App\Service\Reader;

use App\Model\Customer;

class XmlReader implements Reader
{
    private string $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    /**
     * @return Customer[]
     */
    public function read(): array
    {
        $customers = [];

        $xml = simplexml_load_file($this->filename);
        foreach ($xml->customer as $rawCustomer) {
            $customers[] = new Customer((string)$rawCustomer->name, (string)$rawCustomer->lastName);
        }

        return $customers;
    }
}
