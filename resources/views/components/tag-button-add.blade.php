@props([
    'ifSelected' => null,
])

<div class="inline-flex">
    <button {{ $attributes->merge
        ([
            'type'=>'button',
            'class' => '
            w-auto align-middle rounded-md shadow-md h-fit text-white font-semibold focus:outline-none text-xs px-2 py-1 m-1'  . ($ifSelected ? 'text-white bg-blue-500 hover:bg-red-400' : 'text-gray-700 bg-gray-400 hover:bg-blue-500 hover:text-white')
        ])
    }}>
    
        <div class="w-full flex items-center">
            <div class="pr-4 flex items-center">
                @if($ifSelected)
                    <div class="">
                        <i class="text-white fas fa-check-circle fa-lg"></i>
                    </div>
                @else
                    <div class="">
                        <i class="text-white fas fa-light fa-circle fa-lg"></i>
                    </div>
                @endif
            </div>
            {{ $slot }}
        </div>
    </button>
</div>
