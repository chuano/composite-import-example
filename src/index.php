<?php

use App\Repository\CustomerRepository;
use App\Service\ImportCustomers;
use App\Service\Reader\MultiReader;
use App\Service\Reader\ReaderFactory;
use App\Service\Reader\XmlReader;

require __DIR__ . "/../vendor/autoload.php";

$readers = [];
$filenames = explode(",", $argv[1]);
foreach ($filenames as $filename) {
    $readers[] = ReaderFactory::getReader($filename);
}
$reader = new MultiReader($readers);
$importCustomers = new ImportCustomers($reader, new CustomerRepository());
$customers = $importCustomers();
var_dump($customers);
