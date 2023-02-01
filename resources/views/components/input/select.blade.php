@props([
    'placeholder' => null,
    'trailingAddOn' => null,
])

<div class="flex w-full space-x-2">
    <select {{ $attributes->merge(['class' => 'w-full form-control rounded-md border border-gray-300 shadow-sm px-2 bg-white text-sm font-medium text-gray-500 focus:outline-none focus:ring-0 focus:border-gray-600' . ($trailingAddOn ? ' rounded-r-none' : '')]) }}>
        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif

        {{ $slot }}
    </select>

    @if ($trailingAddOn)
        {{ $trailingAddOn }}
    @endif
</div>
