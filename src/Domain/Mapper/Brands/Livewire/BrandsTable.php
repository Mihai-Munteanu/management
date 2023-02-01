<?php

namespace Domain\Mapper\Brands\Livewire;

use Support\Components\Table\SimpleTable\TableComponent;


class BrandsTable extends TableComponent
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
