<?php

namespace App\DomainLayer\UserDomain\DTOs;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class NewPasswordDTO extends Data
{
    public function __construct(
        public string $email,
        public string $password,
        public string $password_confirmation,
        public string $token
    ) {
    }
}
