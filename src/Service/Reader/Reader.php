<?php

namespace App\Service\Reader;

use App\Model\Customer;

interface Reader
{
    /**
     * @return Customer[]
     */
    public function read(): array;
}
