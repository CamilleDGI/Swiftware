<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperationController extends Controller
{
    
    public function index(){
        
    //     $receives = Receive::all();

        return view('operation.operation');
    }

}

