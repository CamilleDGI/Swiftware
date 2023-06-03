@extends('layouts.layouts1')

@section('operation')
<div class="relative flex items-top justify-center full-height">
    <div class="content">
        <div class="title m-b-md pt-5">
            Receive Items
        </div>
        <br>
        <div>
            <form action="/operation/receive" method="POST">
                @csrf
                <div class="flex flex-wrap -mx-2">
                <div class="flex flex-wrap">
                <div class="w-1/4 px-2">
                    <label for="unit_of_measurement" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name:</label>
                    <select id="unit_of_measurement" name="unit_of_measurement" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Product</option>
                    <option value="b-001">Deomax</option>
                    <option value="b-003">Baseoil</option>
                    <option value="b-004">Additives</option>
                    </select>
                </div>
                <div class="w-1/4 px-2">
                    <label for="qty" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity:</label>
                    <input type="number" id="qty" name="qty" class="w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="w-1/2 px-2">
                    <label for="message" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Document/s Received:</label>
                    <textarea id="message" rows="4" class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Delivery Receipt/Transmittal Form..."></textarea>
                </div>
                <div class="w-1/2 px-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
                <div>
                    <input class="inset-0 w-full h-full opacity-0 cursor-pointer" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                    <div class="flex items-center justify-center w-full h-full text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    </div>


                <br>
                <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 mr-1 mb-5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Add</button>
                <br>
                <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Receiving Complete</button>
            </form>
            <br>
        </div>
    </div>
</div>

@endsection