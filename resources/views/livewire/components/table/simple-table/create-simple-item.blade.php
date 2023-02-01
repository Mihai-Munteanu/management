<x-modal formAction="submit">
    <x-slot name="title">
        Create new item
    </x-slot>

    <x-slot name="content">
        <x-input.group label="Name" for="name" :error="$errors->first('name')">
            <x-input.text wire:model="name" label="Name" />
        </x-input.group>
    </x-slot>

    <x-slot name="buttons">
        <div class="flex justify-between w-full px-10">
            <x-button bgColor="bg-gray-200" wire:click="$emit('closeModal')">Cancel</x-button>

            <x-button bgColor="bg-blue-200" type="submit">Save</x-button>
        </div>
    </x-slot>
</x-modal>
