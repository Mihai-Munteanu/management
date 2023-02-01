<div class="w-full md:col-span-1 lg:col-span-12">
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-autos sm:-mx-6 lg:-mx-8">
            <div class="initem-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="w-full border-b border-gray-200 shadow overflow-hiddens sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100 ">
                            <tr>
                                <th scope="col" class="w-full px-6 py-3 text-sm font-medium tracking-wider text-center text-gray-700">
                                    <div class="flex flex-col">
                                        <p>{{$tableName}}</p>
                                        <p class="text-xs flex justify-start text-gray-700">
                                            * you may select only one item
                                        </p>
                                        <p class="text-xs flex justify-start text-gray-700">
                                            * here are only primary items
                                        </p>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <x-input.text small wire:model.debounce.500ms="search" id="search" placeholder="Search" />
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if(empty($allItems))
                            <tr>
                                <td class="px-2 text-gray-500 max-w-max text-center">
                                    No Items to select
                                </td>
                            </tr>
                            @else
                            @foreach($allItems as $item)
                            <tr>
                                <td class="px-2 text-gray-500 max-w-max text-center">
                                    <div class="flex justify-between px-5 ">
                                        <div class="w-full flex justify-center">
                                            <x-tag-button-add :ifSelected="$itemId == $item['id']" wire:click="selectOption({{ $item['id'] }})" wire:key="time()">
                                                {{ $item['name'] }}
                                            </x-tag-button-add>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <div>
                            <x-table.cursor-pagination :allPages="$allPages" :currentPage="$currentPage" />
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
