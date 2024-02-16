<?php

namespace App\AppLayer\Controllers\Auth;

use App\AppLayer\Controllers\Controller;
use App\AppLayer\Requests\Auth\PasswordResetRequest;
use App\DomainLayer\UserDomain\Actions\Auth\PasswordResetAction;
use App\DomainLayer\UserDomain\DTOs\PasswordResetDTO;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/ForgotPassword', [
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(PasswordResetRequest $request): RedirectResponse
    {
        $result = PasswordResetAction::run(PasswordResetDTO::from($request->validated()));

        if ($result->redirect) {
            return back()->with('status', __($result->status));
        }

        throw ValidationException::withMessages([
            'email' => [trans($result->status)],
        ]);
    }
}
