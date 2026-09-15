<?php

namespace App\Http\Controllers;

use App\Contracts\ArmadaServiceInterface;
use App\Models\Armada;
use Illuminate\View\View;

class ArmadaController extends Controller
{
    public function index(ArmadaServiceInterface $armadaService): View
    {
        $armadas = $armadaService->getPublished();

        return view('armada.index', compact('armadas'));
    }

    public function show(Armada $armada, ArmadaServiceInterface $armadaService): View
    {
        $related = $armadaService->getRelated($armada);

        return view('armada.show', compact('armada', 'related'));
    }
}
