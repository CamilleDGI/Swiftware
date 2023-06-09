<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Stockroom;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Receive;


class ReceiveController extends Controller
{
    public function receive($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $stockroom = Stockroom::where('name', $customer->stockroom)->first();

        
        $customerProducts = Product::where('stockroom', $customer->stockroom)->get();

        return view('operation.receive', compact('customer', 'stockroom', 'customerProducts'));
    }

}
