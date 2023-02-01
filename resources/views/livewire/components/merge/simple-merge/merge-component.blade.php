<div class="w-full flex justify-center pt-12">
    <div class="container">
        <div class="flex flex-col lg:flex-row justify-between lg:space-x-10">
            <div class="w-full">
                <livewire:components.merge.simple-merge.single-item-select-api wire:key=time() tableName="{{$tableName}} Merge Into" tableApi="{{$tableApi}}" />
            </div>

            <div class="flex items-center">
                <x-button wire:click="syncMapping">
                    Sync
                </x-button>
            </div>

            <div class="w-full">
                <livewire:components.merge.simple-merge.multiple-items-select-api tableName="{{$tableName}} Merge From" tableApi="{{$tableApi}}" />
            </div>
        </div>

        <div>
            <livewire:components.merge.simple-merge.show-current-selected-items />
        </div>

        <div>
            <livewire:components.merge.simple-merge.mapping-table tableName="{{$tableName}} Merge Into" tableApi="{{$tableApi}}" />
        </div>
    </div>
</div>
