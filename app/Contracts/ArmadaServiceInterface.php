<?php

namespace App\Contracts;

use App\Models\Armada;
use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Collection;

interface ArmadaServiceInterface
{
    /**
     * Get all published armadas sorted by priority and title.
     *
     * @return Collection<int, Armada>
     */
    public function getPublished(): Collection;

    /**
     * Alias for getPublished().
     *
     * @return Collection<int, Armada>
     */
    public function getAllArmadas(): Collection;

    /**
     * Get published armadas filtered by specific search keywords or car types.
     *
     * @param  string|array<int, string>  $keywords
     * @return Collection<int, Armada>
     */
    public function getByKeyword(string|array $keywords): Collection;

    /**
     * Get published Toyota Alphard & Vellfire armadas.
     *
     * @return Collection<int, Armada>
     */
    public function getAlphard(): Collection;

    /**
     * Get published Toyota Hiace armadas.
     *
     * @return Collection<int, Armada>
     */
    public function getHiace(): Collection;

    /**
     * Get published Toyota Fortuner armadas.
     *
     * @return Collection<int, Armada>
     */
    public function getFortuner(): Collection;

    /**
     * Get published Toyota Innova & Zenix armadas.
     *
     * @return Collection<int, Armada>
     */
    public function getInnova(): Collection;

    /**
     * Find a published armada by slug.
     */
    public function getBySlug(string $slug): ?Armada;

    /**
     * Get related published armadas excluding the current armada.
     *
     * @return Collection<int, Armada>
     */
    public function getRelated(Armada $armada, int $limit = 4): Collection;

    /**
     * Get published customer testimonials.
     *
     * @return Collection<int, Pelanggan>
     */
    public function getPelanggans(): Collection;

    /**
     * Get Hiace variant pricing structure.
     *
     * @return array<int, array{name: string, badge: string, seat: string, price: int, price_label: string, desc: string, features: array<int, string>}>
     */
    public function getHiacePrices(): array;

    /**
     * Get Alphard variant pricing structure.
     *
     * @return array<int, array{name: string, badge: string, seat: string, price: int, price_label: string, desc: string, features: array<int, string>}>
     */
    public function getAlphardPrices(): array;

    /**
     * Get FAQs specific to Hiace rental.
     *
     * @return array<int, array{q: string, a: string}>
     */
    public function getHiaceFaqs(): array;

    /**
     * Get FAQs specific to Alphard rental.
     *
     * @return array<int, array{q: string, a: string}>
     */
    public function getAlphardFaqs(): array;

    /**
     * Gather full data payload for Hiace Folio page.
     *
     * @return array{hiaceArmadas: Collection<int, Armada>, allArmadas: Collection<int, Armada>, pelanggans: Collection<int, Pelanggan>, hiacePrices: array<int, mixed>, faqs: array<int, mixed>}
     */
    public function getHiacePageData(): array;

    /**
     * Gather full data payload for Alphard Folio page.
     *
     * @return array{alphardArmadas: Collection<int, Armada>, allArmadas: Collection<int, Armada>, pelanggans: Collection<int, Pelanggan>, alphardPrices: array<int, mixed>, faqs: array<int, mixed>}
     */
    public function getAlphardPageData(): array;

    /**
     * Gather full data payload for luxury car rental Folio page.
     *
     * @return array{allArmadas: Collection<int, Armada>, pelanggans: Collection<int, Pelanggan>, kelasAtasPrices: array<int, mixed>, faqs: array<int, mixed>}
     */
    public function getKelasAtasPageData(): array;
}
