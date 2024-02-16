<?php

namespace App\AppLayer\Controllers\Auth;

use App\AppLayer\Controllers\Controller;
use App\AppLayer\Requests\Auth\UpdatePasswordRequest;
use App\DomainLayer\UserDomain\Actions\Auth\UpdatePasswordAction;
use App\DomainLayer\UserDomain\DTOs\UpdatePasswordDTO;
use Illuminate\Http\RedirectResponse;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(UpdatePasswordRequest $request): RedirectResponse
    {
        UpdatePasswordAction::run(
            UpdatePasswordDTO::from([
                'userId' => $request->user()->id,
                'password' => $request->password,
            ])
        );

        return back();
    }
}
