<div class="w-full flex justify-center">
    <div class="container">
        <x-table.simple-table :tableName="$tableName" :tableApi="$tableApi" :allTableElements="$allTableElements" :sortField="$sortField" :allItems="$allItems" :allPages="$allPages" :pageSize="$pageSize" :allItemsCount="$allItemsCount" :currentPage="$currentPage" :showFirstPage="$showFirstPage" :firstPage="$firstPage" :lastPage="$lastPage" :showLastPage="$showLastPage" :allItemsPerCurrentPageCount="$allItemsPerCurrentPageCount" :isPrimaryStatuses="$isPrimaryStatuses">
            @foreach($allItems as $item)
            <livewire:components.table.simple-table.line-component :item="$item" :tableApi="$tableApi" :wire:key="$item->id.time()" />
            @endforeach
        </x-table.simple-table>
    </div>
</div>
