<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        
        $products = [
            ['product_id' => '1', 'product_name' => 'Deomax', 'company_name' => 'ABC Company', 'quantity' => '0', 'measurement' => 'pcs', 'status' => 'Active'],
            ['product_id' => '2', 'product_name' => 'Baseoil', 'company_name' => 'ABC Company', 'quantity' => '0', 'measurement' => 'pcs', 'status' => 'Active'],
            ['product_id' => '3', 'product_name' => 'Additives', 'company_name' => 'XYZ Company', 'quantity' => '0', 'measurement' => 'pcs', 'status' => 'Active'],
        ];

        //$customers = Customer::all();

        return view('product.products', ['products' => $products]);
    }

    public function create(){
        return view('product.addproduct');
    }
}
