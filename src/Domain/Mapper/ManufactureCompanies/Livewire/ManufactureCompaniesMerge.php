<?php

namespace Domain\Mapper\ManufactureCompanies\Livewire;

use Support\Components\Merge\SimpleMerge\MergeComponent;

class ManufactureCompaniesMerge extends MergeComponent
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
