<?php

namespace Domain\Orchestrator\Categories\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;

class OrchestratorCategoryController extends Controller
{
    public function index() :View
    {
        return view('orchestrator.categories.index');
    }

    public function merge() :View
    {
       return view('orchestrator.categories.merge');
    }
}
