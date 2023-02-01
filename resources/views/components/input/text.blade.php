@props([
    'leadingAddOn' => false,
    'disable' => false,
    'small' => false,
])

<div class="flex rounded-md shadow-sm">
    @if ($leadingAddOn)
        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
            {{ $leadingAddOn }}
        </span>
    @endif
    <input {{ $disable ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'flex-1 block w-full p-2 border border-gray-300 rounded-md text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-0 focus:border-gray-600 sm:text-sm' . ($small ? ' lg:text-xs' : '')]) }}/>
</div>
