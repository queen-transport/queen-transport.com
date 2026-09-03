<?php

namespace App\Services;

use App\Models\Armada;
use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Collection;

class SewaAlphardSurabayaService
{
    /**
     * Get published armada vehicles filtered by Alphard title, car type, or slug.
     *
     * @return Collection<int, Armada>
     */
    public function getAlphardArmadas(): Collection
    {
        return Armada::query()
            ->where('is_published', true)
            ->where(function ($query) {
                $query->where('title', 'like', '%alphard%')
                    ->orWhere('car_type', 'like', '%alphard%')
                    ->orWhere('slug', 'like', '%alphard%')
                    ->orWhere('title', 'like', '%vellfire%')
                    ->orWhere('car_type', 'like', '%vellfire%');
            })
            ->orderBy('sort')
            ->orderBy('title')
            ->get();
    }

    /**
     * Get all published armadas as fallbacks or general fleet options.
     *
     * @return Collection<int, Armada>
     */
    public function getAllArmadas(): Collection
    {
        return Armada::query()
            ->where('is_published', true)
            ->orderBy('sort')
            ->orderBy('title')
            ->get();
    }

    /**
     * Get published customer testimonials.
     *
     * @return Collection<int, Pelanggan>
     */
    public function getPelanggans(): Collection
    {
        return Pelanggan::query()
            ->where('is_published', true)
            ->orderBy('sort')
            ->get();
    }

    /**
     * Get Alphard variant pricing structure.
     *
     * @return array<int, array{name: string, badge: string, seat: string, price: int, price_label: string, desc: string, features: array<int, string>}>
     */
    public function getAlphardPrices(): array
    {
        $defaultPrices = [
            [
                'name' => 'Alphard Gen 2 / Facelift',
                'badge' => 'Pilihan Ekonomis VIP',
                'seat' => '6-7 Seat VIP',
                'price' => 2200000,
                'price_label' => '2.200.000',
                'desc' => 'Tampilan tetap berkelas dengan kenyamanan kabin mewah, ideal untuk operasional dinas instansi, penjemputan tamu kantor, atau rombongan VIP.',
                'features' => ['6 VIP Captain Seats', 'Full AC Climate Control', 'Jok Kulit Soft Touch', 'Driver Berpengalaman', 'Free Snack & Air Mineral'],
            ],
            [
                'name' => 'Alphard Transformer (Gen 3)',
                'badge' => 'Paling Populer',
                'seat' => '6 VIP Seat',
                'price' => 2800000,
                'price_label' => '2.800.000',
                'desc' => 'Desain grille Transformer yang ikonik dan gagah, interior super mewah dilengkapi Dual Sunroof, Rear Entertainment, dan suspensi sangat empuk.',
                'features' => ['6 First-Class Captain Seats', 'Dual Sunroof & Ambience Light', 'Smart TV / Entertainment System', 'Driver Professional Uniform', 'Free Snack, Buah & Air Mineral'],
            ],
            [
                'name' => 'All New Alphard HEV (Gen 4)',
                'badge' => 'Flagship VIP & VVIP',
                'seat' => '6 VIP Seat',
                'price' => 3800000,
                'price_label' => '3.800.000',
                'desc' => 'Puncak kemewahan MPV flagship Toyota paling gres. Teknologi Hybrid super senyap, Executive Lounge Seats, dan fitur kenyamanan VVIP kelas atas.',
                'features' => ['Executive Lounge Seats + Heater/Cooler', 'JBL Premium Sound & Wireless Charger', 'Performa Hybrid Senyap & Ramah Lingkungan', 'Driver Standar Protokol VVIP', 'Free Premium Amenities & Beverages'],
            ],
        ];

        $dbArmadas = $this->getAlphardArmadas();

        if ($dbArmadas->isEmpty()) {
            return $defaultPrices;
        }

        return $dbArmadas->map(function (Armada $armada) use ($defaultPrices) {
            $matchingDefault = collect($defaultPrices)->first(function ($item) use ($armada) {
                return str_contains(strtolower($armada->title), strtolower($item['name']))
                    || str_contains(strtolower($item['name']), strtolower($armada->title));
            });

            $price = $armada->price ?? $matchingDefault['price'] ?? 0;

            return [
                'name' => $armada->title,
                'badge' => $armada->car_badge ?: ($matchingDefault['badge'] ?? ''),
                'seat' => $armada->car_type ?: ($matchingDefault['seat'] ?? '6 VIP Seat'),
                'price' => $price,
                'price_label' => $price ? number_format($price, 0, ',', '.') : 'Tanya Harga',
                'desc' => ! empty($armada->description) ? strip_tags($armada->description) : ($matchingDefault['desc'] ?? ''),
                'features' => ! empty($armada->features) ? $armada->features : ($matchingDefault['features'] ?? []),
            ];
        })->toArray();
    }

    /**
     * Get FAQs specific to Alphard rental in Surabaya.
     *
     * @return array<int, array{q: string, a: string}>
     */
    public function getFaqs(): array
    {
        return [
            [
                'q' => 'Berapa kapasitas penumpang Sewa Alphard di Surabaya?',
                'a' => 'Toyota Alphard didesain untuk kenyamanan eksklusif 6 hingga 7 penumpang dengan baris kedua menggunakan Captain Seats yang sangat lapang dan elegan.',
            ],
            [
                'q' => 'Apakah sewa Alphard di Surabaya sudah termasuk driver?',
                'a' => 'Ya, seluruh layanan sewa Toyota Alphard di Queen Transport sudah termasuk driver profesional yang rapi, ramah, dan berpengalaman melayani tamu eksekutif, pejabat, serta VIP.',
            ],
            [
                'q' => 'Varian Toyota Alphard apa saja yang tersedia?',
                'a' => 'Kami menyediakan Toyota Alphard Gen 2, Alphard Transformer (Gen 3), hingga All New Alphard Hybrid (Gen 4) dengan kondisi unit selalu bersih dan rutin dirawat.',
            ],
            [
                'q' => 'Apakah melayani paket Sewa Alphard Wedding Car (Mobil Pengantin) di Surabaya?',
                'a' => 'Tentu saja! Kami menyediakan paket khusus mobil pengantin Alphard lengkap dengan dekorasi bunga eksklusif, pita, dan driver berpenampilan formal untuk hari istimewa Anda.',
            ],
            [
                'q' => 'Apakah melayani penjemputan VIP di Bandara Juanda (SUB)?',
                'a' => 'Sangat bisa. Tim driver kami siap melakukan penjemputan (transfer in/out) di Bandara Internasional Juanda Surabaya secara tepat waktu dengan papan nama penjemputan jika diperlukan.',
            ],
            [
                'q' => 'Bagaimana cara pemesanan dan syarat sewa Alphard?',
                'a' => 'Pemesanan dapat dilakukan langsung via WhatsApp. Anda cukup menginformasikan jadwal, rute, dan lokasi penjemputan. Tim kami akan menyiapkan konfirmasi pemesanan dan nomor rekening resmi untuk DP.',
            ],
        ];
    }

    /**
     * Gather all page data payload for presentation.
     *
     * @return array{alphardArmadas: Collection<int, Armada>, allArmadas: Collection<int, Armada>, pelanggans: Collection<int, Pelanggan>, alphardPrices: array<int, array{name: string, badge: string, seat: string, price: int, price_label: string, desc: string, features: array<int, string>}>, faqs: array<int, array{q: string, a: string}>}
     */
    public function getData(): array
    {
        return [
            'alphardArmadas' => $this->getAlphardArmadas(),
            'allArmadas' => $this->getAllArmadas(),
            'pelanggans' => $this->getPelanggans(),
            'alphardPrices' => $this->getAlphardPrices(),
            'faqs' => $this->getFaqs(),
        ];
    }
}
