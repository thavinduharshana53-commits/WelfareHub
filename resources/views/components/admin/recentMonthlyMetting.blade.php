@props(['title', 'date', 'time', 'location', 'agenda'])

<div class="px-5 py-5 transition border-b border-slate-100 last:border-0 hover:bg-slate-50">

    {{-- Meeting Title --}}
    <div class="flex items-start justify-between">
        <h3 class="text-base font-semibold text-slate-900">
            {{ $title }}
        </h3>

        <span class="w-2 h-2 mt-2 rounded-full bg-violet-500"></span>
    </div>

    {{-- Date & Time --}}
    <div class="flex items-center gap-2 mt-3 text-sm text-slate-500">
        <span>{{ $date }}</span>
        <span class="text-slate-300">•</span>
        <span>{{ $time }}</span>
    </div>

    {{-- Location --}}
    <p class="mt-3 text-sm text-slate-500">
        {{ $location }}
    </p>

    {{-- Agenda --}}
    <p class="mt-3 text-sm leading-6 text-slate-500">
        <span class="font-medium text-slate-600">Agenda:</span>
        {{ $agenda }}
    </p>

</div>