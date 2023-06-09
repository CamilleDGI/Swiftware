<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Stockroom;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Receive;
use App\Models\ReceivePerItem;


class ReceiveController extends Controller
{

    function index(){
        Helper::test();
    }

    public function show($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $stockroom = Stockroom::where('name', $customer->stockroom)->first();
        $customerProducts = Product::where('stockroom', $customer->stockroom)->get();

        return view('operation.receive', compact('customer', 'stockroom', 'customerProducts', 'customerId'));

    }
    

    public function receivePerItem($receiveId)
    {
        $receive = Receive::findOrFail($receiveId);

        $request->validate([
            'attachments' => 'required',
            'doc_ref' => 'required',
            'product_name' => 'required',
            'product_qty' => 'required|numeric',
        ]);

        try {
            
            $receivePerItem = new ReceivePerItem();
            $receive->attachments = $request->input('attachments');
            $receive->doc_ref = $request->input('doc_ref');
            $receivePerItem->product_name = $request->input('product_name');
            $receivePerItem->product_qty = $request->input('product_qty');
            $receivePerItem->product_uom = $request->input('product_uom');
            $receivePerItem->stockroom = $receive->stockroom_name;
            $receivePerItem->receive_id = $receive->id;
            $receivePerItem->save();

            return redirect()->route('operation.receive')->with('success', 'Data has been saved successfully.');

        } catch (\Exception $e) {
            return back()->with('error', 'Error occurred while receiving. Please try again.');
        }
    }

}
