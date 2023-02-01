<?php

namespace Domain\Mapper\Brands\Livewire;

use Support\Components\Merge\SimpleMerge\MergeComponent;

class BrandsMerge extends MergeComponent
{
    public function setTableApi(): void
    {
        $this->tableApi = 'brands';
    }

    public function setTableName(): void
    {
        $this->tableName = 'Brands';
    }
}
