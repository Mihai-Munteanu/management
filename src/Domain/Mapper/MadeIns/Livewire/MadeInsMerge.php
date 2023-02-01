<?php

namespace Domain\Mapper\MadeIns\Livewire;

use Support\Components\Merge\SimpleMerge\MergeComponent;

class MadeInsMerge extends MergeComponent
{
    public function setTableApi(): void
    {
        $this->tableApi = 'made-ins';
    }

    public function setTableName(): void
    {
        $this->tableName = 'Made Ins';
    }
}
