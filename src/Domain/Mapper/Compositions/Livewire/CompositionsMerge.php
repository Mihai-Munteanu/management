<?php

namespace Domain\Mapper\Compositions\Livewire;

use Support\Components\Merge\SimpleMerge\MergeComponent;

class CompositionsMerge extends MergeComponent
{
    public function setTableApi(): void
    {
        $this->tableApi = 'compositions';
    }

    public function setTableName(): void
    {
        $this->tableName = 'Compositions';
    }
}
