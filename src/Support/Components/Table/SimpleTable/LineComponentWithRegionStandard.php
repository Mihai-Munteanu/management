<?php

namespace Support\Components\Table\SimpleTable;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

// todo* to adjust the code for sizes and delete if it is not needed anymore
class LineComponentWithRegionStandard extends Component
{
    public string $tableApi;
    public $initialData;
    public $data;
    public bool $isEdit = false;
    public string $eventSelectRegionStandard = 'eventSelectRegionStandard';
    public $regionStandards;

    protected $rules = [
        'data.name' => 'max:255|required',
        'data.region_standard' => 'required',
    ];

    protected $listeners = [
        'reload' => '$refresh',
        'eventSelectRegionStandard',
    ];

    public function mount($data): void
    {
        $this->data = json_decode(json_encode($data), true);

        $this->init();
    }

    public function render()
    {
        return view('livewire.orchestrator.components.table.line-component-with-region-standard');
    }

    public function save()
    {
        $this->validate();

        $this->updateItemEndpointCall();

        $this->isEdit = false;

        $this->emitUp('updatedLine');
    }

    public function cancel()
    {
        $this->data = $this->initialData;

        $this->isEdit = false;
    }

    public function updateItemEndpointCall()
    {
        Http::timeout(120)
            ->put(env('ORCHESTRATOR_URL') . "/management/{$this->tableApi}/{$this->data['id']}", [
                'id' => $this->data['id'],
                'name' => $this->data['name'],
                'region_standard_id' => $this->data['region_standard'],
            ]);
    }

    public function eventSelectRegionStandard($id)
    {
        $this->data['region_standard'] = $id;
    }

    public function init()
    {
        $this->initialData = $this->data;
    }
}
