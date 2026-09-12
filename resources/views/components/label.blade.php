@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-s mb-1 text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
