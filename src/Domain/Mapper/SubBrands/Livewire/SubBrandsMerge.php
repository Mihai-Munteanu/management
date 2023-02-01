<?php

namespace Domain\Mapper\SubBrands\Livewire;

use Support\Components\Merge\SimpleMerge\MergeComponent;

class SubBrandsMerge extends MergeComponent
{
    public function setTableApi(): void
    {
        $this->tableApi = 'sub-brands';
    }

    public function setTableName(): void
    {
        $this->tableName = 'Sub Brands';
    }
}
