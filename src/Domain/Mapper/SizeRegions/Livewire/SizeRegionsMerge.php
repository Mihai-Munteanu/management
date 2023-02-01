<?php

namespace Domain\Mapper\SizeRegions\Livewire;

use Support\Components\Merge\SimpleMerge\MergeComponent;

class SizeRegionsMerge extends MergeComponent
{
    public function setTableApi(): void
    {
        $this->tableApi = 'size-regions';
    }

    public function setTableName(): void
    {
        $this->tableName = 'Size Regions';
    }
}
