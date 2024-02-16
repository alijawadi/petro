<?php

namespace App\DomainLayer\ClientDomain\Actions;

use App\DomainLayer\ClientDomain\DTOs\ClientDTO;
use App\DomainLayer\ClientDomain\Models\Client;
use App\DomainLayer\ClientDomain\Models\Location;
use Illuminate\Support\Facades\DB;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateClientAction
{
    use AsAction;

    public function handle(ClientDTO $clientDTO): ClientDTO
    {
        try {
            DB::beginTransaction();
            $client = Client::query()->create([
                'name' => $clientDTO->name,
                'user_id' => $clientDTO->owner_id
            ]);
            $location = Location::query()->create([
                'address' => $clientDTO->address,
                'client_id' => $client->id
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return ClientDTO::from($client, $location);
    }
}
