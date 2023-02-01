<x-modal formAction="confirm">
    <x-slot name="title">
        <div class="flex justify-center text-2xl">
            {{$title}}
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="flex justify-center">
            {{$body}}
        </div>
    </x-slot>

    <x-slot name="buttons">
        <div class="flex justify-between w-full px-10">
            <x-button bgColor="bg-gray-200" wire:click='cancel'>Cancel</x-button>

            <x-button bgColor="bg-blue-200" type="submit">Confirm</x-button>
        </div>
    </x-slot>
</x-modal>
