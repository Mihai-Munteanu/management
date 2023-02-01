@props([
    'orderElements' => $orderElements,
    'orderElementsName' => $orderElementsName,
])

  <dl>
    @foreach($orderElements as $elementName => $elementValue)
        <div @class([
            "pl-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4",
            'bg-white' => $loop->iteration % 2 == 1
            ])>
            <dt class="sm:col-span-1 text-sm font-medium text-gray-500">
                {{ ucwords(str_replace('_', ' ', $elementName)) }}
            </dt>
            <dd class="text-sm text-gray-600 sm:mt-0 sm:col-span-2">
                <input
                    wire:model="{{$orderElementsName . '.' . $elementName}}"
                    type="text" id="{{$elementName}}" name="{{$elementName}}"
                    placeholder="please insert ..."
                    @class([
                        'w-full pl-9 pr-3 focus:outline-none focus:border-sky-500 focus:ring-gray-600 focus:ring-1 text-gray-400 rounded-lg',

                        'bg-white' => $loop->iteration % 2 == 1,
                        'bg-gray-50' => $loop->iteration % 2 == 0
                    ])
                />
                <span class="error text-xs text-red-500">
                    @error($orderElementsName. '.' .$elementName) {{  str_replace('.', ' ',$message) }} @enderror
                </span>
            </dd>
        </div>
    @endforeach
</dl>
