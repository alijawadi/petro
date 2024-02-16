<?php

namespace App\DomainLayer\UserDomain\DTOs;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdatePasswordDTO extends Data
{
    public function __construct(
        public int $userId,
        public string $password
    ) {
    }
}
