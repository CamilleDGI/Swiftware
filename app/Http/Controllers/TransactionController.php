<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Stockroom;
use App\Models\Product;


class TransactionController extends Controller
{
    public function index(){
        
        $customers = Customer::all();

        return view('operation.transaction', compact('customers'));

    }

    public function receive($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $stockroom = Stockroom::where('name', $customer->stockroom)->first();

        
        $customerProducts = Product::where('stockroom', $customer->stockroom)->get();

        return view('operation.receive', compact('customer', 'stockroom', 'customerProducts'));
    }
}
