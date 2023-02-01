<?php

namespace Domain\Mapper\Seasons\Livewire;

use Support\Components\Table\SimpleTable\TableComponent;

class SeasonsTable extends TableComponent
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
