<?php

namespace App\DomainLayer\UserDomain\Actions\Auth;

use App\DomainLayer\UserDomain\DTOs\UpdatePasswordDTO;
use App\DomainLayer\UserDomain\Models\User;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdatePasswordAction
{
    use AsAction;

    public function handle(UpdatePasswordDTO $passwordDTO): void
    {
        $user = User::query()->find($passwordDTO->userId);

        $user->update([
            'password' => Hash::make($passwordDTO->password),
        ]);
    }
}
