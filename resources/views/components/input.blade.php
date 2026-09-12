@props(['disabled' => false, 'value' => ''])

<input {{ $disabled ? 'disabled' : '' }} {{ $value }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 mb-3 w-full rounded-md shadow-sm']) !!}>
