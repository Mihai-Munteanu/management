@props([
    'bgColor' => 'bg-blue-200',
    'isDisabled' => false
])

<span class="inline-flex rounded-md shadow-sm">
    <a
        {{ $isDisabled ? 'disabled' : null }}
        {{ $attributes->merge([
            'type' => 'button',
            'class' => "text-gray-600 py-2 px-4 border rounded-md text-sm leading-5 font-medium
            hover:border hover:border-blue-400 hover:bg-white
            focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition duration-150 ease-in-out " . $bgColor . ' ' . ($attributes->get('disabled') ? ' opacity-75 cursor-not-allowed' : ''),
        ]) }}
    >
        {{ $slot }}
    </a>
</span>
