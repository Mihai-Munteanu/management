<?php

namespace Domain\Mapper\Colors\Livewire;

use Support\Components\Table\SimpleTable\TableComponent;


class ColorsTable extends TableComponent
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
