@extends('layouts.admin')

@section('content')

    <div class="flex gap-60 bg-[#FFFFFF] p-5 rounded-xl shadow-lg">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Fee Records</h1>
            <p class="text-[#617069] mt-2"> View and record member fee payments.</p>
        </div>

        <div>
            <x-button onclick="feeModal.showModal()">+ Record payment</x-button>
        </div>
    </div>

    <div class="mt-8 bg-white border border-gray-200 shadow-sm rounded-2xl">
        <table class="w-full text-sm text-center ">
            <thead class="text-base text-gray-500 bg-gray-50"> 
                <tr>
                    <th class="px-6 py-5 text-gray-700">MEMBER</th>
                    <th class="px-6 py-5 text-gray-700">MONTH</th>
                    <th class="px-6 py-5 text-gray-700">AMOUNT</th>
                    <th class="px-6 py-5 text-gray-700">PAID DATE</th>
                    <th class="px-6 py-5 text-gray-700">METHOD</th>
                </tr>
            </thead>
            <tbody class="text-base">
                @forelse ($fees as $fee )
                    <tr class=" hover:bg-gray-50">
                        <td class="p-4 mb-5 text-gray-700">{{ $fee->memberName }}</td>
                        <td class="text-gray-700">{{ $fee->month }}</td>
                        <td class="text-gray-700">{{ $fee->amount }}</td>
                        <td class="text-gray-700">{{ $fee->created_at->format('M d, Y') }}</td>
                        @if ( $fee->method == 'cash')
                        <td><span class="p-2 text-amber-600 rounded-xl bg-amber-100">Cash</span></td>
                        @elseif ($fee->method == 'transfer')
                        <td><span class="p-2 text-blue-700 bg-blue-100 rounded-xl">Bank Transfer</span></td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-4 text-center text-gray-500">
                            No payment records yet.
                        </td>
                    </tr>
                @endforelse
                
            </tbody>
        </table>
        @include('admin.feesModal.recordFee')
    </div>
    <div class="mt-6">{{ $fees->links() }}</div>
@endsection