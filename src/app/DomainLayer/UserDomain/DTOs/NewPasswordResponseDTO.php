<?php

namespace App\DomainLayer\UserDomain\DTOs;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class NewPasswordResponseDTO extends Data
{
    public function __construct(
        public string $status,
        public bool $redirect,
    ) {
    }
}
