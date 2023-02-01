<?php

namespace Domain\Mapper\Materials\Livewire;

use Support\Components\Table\SimpleTable\TableComponent;


class MaterialsTable extends TableComponent
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
