<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Armada;

class ArmadaController extends Controller
{
    public function index()
    {
        // TODO: bungkus dalam collection soalnya ada yang perlu disesuaikan
        $armadas = Armada::where('is_published', true)
            ->orderBy('sort', 'asc')
            ->get();

        return response()->json($armadas);
    }
}
