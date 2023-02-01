@props([
    'allPages' => $allPages,
    'currentPage' => $currentPage,
])

<tfoot>
    <tr class="">
        <td colspan="12" class="">
            @if($allPages > 1)
                {{-- pagination --}}
                <div class="flex justify-between">
                    <div class="flex items-center w-full text-gray-600 pl-9">
                        page {{$currentPage}} / {{$allPages}}
                    </div>
                    <div class="flex w-full justify-end space-x-2 my-1 pr-9">
                        @if($currentPage > 1)
                            <button
                                type="button"
                                wire:click="selectPreviousPage"
                                wire:key={{'previousPage'.time()}}
                                class="px-2 py-1 border border-blue-500 rounded-md text-gray-600 hover:text-white hover:bg-blue-400">
                                <
                            </button>
                        @endif
                        @if($allPages > $currentPage)
                            <button
                                type="button"
                                wire:click="selectNextPage"
                                wire:key={{'nextPage'.time()}}
                                class="px-2 py-1 border border-blue-500 rounded-md text-gray-600 hover:text-white hover:bg-blue-400">
                                >
                            </button>
                        @endif
                    </div>
                </div>
            @endif
        </td>
    </tr>
</tfoot>
