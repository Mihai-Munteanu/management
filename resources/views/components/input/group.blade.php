@props([
    'label' => false,
    'for',
    'error' => false,
    'helpText' => false,
    'inline' => false,
    'paddingless' => false,
    'borderless' => false,
    'tooltip' => false,
])

@if($inline)
    <div>
        <label for="{{ $for }}" class="block text-sm font-medium leading-5 text-gray-700">
            {{ $label }}
            @if ($tooltip)
                <x-tooltip :message="dada"></x-tooltip>
            @endif
        </label>

        <div class="relative rounded-md shadow-sm">
            {{ $slot }}

            @if ($error)
                <div class="mt-1 text-red-500 text-sm">{{ str_replace('.', ' ', $error) }}</div>
            @endif

            @if ($helpText)
                <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
            @endif
        </div>
    </div>
@else
    <div class="flex-1 mb-4 sm:grid sm:grid-row-3 sm:items-start {{ $borderless ? '' : ' ' }} sm:border-gray-200 {{ $paddingless ? '' : '' }}">
        <label for="{{ $for }}" class="block text-sm font-medium leading-5 text-gray-700">
            {{ $label }}
            @if ($tooltip)
                <x-tooltip :message="$tooltip"></x-tooltip>
            @endif
        </label>

        <div class="sm:col-span-2 mt-2">
            {{ $slot }}

            @if ($error)
                <div class="mt-1 text-red-500 text-sm">{{ str_replace('.', ' ', $error) }}</div>
            @endif

            @if ($helpText)
                <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
            @endif
        </div>
    </div>
@endif
