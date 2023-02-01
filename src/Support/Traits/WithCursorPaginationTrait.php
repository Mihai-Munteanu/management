<?php

namespace Support\Traits;


trait WithCursorPaginationTrait
{
    public int $allPages = 0;
    public int $pageSize = 15;
    public int $currentPage = 1;
    public int $page = 1;

    public function resetPage()
    {
        $this->page = 1;
    }

    public function selectPreviousPage() :void
    {
        if($this->page > 1) {
            $this->page = $this->currentPage - 1;

            $this->callEndpoint();

        }
    }

    public function selectNextPage() :void
    {
        if($this->allPages > $this->currentPage) {
            $this->page = $this->currentPage+1;

            $this->callEndpoint();
        }
    }
}
