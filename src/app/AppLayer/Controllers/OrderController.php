<?php

namespace App\AppLayer\Controllers;

use App\AppLayer\Requests\StoreOrderRequest;
use App\DomainLayer\ClientDomain\Actions\GetAllClientAction;
use App\DomainLayer\UserDomain\Actions\Order\GetOrdersAction;
use App\DomainLayer\UserDomain\Actions\Order\StoreOrderAction;
use App\DomainLayer\UserDomain\DTOs\OrderDTO;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index(): \Inertia\Response
    {
        $orders = GetOrdersAction::run();

        return Inertia::render('Order/Index', [
            "orders" => $orders,
        ]);
    }

    public function create(): \Inertia\Response
    {
        $clients = GetAllClientAction::run(paginate: false);

        return Inertia::render('Order/Create', [
            "clients" => $clients
        ]);
    }

    public function store(StoreOrderRequest $request): \Illuminate\Http\RedirectResponse
    {
        $array = array_merge(
            $request->validated(), [
                'user_id' => $request->user()->id,
                'client_id' => $request->client,
                'client' => null
            ]
        );
        $order = OrderDTO::from($array);
        StoreOrderAction::run($order);

        return to_route('order.index');
    }
}
