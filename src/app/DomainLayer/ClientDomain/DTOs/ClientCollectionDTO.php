<?php

namespace App\DomainLayer\ClientDomain\DTOs;

use Spatie\LaravelData\DataCollection;

class ClientCollectionDTO extends DataCollection
{
    public function __construct(
        $items = [],
        public array $clients = [],
    ) {
        parent::__construct($items);
    }
}
