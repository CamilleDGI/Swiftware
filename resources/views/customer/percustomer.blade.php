@extends('layouts.layouts')

@section('content')

<div class="flex items-center space-x-4">
    <div class="flex-shrink-0">
        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="" alt="avatar"/>
    </div>
    <div>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $customer->name }}</h2>
    </div>

    <div class="flow-root">
        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
            <li class="py-3 sm:py-4">
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">{{$customer->stockroom}}</p>
                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">Stockroom:</p>
                </div>

                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">{{$customer->start}} to {{$customer->end}}</p>
                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">Contract Period:</p>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">{{$customer->used_access}}</p>
                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">Customer User Access:</p>
                </div>

                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">{{$customer->doc_req}}</p>
                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">Required Documents:</p>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">{{$customer->remarks}}</p>
                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">Notes:</p>
                </div>

                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">{{$customer->is_active}}</p>
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">{{$customer->with_inventory}}</p>
                </div>
            </li>
        </ul>
    </div>
</div>


            <div class="flex mt-4 space-x-3 md:mt-6">
                <a href="/admin/customers/{{ $customer->id}}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</a>
                <a href="/admin/customers" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Return to List</a>
                @if ($customer->with_inventory === 'With Inventory')
                    <a href="{{ route('addproduct', ['customer_id' => $customer->id]) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Add Product</a>
                @endif
            </div>

@endsection



