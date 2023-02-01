<?php

namespace Support\Components\Merge\SimpleMerge;

use Livewire\Component;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;

abstract class MergeComponent extends Component
{
    use LivewireAlert;

    abstract public function setTableApi(): void;
    abstract public function setTableName(): void;

    public array $mergeIntoItem = [];
    public array $mergeFromItems = [];
    public array $processedMergeFromItems = [];
    public string $tableApi;
    public string $tableName;

    public function mount()
    {
        // this methods are set up on children classes
        $this->setTableApi();
        $this->setTableName();
    }

    public function render()
    {
        return view('livewire.components.merge.simple-merge.merge-component');
    }

    protected $listeners = [
        'reload' => '$refresh',
        'selectedMergeIntoItem' => 'mergeIntoItem',
        'removeSelectedMergeIntoItem' => 'mergeIntoItem',
        'selectedMergedFromItems' => 'mergeFromItems',
    ];

    public function mergeFromItems($value)
    {
        $this->mergeFromItems = $value;
    }

    public function mergeIntoItem($value)
    {
        $this->mergeIntoItem = $value;
    }

    public function syncMapping()
    {
        if (empty($this->mergeIntoItem) || empty($this->mergeFromItems)) {
            return;
        }

        $this->processingInformation();

        // $duplication = $this->verifyIfABrandIsMergedBetweenItself($this->mergeIntoItem['id'], $this->processedMergeFromItems);

        // if ($duplication) {
        //     return $this->alert('warning', "You can not merge  {$this->mergeIntoItem['name']} to itself", [
        //         'position' => 'center',
        //     ]);
        // }

        $response = $this->apiCall();

        if ($response->successful()) {
            $this->alert('success', "You have successfully merged {$this->tableName}!", [
                'position' => 'top-end',
            ]);
        } else {
            $this->alert('warning', "Something went wrong, please try again later", [
                'position' => 'center',
            ]);
        }

        $this->resetInitialState();
    }

    public function processingInformation()
    {
        $this->processedMergeFromItems = collect($this->mergeFromItems)->map(function ($q) {
            return $q['id'];
        })->toArray();
    }

    public function apiCall(): Response
    {
        return Http::timeout(120)
            ->put(env("ORCHESTRATOR_URL") . "/management/{$this->tableApi}/merge", [
                'mergeIntoItem' => $this->mergeIntoItem['id'],
                'mergeFromItems' => $this->processedMergeFromItems,
            ]);
    }

    // public function verifyIfABrandIsMergedBetweenItself($mergedIntoId, $mergedFromIds)
    // {
    //     return collect($mergedFromIds)->contains($mergedIntoId);
    // }

    public function resetInitialState()
    {
        $this->mergeIntoItem = [];
        $this->mergeFromItems = [];

        $this->emit('resetMerge');
        $this->emitSelf('reload');
        $this->emit('refreshMappingTable');
    }
}
