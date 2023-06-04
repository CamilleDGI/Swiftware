@extends('layouts.layouts')

@section('content')
<div class="content d-flex justify-content-center pb-10 pt-10">
    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col items-center pb-10 pt-10">
            <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="" alt="avatar"/>
            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $customer->name }}</h5>
            <span class="text-sm text-gray-500 dark:text-gray-400">{{$customer->stockroom}}</span>
            <span class="text-sm text-gray-500 dark:text-gray-400">{{$customer->start}} to {{$customer->end}}</span>
            <span class="text-sm text-gray-500 dark:text-gray-400">{{$customer->used_access}}</span>
            <span class="text-sm text-gray-500 dark:text-gray-400">{{$customer->doc_req}}</span>
            <span class="text-sm text-gray-500 dark:text-gray-400">{{$customer->remarks}}</span>
            <span class="text-sm text-gray-500 dark:text-gray-400">{{$customer->used_access}}</span>
            <span class="text-sm text-gray-500 dark:text-gray-400">{{$customer->is_active}}</span>
            <span class="text-sm text-gray-500 dark:text-gray-400">{{$customer->with_inventory}}</span>
            <div class="flex mt-4 space-x-3 md:mt-6">
                <a href="/admin/customers/{{ $customer->id}}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</a>
                <a href="/admin/customers" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Return to List</a>
                @if ($customer->with_inventory === 'With Inventory')
                    <a href="{{ route('addproduct', ['customer_id' => $customer->id]) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Add Product</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection



