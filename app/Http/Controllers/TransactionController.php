<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Stockroom;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Receive;
use App\Helpers\ReceiveBatchGenerator;

class TransactionController extends Controller
{
    public function index(){
        
        $customers = Customer::all();
        $customerId = $customers->first()->id;

        return view('operation.transaction', compact('customers', 'customerId'));

    }

    
    // public function show($customerId){

        
    //     $stockroom = Stockroom::where('name', $customer->stockroom)->first();

    //     return redirect()->route('operation.store',['customer_id' => $customerId]);
    // }



    public function store(Request $request, $customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $stockroom = Stockroom::where('name', $customer->stockroom)->first();

        $receive = new Receive();

        $batchNumber = ReceiveBatchGenerator::generate($receive, [
            'table' => $receive->getTable() . '_id',
            'length' => 8,
            'prefix' => date('y'),
        ]);

        $receive->id = $batchNumber;
        $receive->customer_name = $customer->name;
        $receive->stockroom_name = $stockroom->name;
        $receive->save();

        return redirect()->route('operation.store', ['customerId' => $customerId]);


    }

    

}
