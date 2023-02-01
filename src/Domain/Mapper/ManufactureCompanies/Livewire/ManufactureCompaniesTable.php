<?php

namespace Domain\Mapper\ManufactureCompanies\Livewire;

use Support\Components\Table\SimpleTable\TableComponent;


class ManufactureCompaniesTable extends TableComponent
{
    public function setTableApi(): void
    {
        $this->tableApi = 'manufacturer-companies';
    }

    public function setTableName(): void
    {
        $this->tableName = 'Manufacturer Companies';
    }
}
