<?php

namespace App\AppLayer\Controllers;

use App\AppLayer\Requests\StoreClientRequest;
use App\DomainLayer\ClientDomain\Actions\CreateClientAction;
use App\DomainLayer\ClientDomain\Actions\GetAllClientAction;
use App\DomainLayer\ClientDomain\DTOs\ClientDTO;
use Inertia\Inertia;

class ClientController extends Controller
{
    public function index(): \Inertia\Response
    {
        $clients = GetAllClientAction::run();

        return Inertia::render('Client/Index', [
            'clients' => $clients
        ]);
    }

    public function create(): \Inertia\Response
    {
        return Inertia::render('Client/Create');
    }

    public function store(StoreClientRequest $request): \Illuminate\Http\RedirectResponse
    {
        $client = ClientDTO::from(array_merge($request->validated(), ['owner_id' => $request->user()->id]));
        CreateClientAction::run($client);
        return to_route('client.index');
    }
}
