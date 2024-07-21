<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CreateOrderController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateOrderRequest $request)
    {
        $customer = Customer::findOrFail($request['customer_id']);
        Gate::authorize('create', [Order::class,$customer]);
        $order = Order::create($request->except('customer_status'));

        return Response()->json($order);
    }
}
