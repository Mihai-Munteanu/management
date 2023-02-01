@props([
    'orderElements' => $orderElements
])

<dl>
    @foreach($orderElements as $elementName => $elementValue)
        <div @class([
            "px-4 py-1 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6",
            'bg-gray-50' => $loop->iteration % 2 == 1,
            'bg-white' => $loop->iteration % 2 == 0,
            ])>
            <dt class="text-sm font-medium text-gray-500">
                 {{ ucwords(str_replace('_', ' ', $elementName)) }}
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                @if($elementName == 'is_test')
                    {{ $elementValue ? 'true' : 'false' }}
                @else
                    {{$elementValue}}
                @endif
            </dd>
        </div>
    @endforeach
</dl>
