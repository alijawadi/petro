<?php

namespace App\DomainLayer\ClientDomain\Actions;

use App\DomainLayer\ClientDomain\DTOs\ClientDTO;
use App\DomainLayer\ClientDomain\Models\Client;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class GetAllClientAction
{
    use AsAction;

    public function handle(bool $paginate = true): Paginator|Collection
    {
        $q = Client::with('location')->own();
        $clients = $paginate ? $q->paginate() : $q->get();

        return ClientDTO::collect($clients);
    }
}
