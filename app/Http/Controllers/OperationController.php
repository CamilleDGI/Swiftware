<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stockroom;

class OperationController extends Controller
{
    
    public function index(){
        
        $stockrooms = Stockroom::all();

        return view('operation.operation', compact('stockrooms'));

    }

}

