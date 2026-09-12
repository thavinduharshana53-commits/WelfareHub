@props(['name', 'payment', 'method'])

<div class="grid grid-cols-[1fr_auto_1fr] items-center gap-4 px-5 py-4 border-b border-slate-200 last:border-b-0">

    <div class="text-lg font-semibold truncate text-slate-900">
        {{ $name }}
    </div>

    <div class="text-base text-center whitespace-nowrap text-slate-900">
        LKR {{ number_format($payment, 2) }}
    </div>

    <div class="flex justify-end">
        <span class="inline-flex min-w-[100px] justify-center rounded-full px-4 py-2 font-semibold
            {{ $method === 'transfer'
                ? 'bg-blue-100 text-blue-700'
                : 'bg-yellow-100 text-yellow-700' }}">

            {{ $method === 'transfer' ? 'Bank Transfer' : 'Cash' }}
        </span>
    </div>

</div>