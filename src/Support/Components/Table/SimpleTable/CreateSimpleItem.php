<?php

namespace Support\Components\Table\SimpleTable;

use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use LivewireUI\Modal\ModalComponent;

class CreateSimpleItem extends ModalComponent
{
    use LivewireAlert;

    public string $name = '';
    public string $tableApi = '';

    protected function rules(): array
    {
        return [
            'name' => 'string|required',
        ];
    }

    public function render()
    {
        return view('livewire.components.table.simple-table.create-simple-item');
    }

    public static function modalMaxWidth(): string
    {
        // 'sm'
        // return 'md';
        // 'lg'
        // 'xl'
        return '2xl';
        // '3xl'
        // '4xl'
        // '5xl'
        // '6xl'
        // '7xl'
        // return '4xl';
    }

    // close modal
    // <button wire:click="$emit('closeModal')">Close Modal</button>
    //  $this->closeModal();

    public static function closeModalOnEscape(): bool
    {
        // default true;
        return true;
    }

    public function createNewItem()
    {
        try {
            $response = Http::timeout(120)
                ->post(env("ORCHESTRATOR_URL") . "/management/{$this->tableApi}", [
                    'name' => $this->name,
                ]);

            if ($response->successful()) {
                $this->emit('refreshSimpleTable');
            }
        } catch (\Exception $e) {
            $this->alert('warning', 'Item is not created, please try again later', [
                'position' => 'center',
            ]);
        }
    }


    public function submit()
    {
        $this->validate();

        $this->createNewItem();

        $this->closeModal();
    }
}
