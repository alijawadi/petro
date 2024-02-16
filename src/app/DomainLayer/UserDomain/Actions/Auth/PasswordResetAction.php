<?php

namespace App\DomainLayer\UserDomain\Actions\Auth;

use App\DomainLayer\UserDomain\DTOs\NewPasswordResponseDTO;
use App\DomainLayer\UserDomain\DTOs\PasswordResetDTO;
use Illuminate\Support\Facades\Password;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\LaravelData\Data;

class PasswordResetAction
{
    use AsAction;

    public function handle(PasswordResetDTO $passwordResetDTO): Data
    {
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $passwordResetDTO->only('email')->toArray()
        );

        $redirect = $status == Password::RESET_LINK_SENT;

        return NewPasswordResponseDTO::from(compact(['redirect', 'status']));
    }
}
