<?php

namespace App\DomainLayer\UserDomain\DTOs;

use App\DomainLayer\ClientDomain\DTOs\ClientDTO;
use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OrderDTO extends Data
{
    public string $created_at_human_readable;
    public string $created_at_string;

    public function __construct(
        public string|Optional $id,
        public string $fuel_name,
        public int $amount,
        public int $client_id,
        public int $user_id,
        public null|Optional|ClientDTO $client,
        public Carbon|Optional $created_at,
        public Carbon|Optional $updated_at,
    ) {
        if ($this->created_at instanceof Carbon) {
            $this->created_at_human_readable = $this->created_at->diffForHumans();
            $this->created_at_string = $this->created_at->toDateTimeString();
        }
    }
}
