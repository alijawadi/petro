<?php

namespace App\DomainLayer\ClientDomain\DTOs;

use App\DomainLayer\ClientDomain\Models\Client;
use App\DomainLayer\ClientDomain\Models\Location;
use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ClientDTO extends Data
{
    public string $created_at_human_readable;

    public function __construct(
        public int|Optional $owner_id,
        public int|Optional $id,
        public string $name,
        public string|null $address,
        public null|LocationDTO $location,
        public Carbon|Optional $created_at,
        public Carbon|Optional $updated_at,
    ) {
        if ($this->created_at instanceof Carbon){
            $this->created_at_human_readable = $this->created_at->diffForHumans();
        }
    }

    public function fromMultiple(Client $client, Location $location): ClientDTO
    {
        $lastUpdated = $client->updated_at->timestamp > $location->updated_at->timestamp ? $client->updated_at : $location->updated_at;

        return new self(
            Optional::create(),
            $client->id,
            $client->name,
            $location->address,
            $location,
            $client->created_at,
            $lastUpdated
        );
    }

    public static function collectArray(array $items): ClientCollectionDTO
    {
        return new ClientCollectionDTO(
            parent::collect($items),
            array_unique(array_map(fn(ClientDTO $client) => $client->artist, $items))
        );
    }
}
