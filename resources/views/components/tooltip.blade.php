@props([
    'message' => ''
])

<div class="relative z-150 inline-flex">
    <div class="tooltip w-full max-w-64">
        {{ $slot }}
        @if($message)
            <div class="tooltip-text w-max bg-yellow-300 text-gray-700 -ml-20 -mt-12 rounded shadow-lg">
                {{ $message }}
            </div>
        @endif
    </div>
</div>
