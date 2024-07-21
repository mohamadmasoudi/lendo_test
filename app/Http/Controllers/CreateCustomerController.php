<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class CreateCustomerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateCustomerRequest $request)
    {
        $customer = Customer::create($request->all());

        return CustomerResource::make($customer);
    }
}
