<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class OpsStockroomController extends Controller
{
    public function index(){
        
        $customers = Customer::all();

        return view('operation.opsstockroom', compact('customers'));

    }
}
