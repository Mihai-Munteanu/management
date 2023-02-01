<div class="inline-flex">
    <button {{ $attributes->merge
        ([
            'type'=>'button',
            'class' => '
            w-auto align-middle rounded-md shadow-md m-1 h-full text-white font-semibold focus:outline-none text-xs px-2 py-2 text-gray-700 bg-gray-400  h-fit hover:bg-red-400 hover:text-white'
        ])
    }}>

        <div class="w-full flex items-center">
            <div class="pr-4 flex items-center">
                <div class="">
                    <i class="text-red-300 fa-lg far fa-times-circle"></i>
                </div>
            </div>
            {{ $slot }}
        </div>
    </button>
</div>
