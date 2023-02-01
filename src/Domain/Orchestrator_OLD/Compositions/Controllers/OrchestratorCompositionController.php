<?php

namespace Domain\Orchestrator\Compositions\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;

class OrchestratorCompositionController extends Controller
{
    public function index() :View
    {
        return view('orchestrator.compositions.index');
    }

    public function merge() :View
    {
       return view('orchestrator.compositions.merge');
    }
}
