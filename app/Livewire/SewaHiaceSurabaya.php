<?php

namespace App\Livewire;

use App\Services\SewaHiaceSurabayaService;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts::public')]
class SewaHiaceSurabaya extends Component
{
    public function render(SewaHiaceSurabayaService $service): View
    {
        return view('sewa-hiace-surabaya', $service->getData())
            ->title('Sewa Hiace Surabaya Murah & Premio Luxury + Driver — '.config('site.brand'))
            ->with([
                'description' => 'Sewa Hiace Surabaya termurah & terbaik (Commuter, Premio Standard, Premio Luxury 9-14 seat) include driver profesional. Layanan 24 jam untuk wisata, dinas, event & airport Juanda.',
            ]);
    }
}
