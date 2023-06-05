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

        return view('customer.percustomer', compact('customer'));
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


            $customer->save();

            $stockroom = Stockroom::where('name', $customer->stockroom)->first();
            $stockroom->is_occupied = true;
            $stockroom->save();


        return redirect('/admin/customers');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        $activeStockrooms = Stockroom::where('is_active', true)->get();
        
        return view('customer.editcustomer', compact('customer', 'activeStockrooms'));
    }

    public function update(Request $request, $customer_number)
    {
        $customer = Customer::find($customer_number);

        // Update the customer attributes with the submitted form data
        $customer->update([
            'name' => $request->input('name'),
            'stockroom' => $request->input('stockroom'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
            'used_access' => $request->input('used_access'),
            'doc_req' => $request->input('doc_req'),
            'remarks' => $request->input('remarks'),
            'logo' => $request->input('logo'),
            'is_active' => $request->has('is_active'),
            'with_inventory' => $request->has('with_inventory'), // Update the value based on the checkbox
        ]);

        $usedAccess = request('used_access');
        $customer->used_access = isset($usedAccess) ? $usedAccess : $customer->used_access;
        

        // Save the updated customer record
        $customer->save();

        // Redirect to the stockroom details page or any other appropriate page
        return redirect('/admin/customers/' . $customer->id);
    }

    // public function perCustomer($customerId)
    // {
    //     $customer = Customer::find($customerId);
    //     $products = Product::where('customer_id', $customerId)->get();

    //     return view('customer.percustomer', [
    //         'customer' => $customer,
    //         'products' => $products
    //     ]);
    // }


}
