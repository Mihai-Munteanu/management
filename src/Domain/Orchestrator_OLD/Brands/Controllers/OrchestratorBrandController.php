<?php

namespace Domain\Orchestrator\Brands\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\Response as clientResponse;

class OrchestratorBrandController extends Controller
{
    public clientResponse $response;
    public array $orderElements;

    public function index() :View
    {
        return view('orchestrator.brands.index');
    }

    public function merge() :View
    {
       return view('orchestrator.brands.merge');
    }
}
