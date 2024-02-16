<?php

namespace App\DomainLayer\ClientDomain\DTOs;

use App\DomainLayer\ClientDomain\Models\Client;
use App\DomainLayer\ClientDomain\Models\Location;
use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class LocationDTO extends Data
{
    public function __construct(
        public int|Optional $user_id,
        public int|Optional $id,
        public string $address,
        public Carbon|Optional $created_at,
        public Carbon|Optional $updated_at,
    ) {
    }
}
