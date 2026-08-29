<?php

namespace App\Livewire;

use App\Services\SewaAlphardSurabayaService;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts::public')]
class SewaAlphardSurabaya extends Component
{
    public function render(SewaAlphardSurabayaService $service): View
    {
        return view('sewa-alphard-surabaya', $service->getData())
            ->title('Sewa Alphard Surabaya Murah & Transformer VIP + Driver — '.config('site.brand'))
            ->with([
                'description' => 'Sewa Alphard Surabaya termurah & paling mewah (Alphard Transformer, All New Alphard Hybrid VIP) include driver profesional. Layanan 24 jam untuk dinas, event, pernikahan & airport Juanda.',
            ]);
    }
}
