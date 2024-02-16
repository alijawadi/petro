<?php

namespace App\DomainLayer\UserDomain\Actions\Auth;

use App\DomainLayer\UserDomain\DTOs\NewPasswordDTO;
use App\DomainLayer\UserDomain\DTOs\NewPasswordResponseDTO;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\LaravelData\Data;

class NewPasswordAction
{
    use AsAction;

    public function handle(NewPasswordDTO $newPasswordDTO): Data
    {
        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise, we will parse the error and return the response.
        $status = Password::reset(
            $newPasswordDTO->toArray(),
            function ($user) use ($newPasswordDTO) {
                $user->forceFill([
                    'password' => Hash::make($newPasswordDTO->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will set the redirect value to true
        $redirect = (bool) $status == Password::PASSWORD_RESET;

        return NewPasswordResponseDTO::from(compact(['redirect', 'status']));
    }
}
