<?php

namespace Support\Traits;

trait WithSortTrait
{
    public string $sortField = 'id';
    public string $sortDirection = 'desc';

    public function sortBy($field) :void
    {
        // field order_age is computed within blade and therefore it can not sorted. Thus we use colum created_at
        if($field == 'order_age') {
            $field = 'created_at';
        }

        $this->sortDirection = $this->sortField == $field
            ? $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc'
            : 'asc';

        $this->sortField = $field;
    }
}
