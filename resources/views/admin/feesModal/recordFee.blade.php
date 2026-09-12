<dialog id=feeModal class="w-full max-w-md rounded-lg shadow-xl backdrop:bg-black/40">
    <div class="flex justify-between px-6 py-4 border-b border-slate-200">

        <div>
            <h1 class="text-2xl font-bold text-slate-900">
                Record Fee Payment
            </h1>

            <p class="mt-2 text-sm text-slate-500">
               Fill in the details below to record a fee payment.
            </p>
        </div>

        <div>
            <button
               onclick="feeModal.close()">
                <svg width="24px" height="24px" viewBox="-9.92 -9.92 51.84 51.84" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"><rect x="-9.92" y="-9.92" width="51.84" height="51.84" rx="25.92" fill="#deddda" strokewidth="0"></rect></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#241f31;stroke-linecap:round;stroke-linejoin:round;stroke-width:2.56;}</style> </defs> <title></title> <g id="cross"> <line class="cls-1" x1="7" x2="25" y1="7" y2="25"></line> <line class="cls-1" x1="7" x2="25" y1="25" y2="7"></line> </g> </g></svg>
            </button>
        </div>
    </div>

    <form method="POST" action="{{ route('feeRecords.store') }}" class="p-6">
        @csrf
        <div>
            <x-label>Member Name</x-label>
            <select  value=""  name="memberName" class="w-full mb-3 border-gray-300 rounded-md shadow-sm text-slate-600 invalid:text-gray-400 placeholder focus:border-indigo-500 focus:ring-indigo-500">
                <option value="" selected disabled>Select registered member</option>
                @foreach ( $members as $member)
                     <option>{{ $member->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <x-label>Month</x-label>
            <select name="month" required class="w-full mb-3 border-gray-300 rounded-md shadow-sm text-slate-600 focus:border-indigo-500 focus:ring-indigo-500">
                <option value="" selected disabled>Select month</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>
        </div>

        <div>
            <x-label>Amount</x-label>
            <x-input placeholder="Enter the fee" name="amount" required></x-input>
        </div>
       
        <div>
            <x-label>Payment Method</x-label>
            <select name="method" class="w-full mb-3 border-gray-300 rounded-md shadow-sm text-slate-600 focus:border-indigo-500 focus:ring-indigo-500">
                <option value=" " selected disabled>Select method</option>
                <option value="cash">Cash</option>
                <option value="transfer">Bank Transfer</option>
                <option value="not_yet">Not yet</option>
            </select>
        </div>

        <div class="flex items-center justify-end gap-3 pt-6 mt-8 border-t border-slate-200">
            <button
               onclick="feeModal.close()"
                class="px-6 py-3 text-sm font-semibold transition duration-200 bg-white border rounded-lg cursor-pointer border-slate-300 text-slate-700 hover:bg-slate-50">CANCEL
            </button>
            <x-button>
                Record Payment
            </x-button>
        </div>  
    </form>
</dialog>