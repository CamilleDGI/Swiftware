<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Stockroom;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        
        $products = Product::all();

        return view('product.products', ['products' => $products]);
    }

    public function addProduct($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $stockroom = Stockroom::where('name', $customer->stockroom)->first(); 

        return view('product.addproduct', compact('customer', 'stockroom'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $customerId = request('customer_id');
        $customer = Customer::findOrFail($customerId);
        $stockroom = Stockroom::where('name', $customer->stockroom)->first();

        $product = new Product();
        $product->name = request('name');
        $product->stockroom = $customer->stockroom;
        $product->unit_of_measurement = $stockroom->unit_of_measurement;
        $product->is_active = request()->has('is_active');
        
        $product->save();

        return redirect()->route('product.products')->with('success', 'Product added successfully.');
    }




}
