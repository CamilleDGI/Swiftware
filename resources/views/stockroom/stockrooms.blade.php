@extends('layouts.layouts')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="content">
        <div class="title m-b-md">
            Stockroom List
        </div>
        <div>
            <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><a href="stockrooms/create">Add New Stockroom</a></button>
        </div>
        <br>
        <div class="row">
            @foreach($stockrooms as $stockroom)
            <div class="col mb-5">
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col items-center pb-10 pt-10 p-3">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="" alt="avatar"/>
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $stockroom->name }}</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $stockroom->is_active }}</span>
                        <div class="flex mt-4 space-x-3 md:mt-6">
                            <a href="/admin/stockrooms/{{ $stockroom->id}}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">More info</a>
                            <a href="/admin/stockrooms/{{ $stockroom->id}}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Update</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection



