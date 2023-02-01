<?php

namespace Domain\Orchestrator\MadeIns\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;

class OrchestratorMadeInController extends Controller
{
    public function index() :View
    {
        return view('orchestrator.made-ins.index');
    }

    public function merge() :View
    {
       return view('orchestrator.made-ins.merge');
    }
}
