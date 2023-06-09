@extends('layouts.layouts1')

@section('operation')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0">
    <div class="content">
        <div class="title m-b-md text-center">
            Stockroom List
        </div>
        <br>
        <div class="row">
           
            <table class="border-collapse border border-slate-400 ...">
                <thead>
                    <tr>
                    <th class="border border-slate-300 ...">Stockroom</th>
                    <th class="border border-slate-300 ...">Customer Name</th>
                    <th class="border border-slate-300 ...">Inventory Arrangement</th>
                    <th class="border border-slate-300 ...">Contract Ends By</th>
                    <th class="border border-slate-300 ...">Transaction</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($customers) > 0)
                    @foreach($customers as $customer)
                        @if ($customer->is_active === 'Active')
                        <tr>
                            <td class="border border-slate-300 ...">{{ $customer->stockroom }}</td>
                            <td class="border border-slate-300 ...">{{ $customer->name }}</td>
                            <td class="border border-slate-300 ...">{{ $customer->with_inventory }}</td>
                            <td class="border border-slate-300 ...">{{ $customer->end }}</td>
                            <td class="border border-slate-300 ...">
                            <form action="{{ route('operation.show', ['customer_id' => $customerId]) }}" method="POST">
                                @csrf
                                <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Receiving</button>
                            </form>
                                <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Releasing</button>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">No Data Found</td>
                    </tr>
                @endif
                </tbody>
            </table>
  
        </div>
    </div>
</div>

@endsection



