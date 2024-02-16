<?php

namespace App\DomainLayer\UserDomain\DTOs;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserDTO extends Data
{
    public function __construct(
        public int|Optional $id,
        public string|Optional $name,
        public string|Optional $email,
        public string|Optional $password
    ) {
    }
}
