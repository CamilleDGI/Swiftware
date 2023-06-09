@extends('layouts.layouts1')

@section('operation')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0">
    <div class="content">
        <div class="title m-b-md text-center">
            Transaction List
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
                        <tr>
                            <td class="border border-slate-300 ...">{{ $customer->stockroom }}</td>
                            <td class="border border-slate-300 ...">{{ $customer->name }}</td>
                            <td class="border border-slate-300 ...">{{ $customer->with_inventory }}</td>
                            <td class="border border-slate-300 ...">{{ $customer->end }}</td>
                            <td class="border border-slate-300 ...">
                            </td>
                        </tr>

                    <!-- <tr>
                        <td colspan="5" class="text-center">No Data Found</td>
                    </tr> -->
                </tbody>
            </table>
  
        </div>
    </div>
</div>

@endsection



