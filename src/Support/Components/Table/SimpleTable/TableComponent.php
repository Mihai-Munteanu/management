<?php

namespace Support\Components\Table\SimpleTable;

use stdClass;
use Livewire\Component;
use Illuminate\Support\Str;
use Support\Traits\WithSortTrait;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Support\Traits\WithPaginationTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;

abstract class TableComponent extends Component
{
    use LivewireAlert;

    abstract public function setTableApi(): void;
    abstract public function setTableName(): void;

    use WithSortTrait, WithPaginationTrait;

    private ?stdClass $response;

    public string $tableApi;
    public string $tableName;
    public Collection $allItems;
    public array $allTableElements;
    public string $date = '';
    public int $allItemsCount;
    public int $allItemsPerCurrentPageCount;

    public string $sortDirection = 'desc';
    // TODO: to clarify if this should be converted to enum
    public array $isPrimaryStatuses = [
        'true' => 'Primary',
        'false' => 'Not primary',
        '' => 'All',
    ];
    public string $isPrimaryStatusSelected = 'all';

    protected $listeners = [
        'reload' => '$refresh',
        'updatedLine',
        'refreshSimpleTable' => '$refresh',
    ];

    public $filters = [
        'searchId' => '',
        'searchName' => '',
        // 'searchParent' => '',
    ];

    public function mount(): void
    {
        // this methods are set up on children classes
        $this->setTableApi();
        $this->setTableName();

        $this->init();
    }

    public function render(): View
    {
        $this->callEndpoint();

        return view('livewire.components.table.simple-table.table-component');
    }

    public function clearFilters(): void
    {
        $this->filters = [];
        $this->date = '';
        $this->isPrimaryStatusSelected = '';
    }

    public function updatingFilters()
    {
        $this->resetPage();
    }

    public function callEndpoint(): void
    {
        try {
            $this->response = json_decode($this->apiCall(env('ORCHESTRATOR_URL') . "/management/{$this->tableApi}"));

            $this->allItems = collect($this->response->data);
            $this->setPaginationVariables();
        } catch (\Exception $e) {
            $this->allItems = collect([]);
        }
    }

    public function apiCall($url): Response
    {
        return Http::timeout(120)
            ->get($url, [
                'page' => $this->page,
                'page_size' => $this->pageSize,
                'search_id' => $this->filters['searchId'] ?? null,
                'search_name' => $this->filters['searchName'] ?? null,
                'min_date' => Str::before($this->date, ' to'),
                'max_date' => Str::after($this->date, 'to '),
                'sort_field' => $this->sortField,
                'sort_direction' => $this->sortDirection,
                'is_primary' => $this->isPrimaryStatusSelected,
            ]);
    }

    public function setPaginationVariables(): void
    {
        $this->currentPage = $this->response->current_page;
        $this->allPages = $this->response->last_page;
        $this->allItemsCount = $this->response->total;

        $this->allItemsPerCurrentPageCount = count($this->allItems);

        $this->paginatePages();
        $this->paginateCurrentPages();
    }

    public function updatedLine()
    {
        $this->page = $this->currentPage;
    }

    public function init()
    {
        $this->allTableElements = [
            'is primary', 'id', 'name', 'created_at'
        ];
    }
}
