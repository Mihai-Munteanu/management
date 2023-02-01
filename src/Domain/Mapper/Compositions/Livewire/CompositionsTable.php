<?php

namespace Domain\Mapper\Compositions\Livewire;

use Support\Components\Table\SimpleTable\TableComponent;


class CompositionsTable extends TableComponent
{
    public function setTableApi(): void
    {
        $this->tableApi = 'compositions';
    }

    public function setTableName(): void
    {
        $this->tableName = 'Compositions';
    }
}
