<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Services\ArmadaService;
use Illuminate\View\View;

class ArmadaController extends Controller
{
    public function index(ArmadaService $armadaService): View
    {
        $armadas = $armadaService->getPublished();

        return view('armada.index', compact('armadas'));
    }

    public function show(Armada $armada, ArmadaService $armadaService): View
    {
        $related = $armadaService->getRelated($armada);

        return view('armada.show', compact('armada', 'related'));
    }
}
