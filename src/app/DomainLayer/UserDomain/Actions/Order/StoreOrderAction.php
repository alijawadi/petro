<?php

namespace App\DomainLayer\UserDomain\Actions\Order;

use App\DomainLayer\UserDomain\DTOs\OrderDTO;
use App\DomainLayer\UserDomain\DTOs\UserDTO;
use App\DomainLayer\UserDomain\Models\Order;
use App\DomainLayer\UserDomain\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreOrderAction
{
    use AsAction;

    public function handle(OrderDTO $orderDTO): OrderDTO
    {
        $order = Order::query()->create([
            'user_id' => $orderDTO->user_id,
            'client_id' => $orderDTO->client_id,
            'amount' => $orderDTO->amount,
            'fuel_name' => $orderDTO->fuel_name,
        ]);

        return OrderDTO::from($order);
    }
}
