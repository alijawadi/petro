<?php

namespace App\DomainLayer\UserDomain\DTOs;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PasswordResetDTO extends Data
{
    public function __construct(
        public string $email
    ) {
    }
}
