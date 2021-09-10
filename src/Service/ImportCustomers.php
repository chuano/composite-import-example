<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\Customer;
use App\Repository\CustomerRepository;
use App\Service\Reader\Reader;

class ImportCustomers
{
    private Reader $reader;
    private CustomerRepository $customerRepository;

    public function __construct(Reader $reader, CustomerRepository $customerRepository)
    {
        $this->reader = $reader;
        $this->customerRepository = $customerRepository;
    }

    /**
     * @return Customer[]
     */
    public function __invoke(): array
    {
        foreach($this->reader->read() as $customer) {
            $this->customerRepository->store($customer);
        }

        return $this->customerRepository->findAll();
    }
}
