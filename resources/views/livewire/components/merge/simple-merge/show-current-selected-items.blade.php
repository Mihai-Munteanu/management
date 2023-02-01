<div class="w-full md:col-span-1 lg:col-span-12 mt-5">
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-autos sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="w-full overflow-hiddens">
                    <div class="grid grid-cols-12 bg-gray-100">
                        <div class="col-span-12 w-full px-6 py-3 text-sm font-medium tracking-wider text-center text-gray-700 border-b border-gray-200 shadow overflow-hiddens sm:rounded-lg">
                            Current Selected Items
                        </div>
                        @if(empty($mergeIntoItem) && empty($mergeFromItems))
                            <div class="bg-white divide-y divide-gray-200 col-span-12 border-b border-gray-200 shadow overflow-hiddens flex items-center justify-center text-center text-gray-600">
                                No items selected
                            </div>

                        @else
                            <div class="bg-white divide-y divide-gray-200 col-span-2 border-b border-gray-200 shadow overflow-hiddens flex items-center justify-center text-center">
                                @if($mergeIntoItem)
                                    <x-tag-button-remove
                                        wire:click="removeMergeIntoItem"
                                        >
                                        {{ $mergeIntoItem['name'] }}
                                    </x-tag-button-remove>
                                @endif
                            </div>
                            <div class="bg-white divide-y divide-gray-200 col-span-10 border-b border-gray-200 shadow overflow-hiddens flex flex-wrap items-center justify-center ">

                                @if(!empty($mergeFromItems))
                                    @foreach($mergeFromItems as $item)
                                        <x-tag-button-remove
                                            wire:click="removeMergeFromItems('{{ $item['id'] }}')"
                                            >
                                            {{ $item['name'] }}
                                        </x-tag-button-remove>
                                    @endforeach
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
