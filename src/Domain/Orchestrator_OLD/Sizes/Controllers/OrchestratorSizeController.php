<?php

namespace Domain\Orchestrator\Sizes\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;

class OrchestratorSizeController extends Controller
{
    public function index() :View
    {
        return view('orchestrator.sizes.index');
    }

    public function merge() :View
    {
       return view('orchestrator.sizes.merge');
    }
}
