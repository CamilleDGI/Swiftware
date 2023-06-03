<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperationController extends Controller
{
    
    public function create(){
        return view('operation.receive');
    }

}

