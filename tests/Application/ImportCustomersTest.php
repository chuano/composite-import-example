<?php

namespace Tests\Application;

use App\Application\ImportCustomers;
use App\Domain\Customer;
use App\Infrastructure\Reader\MultiReader;
use App\Infrastructure\Reader\ReaderFactory;
use PHPUnit\Framework\TestCase;

class ImportCustomersTest extends TestCase
{
    /** @test */
    public function should_import_from_all_files(): void
    {
        $readers = [
            ReaderFactory::getReader(__DIR__ . "/../../customers.csv"),
            ReaderFactory::getReader(__DIR__ . "/../../customers.xml"),
        ];
        $importCustomers = new ImportCustomers(new MultiReader($readers));
        $this->assertEquals($this->getExpected(), $importCustomers());
    }

    /**
     * @return Customer[]
     */
    private function getExpected(): array
    {
        return [
            new Customer('Juan', 'Martínez'),
            new Customer('Pedro', 'López'),
            new Customer('Pedro', 'Martínez'),
        ];
    }
}
