<?php

use App\Application\ImportCustomers;
use App\Infrastructure\Reader\MultiReader;
use App\Infrastructure\Reader\ReaderFactory;

require __DIR__ . "/../vendor/autoload.php";

$readers = array_map(
    fn(string $filename) => ReaderFactory::getReader($filename),
    explode(",", $argv[1])
);
$reader = new MultiReader($readers);
$importCustomers = new ImportCustomers($reader);
$customers = $importCustomers();
var_dump($customers);
