<?php

namespace Domain\Mapper\Seasons\Livewire;

use Support\Components\Merge\SimpleMerge\MergeComponent;

class SeasonsMerge extends MergeComponent
{
    public function setTableApi(): void
    {
        $this->tableApi = 'seasons';
    }

    public function setTableName(): void
    {
        $this->tableName = 'Seasons';
    }
}
