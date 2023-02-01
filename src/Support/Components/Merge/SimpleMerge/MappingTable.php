<?php

namespace Support\Components\Merge\SimpleMerge;

use Livewire\Component;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Support\Traits\WithPaginationTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class MappingTable extends Component
{
    use WithPaginationTrait;
    use LivewireAlert;

    public string $tableName = 'Please insert a name';
    public string $tableApi;

    public string $search = '';
    public int $allItemsCount;
    public int $allItemsPerCurrentPageCount;
    public $allItems;

    protected $listeners = [
        'refreshMappingTable' => '$refresh'
    ];

    public function mount()
    {
        $this->pageSize = 10;
    }

    public function render()
    {
        $this->callEndpoint();

        return view('livewire.components.merge.simple-merge.mapping-table');
    }

    public function updatingSearch($value)
    {
        $this->search = $value;

        $this->resetPage();
    }

    public function removeMergedIntoItem($itemId)
    {
        $response = Http::timeout(120)
            ->put(env('ORCHESTRATOR_URL') . "/management/{$this->tableApi}/removeMergedInto/{$itemId}");

        if ($response->successful()) {
            $this->alert('success', 'Items updated!');
            $this->emit('resetMerge');
        } else {
            $this->alert('warning', 'Items are not updated, please try again later', [
                'position' => 'center',
            ]);
        }
    }

    public function removeMergedFromItem($itemId)
    {
        $response = Http::timeout(120)
            ->put(env('ORCHESTRATOR_URL') . "/management/{$this->tableApi}/removeMergedFrom/{$itemId}");

        if ($response->successful()) {
            $this->alert('success', 'Item updated!');
            $this->emit('resetMerge');
        } else {
            $this->alert('warning', 'Item is not updated, please try again later', [
                'position' => 'center',
            ]);
        }
    }

    public function callEndpoint(): void
    {
        try {
            $response = $this->apiCall();

            $this->allItems = json_decode(json_encode($response->json()), true)['data'];

            $response = json_decode($response);

            $this->currentPage = $response->current_page;
            $this->allPages = $response->last_page;
            $this->allItemsCount = $response->total;
            $this->allItemsPerCurrentPageCount = count($this->allItems);
        } catch (\Exception $e) {
            info($e->getMessage());
        }
    }

    public function apiCall(): Response
    {
        return Http::timeout(120)
            ->get(env('ORCHESTRATOR_URL') . "/management/{$this->tableApi}/merged", [
                'page' => $this->page,
                'page_size' => $this->pageSize,
                'search' => $this->search
            ]);
    }
}
