<?php

namespace Domain\Mapper\MadeIns\Livewire;

use Support\Components\Table\SimpleTable\TableComponent;


class MadeInsTable extends TableComponent
{
    public function setTableApi(): void
    {
        $this->tableApi = 'made-ins';
    }

    public function setTableName(): void
    {
        $this->tableName = 'Made Ins';
    }
}
