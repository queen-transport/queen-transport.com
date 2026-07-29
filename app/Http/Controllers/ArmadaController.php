<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use Illuminate\View\View;

class ArmadaController extends Controller
{
    public function index(): View
    {
        $armadas = Armada::query()
            ->where('is_published', true)
            ->orderBy('sort')
            ->orderBy('title')
            ->get();

        return view('armada.index', compact('armadas'));
    }

    public function show(Armada $armada): View
    {
        $related = Armada::query()
            ->where('is_published', true)
            ->where('id', '!=', $armada->id)
            ->orderBy('sort')
            ->limit(4)
            ->get();

        return view('armada.show', compact('armada', 'related'));
    }
}
