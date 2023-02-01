<?php

namespace Domain\Mapper\Colors\Livewire;

use Support\Components\Merge\SimpleMerge\MergeComponent;

class ColorsMerge extends MergeComponent
{
    public function setTableApi(): void
    {
        $this->tableApi = 'colors';
    }

    public function setTableName(): void
    {
        $this->tableName = 'Colors';
    }
}
