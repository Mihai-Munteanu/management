<div class="w-full md:col-span-1 lg:col-span-12 mt-5">
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-autos sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="w-full overflow-hiddens">
                    <div class="grid grid-cols-12 bg-gray-100">
                        <div class="col-span-12 w-full px-6 py-3 text-sm font-medium tracking-wider text-center text-gray-700 border-b border-gray-200 shadow overflow-hiddens sm:rounded-lg">
                            {{ $tableName }}
                        </div>
                         <div class="bg-white divide-y divide-gray-200 col-span-12 border-b border-gray-200 shadow overflow-hiddens text-center h-full">
                            <x-input.text small wire:model.debounce.500ms="search"
                                id="search"
                                placeholder="Search ..."
                                class='w-full'
                            />
                        </div>
                        @if(empty($allItems))
                            <div class="bg-white divide-y divide-gray-200 col-span-12 border-b border-gray-200 shadow overflow-hiddens flex flex-wrap items-center justify-center text-center h-full text-gray-600">
                                No items available
                            </div>
                        @else
                            @foreach($allItems as $item)
                                <div class="bg-white divide-y divide-gray-200 col-span-2 border-b border-gray-200 shadow overflow-hiddens flex flex-wrap items-center justify-center text-center h-full">
                                    <x-tag-button-remove
                                        wire:click="removeMergedIntoItem({{ $item['id'] }})"
                                        >
                                        {{$item['name']}}
                                    </x-tag-button-remove>
                                </div>
                                <div class="bg-white divide-y divide-gray-200 col-span-10 border-b border-gray-200 shadow overflow-hiddens flex flex-wrap items-center justify-center">
                                    @foreach($item['merged_from_primary'] as $mergedFrom)
                                        <x-tag-button-remove
                                            wire:click="removeMergedFromItem({{$mergedFrom['id']}})"
                                                >
                                            {{ $mergedFrom['name'] }}
                                        </x-tag-button-remove>
                                    @endforeach
                                </div>
                            @endforeach
                           <div class="col-span-12 w-full px-6 py-3 text-sm font-medium tracking-wider text-center text-gray-700 border-b border-gray-200 shadow overflow-hiddens sm:rounded-lg">
                                <x-table.pagination
                                    wire:key="time()"
                                    :allPages="$allPages"
                                    :pageSize="$pageSize"
                                    :allItemsCount="$allItemsCount"
                                    :currentPage="$currentPage"
                                    :showFirstPage="$showFirstPage"
                                    :firstPage="$firstPage"
                                    :lastPage="$lastPage"
                                    :showLastPage="$showLastPage"
                                    :allItemsPerCurrentPageCount="$allItemsPerCurrentPageCount"

                                />
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
