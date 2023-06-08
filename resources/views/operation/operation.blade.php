@extends('layouts.layouts1')

@section('operation')
<div class="relative flex items-top text-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="content">
        <div class="title m-b-md">
            Warehouse
        </div>
        <div class="row">
            @foreach($stockrooms as $stockroom)
            <div class="col mb-5">
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col items-center pb-10 pt-10 p-3">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="" alt="avatar"/>
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $stockroom->name }}</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $stockroom->is_active }}</span>
                        <div class="flex mt-4 space-x-3 md:mt-6">
                            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">More info</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>




@endsection



