<?php

namespace Support\Components\Table\SimpleTable;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use App\Http\Livewire\Orchestrator\Components\Table\TableComponent;

// todo* to adjust the code for sizes and delete if it is not needed anymore
class TableComponentWithRegionStandard extends TableComponent
{
    public array $regionStandards;

    public $filters = [
        'searchId' => '',
        'searchName' => '',
        'searchRegionStandard' => '',
    ];

    public function render(): View
    {
        $this->callEndpoint();

        return view('livewire.orchestrator.components.table.table-component-with-region-standard');
    }

    public function apiCall($url): Response
    {
        return Http::timeout(120)
            ->get($url, [
                'page' => $this->page,
                'page_size' => $this->pageSize,
                'search_id' => $this->filters['searchId'] ?? null,
                'search_name' => $this->filters['searchName'] ?? null,
                'search_region_standard' => $this->filters['searchRegionStandard'] ?? null,
                'min_date' => Str::before($this->date, ' to'),
                'max_date' => Str::after($this->date, 'to '),
                'sort_field' => $this->sortField,
                'sort_direction' => $this->sortDirection,
            ]);
    }

    public function init(): void
    {
        $this->allTableElements = [
            'id', 'name', 'region_standard', 'created_at'
        ];

        // get all region standard
        $this->regionStandards = Http::timeout(120)
            ->get("http://orchestrator/management/{$this->tableApi}/regionStandards")
            ->json();
    }
}
