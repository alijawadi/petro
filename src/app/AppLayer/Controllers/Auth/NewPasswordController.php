<?php

namespace App\AppLayer\Controllers\Auth;

use App\AppLayer\Controllers\Controller;
use App\AppLayer\Requests\Auth\NewPasswordRequest;
use App\DomainLayer\UserDomain\Actions\Auth\NewPasswordAction;
use App\DomainLayer\UserDomain\DTOs\NewPasswordDTO;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): Response
    {
        return Inertia::render('Auth/ResetPassword', [
            'email' => $request->email,
            'token' => $request->route('token'),
        ]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws ValidationException
     */
    public function store(NewPasswordRequest $request): RedirectResponse
    {
        $dto = NewPasswordDTO::from($request->only('email', 'password', 'password_confirmation', 'token'));

        $responseDTO = NewPasswordAction::run($dto);

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($responseDTO->redirect) {
            return redirect()->route('login')->with('status', __($responseDTO->status));
        }

        throw ValidationException::withMessages([
            'email' => [trans($responseDTO->status)],
        ]);
    }
}
