<?php

namespace App\AppLayer\Controllers\Auth;

use App\AppLayer\Controllers\Controller;
use App\AppLayer\Requests\Auth\RegisterRequest;
use App\DomainLayer\UserDomain\Actions\Auth\RegisterUserAction;
use App\DomainLayer\UserDomain\DTOs\UserDTO;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        RegisterUserAction::run(UserDTO::from($request));

        return redirect(RouteServiceProvider::HOME);
    }
}
