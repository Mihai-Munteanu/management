<?php

namespace Domain\Mapper\SubBrands\Livewire;

use Support\Components\Table\SimpleTable\TableComponent;

class SubBrandsTable extends TableComponent
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
