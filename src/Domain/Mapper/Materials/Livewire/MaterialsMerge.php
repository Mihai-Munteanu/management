<?php

namespace Domain\Mapper\Materials\Livewire;

use Support\Components\Merge\SimpleMerge\MergeComponent;

class MaterialsMerge extends MergeComponent
{
    public function setTableApi(): void
    {
        $this->tableApi = 'materials';
    }

    public function setTableName(): void
    {
        $this->tableName = 'Materials';
    }
}
