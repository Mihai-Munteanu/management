<?php

namespace Support\Components\Merge\SimpleMerge;

use Livewire\Component;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Support\Traits\WithCursorPaginationTrait;

class SingleItemSelectApi extends Component
{
    use WithCursorPaginationTrait;

    public string $tableName = 'Please insert a name';
    public string $tableApi = '';

    public array $allItems;
    public array $item = [];
    public $itemId;
    public string $search = '';

    protected $listeners = [
        'resetPageOnMarkAsPrimary' => 'resetPage',
        'resetMerge' => 'resetSelectedMergeIntoItem',
        'removeSelectedMergeIntoItem',
    ];

    public function mount()
    {
        $this->callEndpoint();
    }

    public function render()
    {
        return view('livewire.components.merge.simple-merge.single-item-select-api');
    }

    public function updatingSearch($value)
    {
        $this->search = $value;

        $this->resetPage();
        $this->callEndpoint();
    }

    public function resetSelectedMergeIntoItem()
    {
        $this->itemId = '';
        $this->item = [];

        $this->callEndpoint();
    }

    public function resetPage()
    {
        $this->callEndpoint();
    }

    public function selectOption($value)
    {
        if ($this->itemId == $value) {
            $this->itemId = '';
            $this->item = [];
        } else {
            $this->itemId = $value;

            collect($this->allItems)->filter(function ($query) {
                return $query['id'] === $this->itemId;
            })->map(function ($query) {
                return $this->item = [
                    'id' => $query['id'],
                    'name' => $query['name'],
                ];
            });
        }

        $this->emit('selectedMergeIntoItem', $this->item);
    }

    public function removeSelectedMergeIntoItem()
    {
        $this->itemId = [];
    }

    public function callEndpoint()
    {
        try {
            $response = $this->apiCall();

            $this->allItems = json_decode(json_encode($response->json()), true)['data'];

            $response = json_decode($response);

            $this->currentPage = $response->current_page;
            $this->allPages = $response->last_page;

            //this is needed for the cases when we remain with no information on the last page
            if ($this->allPages < $this->page) {
                $this->page = $this->allPages;
                $this->callEndpoint();
            }
        } catch (\Exception $e) {
            info($e->getMessage());
        }
    }

    public function apiCall(): Response
    {
        return Http::timeout(120)
            ->get(env("ORCHESTRATOR_URL") . "/management/{$this->tableApi}/primary", [
                'page' => $this->page,
                'page_size' => $this->pageSize,
                'search' => $this->search,
                'sort_field' => 'id',
                'sort_direction' => 'desc',
                'is_rimary' => true
            ]);
    }
}
