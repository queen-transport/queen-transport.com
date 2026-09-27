<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArmadaController extends Controller
{
    public function index()
    {
        $armadas = \App\Models\Armada::where('is_published', true)
            ->orderBy('sort', 'asc')
            ->get();

        return response()->json($armadas);
    }
}
