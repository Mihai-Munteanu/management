<?php

namespace Support\Components\Merge\SimpleMerge;

use Livewire\Component;

class ShowCurrentSelectedItems extends Component
{
    public array $mergeFromItems = [];
    public array $mergeIntoItem = [];

    protected $listeners = [
        'selectedMergeIntoItem',
        'selectedMergedFromItems',

        'resetMerge'
    ];

    public function render()
    {
        return view('livewire.components.merge.simple-merge.show-current-selected-items');
    }

    public function selectedMergedFromItems(array $items)
    {
        $this->mergeFromItems = $items;
    }

    public function selectedMergeIntoItem($item)
    {
        if (empty($item)) {
            $this->mergeIntoItem = [];
            return;
        }
        $this->mergeIntoItem = $item;
    }

    public function removeMergeIntoItem()
    {
        $this->emit('removeSelectedMergeIntoItem', []);

        $this->mergeIntoItem = [];
    }

    public function removeMergeFromItems($itemId)
    {
        $this->emit('removeSelectedMergeFromItems', $itemId);
    }

    public function resetMerge()
    {
        $this->mergeFromItems = [];
        $this->mergeIntoItem = [];
    }
}
