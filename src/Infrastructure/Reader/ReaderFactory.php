<?php

declare(strict_types=1);

namespace App\Infrastructure\Reader;

use App\Domain\Reader;
use Exception;

class ReaderFactory
{
    public static function getReader(string $filename): Reader
    {
        $filenameParts = explode('.', $filename);
        $extension = strtolower($filenameParts[count($filenameParts) - 1]);

        switch ($extension) {
            case 'xml':
                return new XmlReader($filename);
            case 'csv':
                return new CsvReader($filename);
            default:
                throw new Exception('Reader not implemented for ' . $extension . ' extension');
        }
    }
}
