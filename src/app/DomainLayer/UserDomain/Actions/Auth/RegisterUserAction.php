<?php

namespace App\DomainLayer\UserDomain\Actions\Auth;

use App\DomainLayer\UserDomain\DTOs\UserDTO;
use App\DomainLayer\UserDomain\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\LaravelData\Data;

class RegisterUserAction
{
    use AsAction;

    public function handle(UserDTO $userDTO): Data
    {
        $user = User::create([
            'name' => $userDTO->name,
            'email' => $userDTO->email,
            'password' => Hash::make($userDTO->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return UserDTO::from($user);
    }
}
