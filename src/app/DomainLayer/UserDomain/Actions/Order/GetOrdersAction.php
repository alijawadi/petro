<?php

namespace App\DomainLayer\UserDomain\Actions\Order;

use App\DomainLayer\UserDomain\DTOs\OrderDTO;
use App\DomainLayer\UserDomain\Models\Order;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class GetOrdersAction
{
    use AsAction;

    public function handle(): Paginator|Collection
    {
        $orders = Order::with('client')->own()->paginate();

        return OrderDTO::collect($orders);
    }
}
