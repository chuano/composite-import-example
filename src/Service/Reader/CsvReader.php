<?php

declare(strict_types=1);

namespace App\Service\Reader;

use App\Model\Customer;

class CsvReader implements Reader
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
        $lines = [];

        $fp = fopen($this->filename, "r");
        while (!feof($fp)) {
            $line = fgetcsv($fp);
            if ($line) {
                $lines[] = $line;
            }
        }
        fclose($fp);

        return array_map(
            fn(array $fields) => new Customer($fields[0], $fields[1]),
            $lines
        );
    }
}
