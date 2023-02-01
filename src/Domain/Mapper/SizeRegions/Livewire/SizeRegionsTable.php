<?php

namespace Domain\Mapper\SizeRegions\Livewire;

use Support\Components\Table\SimpleTable\TableComponent;


class SizeRegionsTable extends TableComponent
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
