<?php

namespace App\Domain;

interface Reader
{
    /**
     * @return Customer[]
     */
    public function read(): array;
}
