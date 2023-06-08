<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Stockroom;
use App\Models\Product;

class CustomerController extends Controller
{
    public function index(){
        
        $customers = Customer::latest()->paginate(5);

        return view('customer.customers', compact('customers'))->with('i',(request()->input('page',1)-1)*5);
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
    

    // public function store() {

    //     $customer = new Customer();


    //         $customer-> name = request('name');
    //         $customer-> stockroom = request('stockroom');
    //         $customer-> start = request('start');
    //         $customer-> end = request('end');
    //         $customer-> used_access = request('used_access');
    //         $customer-> doc_req = request('doc_req');
    //         $customer-> remarks = request('remakrs');
    //         $customer-> logo = request('logo');
    //         $customer-> is_active = request()->has('is_active');
    //         $customer-> with_inventory = request()->has('with_inventory');


    //         $customer->save();

    //         $stockroom = Stockroom::where('name', $customer->stockroom)->first();
    //         $stockroom->is_occupied = true;
    //         $stockroom->save();


    //     return redirect('/admin/customers');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|max:2048',
            'name' => 'required',
            'stockroom' => 'required',
            'start' => 'required',
            'end' => 'required',
            'used_access' => 'required',
            'doc_req' => 'required',
            'remarks' => 'required',
            
        ]);

        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoFileName = time() . '_' . $logoFile->getClientOriginalName();
            $logoFile->storeAs('public/logos', $logoFileName);
            $customer->logo = $logoFileName;
        }
        

        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->stockroom = $request->input('stockroom');
        $customer->start = $request->input('start');
        $customer->end = $request->input('end');
        $customer->used_access = $request->input('used_access');
        $customer->doc_req = $request->input('doc_req');
        $customer->remarks = $request->input('remarks');
        $customer->is_active = $request->has('is_active');
        $customer->with_inventory = $request->has('with_inventory');

        $customer->save();

        $stockroom = Stockroom::where('name', $customer->stockroom)->first();
        $stockroom->is_occupied = true;
        $stockroom->save();

        return redirect()->route('admin.customers')->with('success','Customer has been added successfully.');
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

        $request->validate([
            'name' => 'required',
            'stockroom' => 'required',
            'start' => 'required',
            'end' => 'required',
            'used_access' => 'required',
            'doc_req' => 'required',
            'remarks' => 'required',
            'logo' => 'nullable|max:2048',
            'is_active' => 'boolean',
            'with_inventory' => 'boolean',
        ]);
        

        $customer->update([
            'name' => $request->input('name'),
            'stockroom' => $request->input('stockroom'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
            'used_access' => $request->input('used_access'),
            'doc_req' => $request->input('doc_req'),
            'remarks' => $request->input('remarks'),
            'is_active' => $request->has('is_active'),
            'with_inventory' => $request->has('with_inventory'), // Update the value based on the checkbox
        ]);

        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoFileName = time() . '_' . $logoFile->getClientOriginalName();
            $logoFile->storeAs('public/logos', $logoFileName);
            $customer->logo = $logoFileName;
        }

       $customer->save();

       return redirect()->route('admin.customers.{customer_id}')->with('success','Customer information has been updated.');
    }

    public function perCustomer($customerId)
    {
        $customer = Customer::with('products')->find($customerId);

        return view('customer.percustomer', [
            'customer' => $customer,
        ]);
    }





    




}
