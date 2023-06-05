@extends('layouts.layouts1')

@section('operation')
<div>
    <div class="content">
        <div class="title m-b-md pt-5 text-center">
            Receive Items
        </div>
        <br>
        <div class="row">
            <form action="/operation/receive" method="POST">
            @csrf
            <table class="border-collapse border border-slate-400 ...">
                <thead>
                    <tr>
                        <th class="border border-slate-300 ...">Product Name:</th>
                        <th class="border border-slate-300 ...">Quantity</th>
                        <th class="border border-slate-300 ...">Receiving Documents</th>
                        <th class="border border-slate-300 ...">Upload File</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-slate-300 ...">
                            <div class="w-1/4 px-2">
                                <label for="unit_of_measurement" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name:</label>
                                <select id="unit_of_measurement" name="unit_of_measurement" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Product</option>
                                    <option value="b-001">Deomax</option>
                                    <option value="b-003">Baseoil</option>
                                    <option value="b-004">Additives</option>
                                </select>
                            </div>
                        </td>
                        <td class="border border-slate-300 ...">
                            <input type="number" id="qty" name="qty" class="w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </td>
                        <td class="border border-slate-300 ...">
                            <textarea id="message" rows="4" class="w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Delivery Receipt/Transmittal Form..."></textarea>
                        </td>
                        <td class="border border-slate-300 ...">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </td>
                    </tr>
                </tbody>
            </table>
            </form>
            <br>
                <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 mr-1 mb-5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Add</button>
                <br>
                <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Receiving Complete</button>

        <br>
        </div>
    </div>
</div>

@endsection