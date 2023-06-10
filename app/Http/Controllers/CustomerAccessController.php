<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Stockroom;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Receive;
use App\Models\ReceivePerItem;
use App\Models\CustomerAccess;

class CustomerAccessController extends Controller
{
    public function index(){
        
        return view('customeraccess');
    }
}
