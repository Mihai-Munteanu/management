<?php

namespace Support\Components\Table\SimpleTable;

use Livewire\Component;
use Support\Traits\WithSortTrait;
use Illuminate\Support\Facades\Http;
use Support\Traits\WithPaginationTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class LineComponent extends Component
{
    use WithPaginationTrait, WithSortTrait;
    use LivewireAlert;

    public string $tableApi;
    public $initialItem;
    public $item;
    public bool $isEdit = false;
    public bool $isPrimary = false;

    protected $rules = [
        'item.name' => 'max:255|required',
    ];

    protected $listeners = [
        'reload' => '$refresh',
        'confirmModal',
        'cancelModal',
    ];

    public function mount($item): void
    {
        $this->item = json_decode(json_encode($item), true);

        $this->init();
    }

    public function render()
    {
        return view('livewire.components.table.simple-table.line-component');
    }

    public function updatedItemIsPrimary($value)
    {
        // info('value: ' . $value);
        if ($value === false) {

            // info('value2: ' . $value);

            $this->emit('openModal', 'components.modal.simple-confirmation-modal-with-id', [
                "title" => " Would you like to mark it as NON primary element ?",
                "body" => "Note that this means that all elements merged into it will be unmerged",
                "itemId" => $this->item['id']
            ]);

            return;
        }

        // info('value3: ' . $value);

        $response = $this->apiCallIsPrimary(true);

        $this->alertMessage($response);
    }

    public function cancelModal()
    {
        $this->emit('refreshSimpleTable');
    }

    public function confirmModal($itemId)
    {
        if ($this->item['id'] === $itemId) {

            $response = $this->apiCallIsPrimary(false);

            $this->alertMessage($response);
        }
    }

    public function apiCallIsPrimary($value)
    {
        return Http::timeout(120)
            ->put(env("ORCHESTRATOR_URL") . "/management/{$this->tableApi}/isPrimary/{$this->item['id']}", [
                'isPrimary' => $value,
            ]);
    }

    public function alertMessage($response)
    {
        if ($response->successful()) {
            $this->alert('success', 'Item updated!');
        } else {
            $this->alert('warning', 'Item is not updated, please try again later', [
                'position' => 'center',
            ]);
            $this->emit('refreshSimpleTable');
        }
    }

    public function save()
    {
        $this->validate();

        $this->updateItemEndpointCall();

        $this->isEdit = false;

        $this->alert('success', 'Item updated!');

        $this->emitUp('updatedLine');
    }

    public function cancel()
    {
        $this->item = $this->initialItem;

        $this->isEdit = false;
    }

    public function updateItemEndpointCall()
    {
        Http::timeout(120)
            ->put(env("ORCHESTRATOR_URL") . "/management/{$this->tableApi}/{$this->item['id']}", [
                'id' => $this->item['id'],
                'name' => $this->item['name'],
            ]);
    }

    public function init()
    {
        $this->initialItem = $this->item;
    }
}
