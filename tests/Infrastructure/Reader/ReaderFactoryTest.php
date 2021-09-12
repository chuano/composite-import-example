<?php

namespace Tests\Infrastructure\Reader;

use App\Infrastructure\Reader\CsvReader;
use App\Infrastructure\Reader\ReaderFactory;
use App\Infrastructure\Reader\XmlReader;
use Exception;
use PHPUnit\Framework\TestCase;

class ReaderFactoryTest extends TestCase
{
    /** @test */
    public function should_return_csv_reader_given_csv_extension(): void
    {
        $reader = ReaderFactory::getReader("test.csv");
        $this->assertInstanceOf(CsvReader::class, $reader);
    }

    /** @test */
    public function should_return_xml_reader_given_xml_extension(): void
    {
        $reader = ReaderFactory::getReader("test.xml");
        $this->assertInstanceOf(XmlReader::class, $reader);
    }

    /** @test */
    public function should_throw_exception_given_unknown_extension(): void
    {
        $this->expectException(Exception::class);
        $reader = ReaderFactory::getReader("test.txt");
    }


}
