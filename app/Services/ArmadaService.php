<?php

namespace App\Services;

use App\Models\Armada;
use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ArmadaService
{
    /**
     * Get all published armadas sorted by priority and title.
     *
     * @return Collection<int, Armada>
     */
    public function getPublished(): Collection
    {
        return $this->queryPublished()->get();
    }

    /**
     * Alias for getPublished().
     *
     * @return Collection<int, Armada>
     */
    public function getAllArmadas(): Collection
    {
        return $this->getPublished();
    }

    /**
     * Get published armadas filtered by specific search keywords or car types.
     * (e.g. 'alphard', 'hiace', ['innova', 'zenix'], 'fortuner').
     *
     * @param  string|array<int, string>  $keywords
     * @return Collection<int, Armada>
     */
    public function getByKeyword(string|array $keywords): Collection
    {
        $terms = array_filter(array_map('trim', (array) $keywords));

        if (empty($terms)) {
            return $this->getPublished();
        }

        return $this->queryPublished()
            ->where(function (Builder $query) use ($terms) {
                foreach ($terms as $term) {
                    $pattern = '%'.$term.'%';
                    $query->orWhere('title', 'like', $pattern)
                        ->orWhere('car_type', 'like', $pattern)
                        ->orWhere('slug', 'like', $pattern);
                }
            })
            ->get();
    }

    /**
     * Get published Toyota Alphard & Vellfire armadas.
     *
     * @return Collection<int, Armada>
     */
    public function getAlphard(): Collection
    {
        return $this->getByKeyword(['alphard', 'vellfire']);
    }

    /**
     * Get published Toyota Hiace armadas (Commuter, Premio Standard, Premio Luxury).
     *
     * @return Collection<int, Armada>
     */
    public function getHiace(): Collection
    {
        return $this->getByKeyword('hiace');
    }

    /**
     * Get published Toyota Fortuner armadas (VRZ, GR, Legend).
     *
     * @return Collection<int, Armada>
     */
    public function getFortuner(): Collection
    {
        return $this->getByKeyword('fortuner');
    }

    /**
     * Get published Toyota Innova & Zenix armadas (Reborn, Zenix Hybrid, Q Hybrid).
     *
     * @return Collection<int, Armada>
     */
    public function getInnova(): Collection
    {
        return $this->getByKeyword(['innova', 'zenix']);
    }

    /**
     * Find a published armada by slug.
     */
    public function getBySlug(string $slug): ?Armada
    {
        return $this->queryPublished()
            ->where('slug', $slug)
            ->first();
    }

    /**
     * Get related published armadas excluding the current armada.
     *
     * @return Collection<int, Armada>
     */
    public function getRelated(Armada $armada, int $limit = 4): Collection
    {
        return $this->queryPublished()
            ->where('id', '!=', $armada->id)
            ->limit($limit)
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
     * Get Hiace variant pricing structure.
     *
     * @return array<int, array{name: string, badge: string, seat: string, price: int, price_label: string, desc: string, features: array<int, string>}>
     */
    public function getHiacePrices(): array
    {
        $defaultPrices = [
            [
                'name' => 'Hiace Commuter',
                'badge' => 'Paling Populer',
                'seat' => '14 Seat',
                'price' => 1700000,
                'price_label' => '1.700.000',
                'desc' => 'Pilihan ideal untuk rombongan wisata, kunjungan dinas, atau acara keluarga dengan kapasitas lega dan hemat biaya.',
                'features' => ['14 Reclining Seats', 'Full AC Per-Head', 'Audio & USB Charger', 'Driver Profesional', 'Free Snack & Air Mineral'],
            ],
            [
                'name' => 'Hiace Premio Standard',
                'badge' => 'Kenyamanan Ekstra',
                'seat' => '14 Seat',
                'price' => 1850000,
                'price_label' => '1.850.000',
                'desc' => 'Desain modern semi-bonnet dengan tingkat peredaman kabin yang lebih tinggi dan suspensi ekstra empuk.',
                'features' => ['14 Reclining Seats Premium', 'Kabin Lebih Senyap', 'Full AC Double Blower', 'Driver Berpengalaman', 'Free Snack & Air Mineral'],
            ],
            [
                'name' => 'Hiace Premio Luxury',
                'badge' => 'VIP & Executive',
                'seat' => '9 Seat',
                'price' => 2850000,
                'price_label' => '2.850.000',
                'desc' => 'Kemewahan kelas atas dengan Captain Seat jok kulit, entertainment TV, meja lipat, dan suasana kabin privat super VIP.',
                'features' => ['9 VIP Captain Seats', 'Kulit Premium & Legrest', 'Smart TV & Sound System', 'Ambience Light & Meja', 'Free Snack, Buah & Drink'],
            ],
        ];

        $dbArmadas = $this->getHiace();

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
                'seat' => $armada->car_type ?: ($matchingDefault['seat'] ?? '14 Seat'),
                'price' => $price,
                'price_label' => $price ? number_format($price, 0, ',', '.') : 'Tanya Harga',
                'desc' => ! empty($armada->description) ? strip_tags($armada->description) : ($matchingDefault['desc'] ?? ''),
                'features' => ! empty($armada->features) ? $armada->features : ($matchingDefault['features'] ?? []),
            ];
        })->toArray();
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

        $dbArmadas = $this->getAlphard();

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
     * Get FAQs specific to Hiace rental.
     *
     * @return array<int, array{q: string, a: string}>
     */
    public function getHiaceFaqs(): array
    {
        return [
            [
                'q' => 'Berapa kapasitas penumpang Sewa Hiace di Surabaya?',
                'a' => 'Toyota Hiace Commuter dan Hiace Premio Standard berkapasitas hingga 14 penumpang. Sedangkan untuk varian Hiace Premio Luxury / VIP berkapasitas 9 penumpang dengan konfigurasi Captain Seat yang sangat mewah.',
            ],
            [
                'q' => 'Apakah sewa Hiace di Surabaya sudah termasuk driver?',
                'a' => 'Ya, seluruh penawaran sewa Hiace kami sudah termasuk driver profesional yang berpengalaman, sopan, dan sangat menguasai rute jalan di Surabaya serta destinasi wisata di seluruh Jawa Timur.',
            ],
            [
                'q' => 'Apa perbedaan antara Hiace Commuter dan Hiace Premio?',
                'a' => 'Hiace Premio menggunakan mesin dan moncong depan (semi-bonnet) terbaru yang membuat kabin jauh lebih senyap, suspensi lebih nyaman, dan jarak antar kursi lebih lega dibanding Hiace Commuter.',
            ],
            [
                'q' => 'Apakah melayani penjemputan Bandara Juanda (SUB) dan perjalanan luar kota?',
                'a' => 'Sangat bisa! Kami melayani drop-off / pick-up Bandara Juanda Surabaya, tour wisata (Bromo, Malang, Batu, Banyuwangi, Bali), perjalanan dinas kantor, maupun acara pernikahan.',
            ],
            [
                'q' => 'Fasilitas apa saja yang didapatkan selama perjalanan?',
                'a' => 'Setiap unit Hiace kami dalam kondisi bersih & terawat, Full AC dingin per-kepala, reclining seat, charger HP, serta gratis snack, buah segar, dan air mineral di hari pertama pemesanan.',
            ],
            [
                'q' => 'Bagaimana cara pemesanan dan pembayaran sewa Hiace?',
                'a' => 'Pemesanan dapat dilakukan dengan mudah via WhatsApp. Anda cukup menginformasikan tanggal pemakaian, lokasi penjemputan, dan tipe Hiace yang diinginkan. Tim kami akan mengonfirmasi ketersediaan dan memberikan petunjuk DP.',
            ],
        ];
    }

    /**
     * Get FAQs specific to Alphard rental.
     *
     * @return array<int, array{q: string, a: string}>
     */
    public function getAlphardFaqs(): array
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
     * Gather full data payload for Hiace Folio page.
     *
     * @return array{hiaceArmadas: Collection<int, Armada>, allArmadas: Collection<int, Armada>, pelanggans: Collection<int, Pelanggan>, hiacePrices: array<int, mixed>, faqs: array<int, mixed>}
     */
    public function getHiacePageData(): array
    {
        return [
            'hiaceArmadas' => $this->getHiace(),
            'allArmadas' => $this->getPublished(),
            'pelanggans' => $this->getPelanggans(),
            'hiacePrices' => $this->getHiacePrices(),
            'faqs' => $this->getHiaceFaqs(),
        ];
    }

    /**
     * Gather full data payload for Alphard Folio page.
     *
     * @return array{alphardArmadas: Collection<int, Armada>, allArmadas: Collection<int, Armada>, pelanggans: Collection<int, Pelanggan>, alphardPrices: array<int, mixed>, faqs: array<int, mixed>}
     */
    public function getAlphardPageData(): array
    {
        return [
            'alphardArmadas' => $this->getAlphard(),
            'allArmadas' => $this->getPublished(),
            'pelanggans' => $this->getPelanggans(),
            'alphardPrices' => $this->getAlphardPrices(),
            'faqs' => $this->getAlphardFaqs(),
        ];
    }

    /**
     * Get FAQs specific to Ziarah Wali 5 Jawa Timur.
     *
     * @return array<int, array{q: string, a: string}>
     */
    public function getZiarahFaqs(): array
    {
        return [
            [
                'q' => 'Berapa lama waktu yang dibutuhkan untuk Ziarah Wali 5 di Jawa Timur?',
                'a' => 'Perjalanan Ziarah Wali 5 Jatim (Sunan Ampel, Maulana Malik Ibrahim, Sunan Giri, Sunan Drajat, Sunan Bonang) dapat ditempuh dalam 1 hari full (Express Tour 12-16 jam) atau 2 hari 1 malam untuk perjalanan yang lebih santai dan khusyuk.',
            ],
            [
                'q' => 'Apakah sewa Hiace / mobil ziarah di Queen Transport sudah termasuk driver?',
                'a' => 'Ya, seluruh armada kami disewakan lengkap dengan driver profesional yang sopan, berpengalaman, dan sangat menguasai rute jalan serta titik parkir khusus van/bus ziarah di seluruh area makam Wali Jawa Timur.',
            ],
            [
                'q' => 'Bisakah penjemputan dilakukan dari Bandara Juanda, Stasiun, atau Hotel di Surabaya?',
                'a' => 'Sangat bisa! Kami melayani penjemputan langsung dari Bandara Internasional Juanda (SUB), Stasiun Pasar Turi, Stasiun Gubeng, maupun hotel dan kediaman di area Surabaya, Sidoarjo, dan sekitarnya.',
            ],
            [
                'q' => 'Armada apa yang paling direkomendasikan untuk rombongan Ziarah Wali 5?',
                'a' => 'Untuk rombongan 9-14 orang, Toyota Hiace Commuter atau Premio adalah pilihan paling favorit karena kabinnya luas, AC dingin merata, dan kursi reclining nyaman. Untuk rombongan keluarga 5-7 orang bisa menggunakan Innova Zenix / Reborn.',
            ],
            [
                'q' => 'Apakah driver membantu mengarahkan lokasi dan titik transit perhentian ziarah?',
                'a' => 'Tentu saja. Driver kami siap membantu memandu urutan rute efisien, merekomendasikan tempat makan/rest area halal yang luas untuk rombongan, serta membantu koordinasi lokasi parkir terdekat.',
            ],
            [
                'q' => 'Bagaimana cara melakukan pemesanan dan konsultasi rute ziarah?',
                'a' => 'Pemesanan sangat mudah via WhatsApp. Anda cukup menginformasikan tanggal perjalanan, jumlah peserta rombongan, dan lokasi penjemputan. Tim kami akan menyiapkan estimasi jadwal dan armada terbaik.',
            ],
        ];
    }

    /**
     * Gather full data payload for Ziarah Wali 5 Folio page.
     *
     * @return array{allArmadas: Collection<int, Armada>, pelanggans: Collection<int, Pelanggan>, faqs: array<int, mixed>}
     */
    public function getZiarahPageData(): array
    {
        return [
            'allArmadas' => $this->getPublished(),
            'pelanggans' => $this->getPelanggans(),
            'faqs' => $this->getZiarahFaqs(),
        ];
    }

    /**
     * Query builder for published armadas with standard ordering.
     */
    protected function queryPublished(): Builder
    {
        return Armada::query()
            ->where('is_published', true)
            ->orderBy('sort')
            ->orderBy('title');
    }
}
