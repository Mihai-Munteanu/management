@props([
'tableName' => $tableName,
'tableApi' => $tableApi,
'allTableElements' => $allTableElements,
'sortField' => $sortField,
'allItems' => $allItems,
'allPages' => $allPages,
'pageSize' => $pageSize,
'allItemsCount' => $allItemsCount,
'currentPage' => $currentPage,
'showFirstPage' => $showFirstPage,
'firstPage' => $firstPage,
'lastPage' => $lastPage,
'showLastPage' => $showLastPage,
'allItemsPerCurrentPageCount' => $allItemsPerCurrentPageCount,
'isPrimaryStatuses' => $isPrimaryStatuses,
])

<div class="w-full">
    <div class="flex justify-between items-center py-2 align-middle sm:px-6 lg:px-8">
        <div class="text-3xl text-black">
            {{ $tableName }}
        </div>
        <div>
            {{-- TODO: to refactor below button into x-button, there is an error due to the wire:click interpolation --}}
            <button class="text-gray-600 py-2 px-4 border rounded-md text-sm leading-5 font-medium
                hover:border hover:border-blue-400 hover:bg-white
                focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition duration-150 ease-in-out bg-green-200" wire:click='$emit("openModal", "components.table.simple-table.create-simple-item", {{ json_encode(["tableApi" => $tableApi]) }})'>
                Create New Item
            </button>

            <x-button bgColor="bg-gray-200" wire:click="clearFilters">
                <div>
                    Clear filters
                </div>
            </x-button>
            <x-anchor-button href="{{route('mapper.' . $tableApi. '.merge')}}">
                Merge
            </x-anchor-button>

        </div>
    </div>
    <div class="flex flex-col">
        <div class="-my-2 sm:-mx-6">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="shadow sm:rounded-lg mt-2">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 rounded-lg">
                            <tr class="whitespace-nowrap">
                                {{-- colums name --}}
                                @foreach($allTableElements as $element)

                                @if($element == 'is primary')
                                <x-table.heading class="">
                                    {{ ucwords(str_replace('_', ' ', $element)) }}
                                </x-table.heading>

                                @else
                                <x-table.heading sortable multi-column wire:click="sortBy('{{ $element }}')" :direction="$sortField == '{{ $element }}' ? $sortDirection : null" class="">
                                    {{ ucwords(str_replace('_', ' ', $element)) }}
                                </x-table.heading>
                                @endif
                                @endforeach
                                <td>
                                    {{-- it is needed for options --}}
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- row with all searchs --}}
                            <tr class="bg-white border-b hover:bg-gray-100">
                                @foreach($allTableElements as $element)
                                @if($element == 'created_at')
                                <td class="px-4 py-2 text-sm text-gray-500 whitespace-nowrap">
                                    <x-input.date wire:model="date" id="date" />
                                </td>
                                @elseif($element == 'is primary')
                                <td class="px-4 py-2 text-sm text-gray-500 whitespace-nowrap">
                                    <x-input.select wire:model="isPrimaryStatusSelected" id="isPrimaryStatusSelected" placeholder="Choose" class="whitespace-nowrap py-2">
                                        @foreach($isPrimaryStatuses as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </x-input.select>
                                </td>
                                @elseif($element)
                                <td class="px-4 py-2 text-sm text-gray-500 whitespace-nowrap">
                                    <x-input.search wire:model.debounce.500ms="filters.search{{ str_replace(' ','',ucwords(str_replace('_', ' ', $element))) }}" name="'search'.{{$element}}" id="'search'.{{$element}}" />
                                </td>
                                @endif
                                @endforeach
                                <td>
                                    {{-- it is needed for options --}}
                                </td>
                            </tr>
                            @if($allItems->isEmpty())
                            <tr class="bg-white border-b">
                                <td colspan="9" class="py-2 text-center text-gray-500 text-md">
                                    No available information
                                </td>
                            </tr>
                            @endif
                            {{ $slot }}
                        </tbody>
                        <div>
                            <x-table.pagination :allPages="$allPages" :pageSize="$pageSize" :allItemsCount="$allItemsCount" :currentPage="$currentPage" :showFirstPage="$showFirstPage" :firstPage="$firstPage" :lastPage="$lastPage" :showLastPage="$showLastPage" :allItemsPerCurrentPageCount="$allItemsPerCurrentPageCount" />
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
