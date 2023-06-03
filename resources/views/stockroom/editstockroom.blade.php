@extends('layouts.layouts')

@section('content')
<div class="relative flex items-top justify-center full-height">
    <div class="content">
        <div class="title m-b-md">
            Edit Stockroom Data
        </div>
        <br>
        <div>
            <form action="/admin/stockrooms/{{ $stockroom->id }}" method="POST">
                @csrf
                @method('PUT')

                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stockroom Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $stockroom->name) }}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <label for="capacity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity:</label>
                <input type="number" id="capacity" name="capacity" value="{{ old('capacity', $stockroom->capacity) }}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <label for="unit_of_measurement" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit of Measurement:</label>
                <select id="unit_of_measurement" name="unit_of_measurement" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Select a Unit of Measurement</option>
                    <option value="sqm" {{ (old('unit_of_measurement', $stockroom->unit_of_measurement) === 'sqm') ? 'selected' : '' }}>SQM</option>
                    <option value="pcs" {{ (old('unit_of_measurement', $stockroom->unit_of_measurement) === 'pcs') ? 'selected' : '' }}>PCS</option>
                    <option value="box" {{ (old('unit_of_measurement', $stockroom->unit_of_measurement) === 'box') ? 'selected' : '' }}>BOX</option>
                </select>
                <br>
                <label for="note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notes:</label>
                <textarea id="note" rows="4" value="{{ old('notes', $stockroom->notes) }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Stockroom notes and/or other instruction..."></textarea>
 
                <br>
                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                    <input type="checkbox" value="1" name="is_active" {{ old('is_active', $stockroom->is_active) ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Activate</span>
                </label>
               <br>
                <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Update Stockroom</button>
            </form>
            <br>
        </div>
    </div>
</div>

@endsection