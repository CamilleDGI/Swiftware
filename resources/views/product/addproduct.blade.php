@extends('layouts.layouts')

@section('content')

<div class="relative flex items-top justify-center full-height">
    <div class="content">
        <div class="title m-b-md pt-5 text-center">
                    Add New Product
        </div>
        <br>
        <form action="{{ route('customer.details', ['customer_id' => $customer->id]) }}" method="POST">
        @csrf
            <div class="row">
                <div class="col">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company:</label>
                    <input type="text" name="customer_name" value="{{ $customer->name }}" readonly>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stockroom:</label>
                    <input type="text" name="stockroom" value="{{ $stockroom->name ?? '' }}" readonly>
                </div>

                <div class="col">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name:</label>
                    <input type="text" id="name" name='name' class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <label for="unit_of_measurement" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit of Measurement</label>
                    <input type="text" name="unit_of_measurement" value="{{ $stockroom->unit_of_measurement ?? '' }}" readonly>
                </div>
            </div>
            <div class="row">
                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                        <input type="checkbox" value="" name='is_active' class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Activate</span>
                </label>
                <br>
                <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add New Product</button>
                <br>
            </div>
        </form>
    </div>
</div>





@endsection