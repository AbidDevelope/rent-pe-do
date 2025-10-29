<?php

namespace App\Http\Controllers\Web\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Repositories\CustomerRepository;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = (new CustomerRepository())->getAllOrFindBySearch();
        return view('customers.index', compact('customers'));
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }
}
