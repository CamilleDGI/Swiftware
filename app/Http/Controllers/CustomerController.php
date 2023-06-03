<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Stockroom;

class CustomerController extends Controller
{
    public function index(){
        
        $customers = Customer::all();

        return view('customer.customers', ['customers' => $customers]);
    }

    public function show($id){

        $customer = Customer::findOrFail($id);

        return view('customer.percustomer', ['customer'=> $customer]);
    }

    public function create()
    {
        $activeStockrooms = Stockroom::where('is_active', true)->get();
        $occupiedStockrooms = Stockroom::where('is_occupied', true)->get();
    
        return view('customer.enroll', compact('activeStockrooms', 'occupiedStockrooms'));
    }
    

    public function store() {

        $customer = new Customer();


            $customer-> name = request('name');
            $customer-> stockroom = request('stockroom');
            $customer-> start = request('start');
            $customer-> end = request('end');
            $customer-> used_access = request('used_access');
            $customer-> doc_req = request('doc_req');
            $customer-> remarks = request('remakrs');
            $customer-> logo = request('logo');
            $customer-> is_active = request()->has('is_active');
            $customer-> with_inventory = request()->has('with_inventory');

            $customer-> save();

            $stockroom = Stockroom::find($customer->stockroom);
            $stockroom->is_occupied = true;
            $stockroom->save();

        return redirect('/admin/customers');
    }


}
