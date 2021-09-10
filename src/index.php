<?php

use App\Repository\CustomerRepository;
use App\Service\ImportCustomers;
use App\Service\Reader\MultiReader;
use App\Service\Reader\ReaderFactory;

require __DIR__ . "/../vendor/autoload.php";

$readers = array_map(
    fn(string $filename) => ReaderFactory::getReader($filename),
    explode(",", $argv[1])
);
$reader = new MultiReader($readers);
$importCustomers = new ImportCustomers($reader, new CustomerRepository());
$customers = $importCustomers();
var_dump($customers);
