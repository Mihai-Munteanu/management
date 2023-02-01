<?php

namespace Support\Traits;

trait WithPaginationTrait
{
    public int $firstPage = 1;
    public int $allPages = 0;
    public int $pageSize = 15;
    public int $lastPage = 1;
    public int $currentPage = 1;
    public bool $showFirstPage = false;
    public bool $showLastPage = true;
    public int $page = 1;

    public function mount() :void
    {
        $this->paginatePages();
        $this->paginateCurrentPages();
    }

    public function resetPage()
    {
        $this->page = 1;
    }

    public function paginatePages() :void
    {
        $this->firstPage = 1;

        $this->allPages > 5
            ? $this->lastPage = 5
            : $this->lastPage = $this->allPages;
    }

    public function paginateCurrentPages() :void
    {
        if($this->currentPage - 3 > 0) {
            $this->firstPage = $this->currentPage-2;
            $this->showFirstPage = true;
        } else {
            $this->firstPage = 1;
            $this->showFirstPage = false;
        }

        if($this->currentPage + 3 <= $this->allPages) {
            $this->lastPage = $this->currentPage + 2;
            $this->showLastPage = true;
        } else {
            $this->lastPage = $this->allPages;
            $this->showLastPage = false;
        }

        // we need to have current page 1 when we filter
        $this->page = 1;
    }

    public function selectPreviousPage() :void
    {
        $this->page = $this->currentPage - 1;
    }

    public function selectPage($page) :void
    {
        $this->page = $page;
    }

    public function selectNextPage() :void
    {
        if($this->allPages > $this->currentPage) {
            $this->page = $this->currentPage+1;
        }
    }
}
