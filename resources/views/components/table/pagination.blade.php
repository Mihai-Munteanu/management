@props([
'allPages' => $allPages,
'pageSize' => $pageSize,
'allItemsCount' => $allItemsCount,
'currentPage' => $currentPage,
'showFirstPage' => $showFirstPage,
'firstPage' => $firstPage,
'lastPage' => $lastPage,
'showLastPage' => $showLastPage,
'allItemsPerCurrentPageCount' => $allItemsPerCurrentPageCount,
])

<tfoot>
  <tr class="">
    <td colspan="12" class="">
      @if($allPages > 1)
      {{-- pagination --}}
      <div class="flex justify-between">
        <div class="flex items-center w-full text-gray-600 pl-9">
          showing {{ $allItemsPerCurrentPageCount }} from {{$allItemsCount}}

        </div>
        <div class="flex w-full justify-end space-x-2 my-1 pr-9">
          @if($currentPage > 1)
          <button wire:click="selectPreviousPage" wire:key={{'previousPage'.time()}} class="px-2 py-1 border border-blue-500 rounded-md text-gray-600 hover:text-white hover:bg-blue-400">
            < </button>
              @endif
              @if($showFirstPage)
              <button wire:click="selectPage(1)" wire:key={{'firstPage'.time()}} @class([ 'px-2 py-1 border border-blue-500 rounded-md text-gray-600 hover:text-white hover:bg-blue-400' , 'bg-blue-400 text-gray-700'=> 1 == $currentPage
                ])>
                1
              </button>
              @endif
              @if($currentPage > 4)
              <button @class([ 'px-2 py-1 border border-blue-500 rounded-md text-gray-600' , ])>
                ...
              </button>
              @endif
              @for($i = $firstPage; $i <= $lastPage; $i++) <button wire:click="selectPage({{$i}})" wire:key={{$i.time()}} @class([ 'px-2 py-1 border border-blue-500 rounded-md text-gray-600 hover:text-white hover:bg-blue-400' , 'bg-blue-400 text-white'=> $i == $currentPage
                ])>
                {{$i}}
          </button>
          @endfor
          @if($currentPage < $allPages - 3) <button @class([ 'px-2 py-1 border border-blue-500 rounded-md text-gray-600' , ])>
            ...
            </button>
            @endif
            @if($showLastPage)
            <button wire:click="selectPage({{$allPages}})" wire:key={{'allPages'.time()}} @class([ 'px-2 py-1 border border-blue-500 rounded-md text-gray-600 hover:text-white hover:bg-blue-400' , 'bg-blue-400 text-white'=> $allPages == $currentPage
              ])>
              {{$allPages}}
            </button>
            @endif
            @if($allPages > $currentPage)
            <button wire:click="selectNextPage" wire:key={{'nextPage'.time()}} class="px-2 py-1 border border-blue-500 rounded-md text-gray-600 hover:text-white hover:bg-blue-400">
              >
            </button>
            @endif
        </div>
      </div>
      @endif
    </td>
  </tr>
</tfoot>
