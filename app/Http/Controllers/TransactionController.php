<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Stockroom;
use App\Models\Product;
use App\Models\Transaction;


class TransactionController extends Controller
{
    public function index(){
        
        $customers = Customer::all();

        return view('operation.transaction', compact('customers'));

    }


}
