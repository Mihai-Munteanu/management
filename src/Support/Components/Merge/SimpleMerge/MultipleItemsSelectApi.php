<?php

namespace Support\Components\Merge\SimpleMerge;

use Livewire\Component;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Support\Traits\WithCursorPaginationTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class MultipleItemsSelectApi extends Component
{
    use WithCursorPaginationTrait;
    use LivewireAlert;

    public string $tableName = 'Please insert a name';
    public string $tableApi;

    public array $allItems;
    public int $allItemsCount;
    public string $search = '';
    public array $selectedItems = [];
    public array $selectedItemIds = [];

    protected $listeners = [
        'reload' => '$refresh',
        'removeSelectedMergeFromItems',
        'resetMerge' => 'resetSelectedMergeFromItems',
        'confirmModal',
    ];

    public function mount()
    {
        $this->callEndpoint();
    }

    public function render()
    {
        return view('livewire.components.merge.simple-merge.multiple-items-select-api');
    }

    public function updatingSearch($value): void
    {
        $this->search = $value;

        $this->resetPage();
        $this->callEndpoint();
    }

    public function selectOption($value): void
    {
        $selected = collect($this->selectedItemIds)->flip();

        if (isset($selected[$value])) {
            $this->removeSelectedItem($selected[$value]);
        } else {
            $this->selectedItemIds[] = $value;

            collect($this->allItems)->filter(function ($query) use ($value) {
                return $query['id'] === $value;
            })->map(function ($query) {
                return $this->selectedItems[] = [
                    'id' => $query['id'],
                    'name' => $query['name'],
                ];
            });
        }

        $this->emit('selectedMergedFromItems', $this->selectedItems);
    }

    public function resetSelectedMergeFromItems(): void
    {
        $this->selectedItemIds = [];
        $this->selectedItems = [];

        $this->callEndpoint();
    }

    public function removeSelectedMergeFromItems($itemId)
    {
        $selected = collect($this->selectedItemIds)->flip();

        if (!isset($selected[$itemId])) {
            return;
        }

        $this->removeSelectedItem($selected[$itemId]);

        $this->emit('selectedMergedFromItems', $this->selectedItems);
    }

    public function removeSelectedItem($itemId): void
    {
        array_splice($this->selectedItemIds, $itemId, 1);
        array_splice($this->selectedItems, $itemId, 1);
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
        } catch (\Exception $e) {
            info($e->getMessage());
        }
    }

    public function apiCall(): Response
    {
        return Http::timeout(120)
            ->get(env("ORCHESTRATOR_URL") . "/management/{$this->tableApi}/noMerged", [
                'page' => $this->page,
                'page_size' => $this->pageSize,
                'search' => $this->search,
                'sort_field' => 'id',
                'sort_direction' => 'desc',
            ]);
    }

    public function cancelModal()
    {
        $this->emit('');
    }

    public function confirmModal($itemId)
    {
        $response =  Http::timeout(120)
            ->put(env("ORCHESTRATOR_URL") . "/management/{$this->tableApi}/merge", [
                'mergeIntoItem' => $itemId,
                'mergeFromItems' => [$itemId],
            ]);

        if ($response->successful()) {
            $this->alert('success', "Item made primary!", [
                'position' => 'top-end',
            ]);

            $this->callEndpoint();
            $this->emit('resetPageOnMarkAsPrimary');
        } else {
            $this->alert('warning', "Something went wrong, please try again later", [
                'position' => 'center',
            ]);
        }
    }

    public function makeItPrimary($item)
    {
        $this->emit('openModal', 'components.modal.simple-confirmation-modal-with-id', [
            "title" => " Would you like to mark {$item['name']} as Primary element ?",
            "body" => "",
            "itemId" => $item['id'],
        ]);
        return;
    }
}
