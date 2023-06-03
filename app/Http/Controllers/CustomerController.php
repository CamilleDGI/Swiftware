<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){
        
        $customers = [
            ['customer_id' => '1', 'name' => 'ABC COMPANY', 'stockroom' => 'B-001', 'start_date' => 'June 30, 2022', 'exp_date' => 'June 30, 2023', 'status' => 'Active', 'with_inventory' => 'Yes'],
            ['customer_id' => '2', 'name' => 'XYZ COMPANY', 'stockroom' => 'B-003', 'start_date' => 'December 30, 2021', 'exp_date' => 'December 30, 2023', 'status' => 'Active', 'with_inventory' => 'No'],
            ['customer_id' => '3', 'name' => '123 COMPANY', 'stockroom' => 'B-004', 'start_date' => 'June 30, 2020', 'exp_date' => 'June 30, 2022', 'status' => 'Inactive', 'with_inventory' => 'Yes']
        ];

        //$customers = Customer::all();

        return view('customer.customers', ['customers' => $customers]);
    }

    public function show($customer_id){
        return view('customer', ['customer_id' => $customer_id]);
    }

    public function create(){
        return view('customer.enroll');
    }
}
