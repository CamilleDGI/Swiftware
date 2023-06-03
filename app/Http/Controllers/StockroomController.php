<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stockroom;

class StockroomController extends Controller
{
    public function index(){
        
        $stockrooms = Stockroom::all();

        return view('stockroom.stockrooms', ['stockrooms' => $stockrooms]);
    }

    public function show($id){

        $stockroom = Stockroom::findOrFail($id);

        return view('stockroom.perstockroom', ['stockroom'=> $stockroom]);
    }

    public function create(){
        return view('stockroom.create');
    }

    public function store() {

        $stockroom = new Stockroom();


            $stockroom-> name = request('name');
            $stockroom-> capacity = request('capacity');
            $stockroom-> unit_of_measurement = request('unit_of_measurement');
            $stockroom-> is_active = request()->has('is_active');

            $stockroom-> save();

        return redirect('/admin/stockrooms');
    }

    public function edit($stockroom_number){
        $stockroom = Stockroom::find($stockroom_number);
        return view('stockroom.edit', compact('stockroom'));
    }


}
