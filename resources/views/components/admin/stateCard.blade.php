@props(['title', 'value', 'txtColor'])

<div class="w-full h-full 
            flex flex-col justify-center
            px-6 py-6
            bg-white border mt-3 border-slate-200
            rounded-2xl
            shadow-[0_6px_16px_rgba(15,23,42,0.10)]">

    <p class="text-lg font-medium text-slate-500">
        {{ $title }}
    </p>

    <h2 class="mt-1 text-3xl font-bold whitespace-nowrap {{ $txtColor }}">
       {{   $value  }}
    </h2>

</div>