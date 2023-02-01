<?php

namespace Domain\Orchestrator\Materials\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;

class OrchestratorMaterialController extends Controller
{
    public function index() :View
    {
        return view('orchestrator.materials.index');
    }

    public function merge() :View
    {
       return view('orchestrator.materials.merge');
    }
}
