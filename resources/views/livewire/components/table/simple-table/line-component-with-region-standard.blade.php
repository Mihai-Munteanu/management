<tr class="bg-white border-b hover:bg-gray-100">
    <td class="px-4 py-2 text-sm text-gray-500 whitespace-nowrap">
        {{$data['id']}}
    </td>
    <td class="px-4 py-2 text-sm text-gray-500 whitespace-nowrap">
        <div class="flex flex-col">
            @if($isEdit)
                <input
                    wire:model="data.name"
                    type="text" id="data.name" name="dataName"
                    {{$isEdit ? '' : 'disabled'}}
                    @class([
                        'w-full pl-9 pr-3 py-2 focus:outline-none focus:border-sky-500 focus:ring-gray-600 focus:ring-1 text-gray-400 rounded-lg disabled:text-gray-600 ',

                        'disabled:bg-white bg-white' => true,
                        'disabled:bg-gray-50 bg-gray-50' => false,
                    ])
                />
                <span class="error text-xs text-red-500">
                    @error('data.name') {{ str_replace('data.', ' ', $message) }} @enderror
                </span>
            @else
                {{$data['name']}}
            @endif
        </div>
    </td>
    <td class="px-4 py-2 text-sm text-gray-500 whitespace-nowrap">
        @if($isEdit)
            <div class="flex flex-col">
                <livewire:components.single-select
                    :data="$regionStandards"
                    :emitEventName="$eventSelectRegionStandard"
                    :selected="$data['region_standard']['id']??null"
                />
                 <span class="error text-xs text-red-500">
                    @error('data.region_standard') {{ str_replace('data.', ' ', $message) }} @enderror
                </span>
            </div>
        @else
            {{$data['region_standard']['name'] ?? ''}}
        @endif
    </td>
    <td class="px-4 py-2 text-sm text-gray-500 whitespace-nowrap">
        {{Carbon\Carbon::parse($data['created_at'])->format('Y-m-d H:i:s')}}
    </td>
    <td class="whitespace-nowrap px-4">
        @if($isEdit)
            <button
                wire:click="cancel"
                class="text-red-500 hover:text-gray-800 focus:outline-none">
                <i class="fas fa-times"></i>
            </button>
            <button
                wire:click.prevent="save" class="text-green-400 hover:text-green-500 focus:outline-none">
                <i class="fas fa-check"></i>
            </button>
        @else
            <button
                wire:click="$set('isEdit', true)"
                class="text-gray-400 hover:text-blue-400"
                >
                <i class="fas fa-xs fa-pencil-alt"></i>
            </button>
        @endif
    </td>
</tr>
