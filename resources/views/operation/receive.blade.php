@extends('layouts.layouts1')

@section('operation')
<div class='container'>
    <div class="content">
        <div class="title m-b-md pt-5 text-center">
            Receive Items
        </div>
        <br>
        <form action="/operation/transaction" method="POST">
            @csrf

            <div class="row border rounded">
            <div class="row">
                <div class="col">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company:</label>
                    <input type="text" name="customer_name" value="{{ $customer->name }}">
                </div>
                <div class="col">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stockroom:</label>
                    <input type="text" name="stockroom" value="{{ $stockroom->name ?? '' }}">
                </div>
                <div class="col">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Documentation Requirements:</label>
                    <input type="text" name="stockroom" value="{{ $customer->doc_req ?? '' }}">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                </div>
                <div class="col">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Receiving Document/s:</label>
                    <textarea id="attachments" rows="4" name="attachments" class="block p-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Delivery Receipt/Transmittal Form..."></textarea>
                </div>
            </div>
        </div>



        <div class="row">
            
            @if ($customer->with_inventory === 'With Inventory')
            <table class="border-collapse border border-slate-400 ...">
                <thead>
                    <tr>
                        <th class="border border-slate-300 ...">Product Name:</th>
                        <th class="border border-slate-300 ...">Quantity</th>
                        <th class="border border-slate-300 ...">Unit of Measurement</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-slate-300 ...">
                            <div class="w-1/4 px-2">
                                <label for="product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stockroom</label>
                                    <select id="product" name='product' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Select Product</option>
                                        @foreach($customerProducts as $product)
                                            <option value="{{ $product->name }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </td>
                        <td class="border border-slate-300 ...">
                            <input type="number" id="qty" name="qty" class="w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </td>
                        <td class="border border-slate-300 ...">
                            <input type="text" name="unit_of_measurement" value="{{ $stockroom->unit_of_measurement ?? '' }}" readonly>
                        </td>
                    </tr>
                </tbody>
            </table>
            @else
            <table class="border-collapse border border-slate-400 ...">
                <thead>
                    <tr>
                        <th class="border border-slate-300 ...">Quantity</th>
                        <th class="border border-slate-300 ...">Unit of Measurement</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-slate-300 ...">
                            <input type="number" id="qty" name="qty" class="w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </td>
                        <td class="border border-slate-300 ...">
                            <input type="text" name="unit_of_measurement" value="{{ $stockroom->unit_of_measurement ?? '' }}" readonly>
                        </td>
                    </tr>
                </tbody>
            </table>
            @endif
            </form>
            <br>
            @if ($customer->with_inventory === 'With Inventory')
                <button type="button" id='addFieldsButton' class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-2 mr-1 mb-5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Add</button>
            @endif
                <br>
            <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Receiving Complete</button>

            <br>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addFieldsButton = document.getElementById('addFieldsButton');
        const container = document.querySelector('tbody');
        let fieldIndex = 1;

        addFieldsButton.addEventListener('click', function () {
            const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td class="border border-slate-300 ...">
                        <div class="w-1/4 px-2">
                            <label for="product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stockroom</label>
                            <select id="product${fieldIndex}" name='product${fieldIndex}' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Select Product</option>
                                @foreach($customerProducts as $product)
                                    <option value="{{ $product->name }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td class="border border-slate-300 ...">
                        <input type="number" id="qty${fieldIndex}" name="qty${fieldIndex}" class="w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </td>
                    <td class="border border-slate-300 ...">
                        <input type="text" name="unit_of_measurement${fieldIndex}" value="{{ $stockroom->unit_of_measurement ?? '' }}" readonly>
                    </td>
                    <td class="border border-slate-300 ...">
                        <button type="button" class="text-red-600 hover:text-red-800 focus:outline-none" onclick="removeRow(this)">Remove</button>
                    </td>
                `;
            container.appendChild(newRow);
            fieldIndex++;
        });
    });
    function removeRow(button) {
        const row = button.parentNode.parentNode;
        row.remove();
    }

</script>

@endsection