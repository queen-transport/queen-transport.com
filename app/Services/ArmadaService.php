<?php

namespace App\Services;

use App\Contracts\ArmadaServiceInterface;
use App\Models\Armada;
use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ArmadaService implements ArmadaServiceInterface
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
        $dbArmadas = $this->getHiace();

        if ($dbArmadas->isEmpty()) {
            (new \Database\Seeders\ArmadaSeeder)->run();
            $dbArmadas = $this->getHiace();
        }

        return $dbArmadas->map(function (Armada $armada) {
            $price = $armada->price ?? 0;

            return [
                'name' => $armada->title,
                'badge' => $armada->car_badge ?: '',
                'seat' => $armada->car_type ?: '14 Seat',
                'price' => $price,
                'price_label' => $price ? number_format($price, 0, ',', '.') : 'Tanya Harga',
                'desc' => ! empty($armada->description) ? strip_tags($armada->description) : '',
                'features' => ! empty($armada->features) ? $armada->features : [],
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
        $dbArmadas = $this->getAlphard();

        if ($dbArmadas->isEmpty()) {
            (new \Database\Seeders\ArmadaSeeder)->run();
            $dbArmadas = $this->getAlphard();
        }

        return $dbArmadas->map(function (Armada $armada) {
            $price = $armada->price ?? 0;

            return [
                'name' => $armada->title,
                'badge' => $armada->car_badge ?: '',
                'seat' => $armada->car_type ?: '6 VIP Seat',
                'price' => $price,
                'price_label' => $price ? number_format($price, 0, ',', '.') : 'Tanya Harga',
                'desc' => ! empty($armada->description) ? strip_tags($armada->description) : '',
                'features' => ! empty($armada->features) ? $armada->features : [],
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
                'q' => 'Apakah melayani penjemputan Bandara Juanda (SUB) dan perjalanan antar kota?',
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
     * Get luxury car rental pricing structure for Surabaya and surrounding areas.
     *
     * @return array<int, array{name: string, badge: string, seat: string, price: int, price_label: string, desc: string, features: array<int, string>, destinations: string, note: string}>
     */
    public function getKelasAtasPrices(): array
    {
        $dbArmadas = $this->getPublished();

        if ($dbArmadas->isEmpty()) {
            (new \Database\Seeders\ArmadaSeeder)->run();
            $dbArmadas = $this->getPublished();
        }

        return $dbArmadas->map(function (Armada $armada) {
            $price = $armada->price ?? 0;

            return [
                'name' => $armada->title,
                'badge' => $armada->car_badge ?: 'Surabaya & Sekitarnya',
                'seat' => $armada->car_type ?: '6-7 Seat',
                'price' => $price,
                'price_label' => $price ? number_format($price, 0, ',', '.') : 'Tanya Harga',
                'desc' => ! empty($armada->description) ? strip_tags($armada->description) : 'Armada premium dengan tarif resmi berlaku untuk wilayah Surabaya & sekitarnya.',
                'features' => ! empty($armada->features) ? $armada->features : ['Driver Profesional', 'Full AC', 'Snack & Air Mineral'],
                'destinations' => 'Surabaya & Sekitarnya (Gresik, Sidoarjo, Malang & Sekitarnya)',
                'note' => 'Surabaya dan sekitarnya',
            ];
        })->toArray();
    }

    /**
     * Get FAQs specific to luxury car rental in Surabaya and surrounding areas.
     *
     * @return array<int, array{q: string, a: string}>
     */
    public function getKelasAtasFaqs(): array
    {
        $minArmada = Armada::query()->where('is_published', true)->whereNotNull('price')->orderBy('price')->first();
        $minPriceLabel = $minArmada && $minArmada->price ? number_format($minArmada->price, 0, ',', '.') : '1.450.000';

        return [
            [
                'q' => 'Berapa harga sewa mobil kelas atas di Surabaya?',
                'a' => 'Harga sewa armada kami diambil resmi dari database tiap unit mulai dari Rp '.$minPriceLabel.'/hari. Semua harga berlaku sama dengan keterangan untuk Surabaya dan sekitarnya.',
            ],
            [
                'q' => 'Apakah tarif sewa mobil sudah mencakup seluruh layanan?',
                'a' => 'Tarif dasar sewa armada kami adalah sama dengan tarif Surabaya dan sekitarnya. Untuk perjalanan antar kota atau kebutuhan operasional khusus, penyesuaian hanya berlaku pada BBM, tol, dan penginapan driver jika menginap.',
            ],
            [
                'q' => 'Apakah tarif sewa sudah termasuk Driver, BBM, dan Tol?',
                'a' => 'Harga tertera adalah tarif rental armada per hari (Surabaya dan sekitarnya) yang sudah termasuk driver profesional. Untuk BBM, tol, parkir, dan penyeberangan dapat disesuaikan rute atau memilih paket All In.',
            ],
            [
                'q' => 'Kota mana saja yang dapat dilayani dari Surabaya?',
                'a' => 'Kami melayani perjalanan ke seluruh wilayah Jawa Timur (Malang, Batu, Bromo, Banyuwangi, Kediri, Madiun, Jember), Jawa Tengah & DIY (Solo, Jogja, Semarang), Jawa Barat, Jakarta, hingga Overland Tour ke Bali.',
            ],
            [
                'q' => 'Apakah driver berpengalaman untuk perjalanan jarak jauh dan rute pegunungan?',
                'a' => 'Tentu. Seluruh driver Queen Transport telah melalui seleksi ketat, berpengalaman menangani berbagai rute, hafal jalur wisata pegunungan (seperti Bromo, Batu, Ijen), serta ramah dan mengutamakan keselamatan.',
            ],
            [
                'q' => 'Apakah bisa jemput langsung di Bandara Juanda atau Hotel di Surabaya?',
                'a' => 'Bisa sekali! Driver kami siap melakukan penjemputan di Bandara Internasional Juanda Surabaya, Stasiun Pasar Turi/Gubeng, hotel, maupun kediaman Anda di Surabaya dan Sidoarjo.',
            ],
            [
                'q' => 'Bagaimana cara pemesanan sewa mobil kelas atas?',
                'a' => 'Pemesanan sangat praktis via WhatsApp. Informasikan tanggal pemakaian, destinasi tujuan, serta tipe unit yang diinginkan. Tim CS kami siap melayani sepanjang hari.',
            ],
        ];
    }

    /**
     * Gather full data payload for luxury car rental Folio page.
     *
     * @return array{allArmadas: Collection<int, Armada>, pelanggans: Collection<int, Pelanggan>, kelasAtasPrices: array<int, mixed>, faqs: array<int, mixed>}
     */
    public function getKelasAtasPageData(): array
    {
        return [
            'allArmadas' => $this->getPublished(),
            'pelanggans' => $this->getPelanggans(),
            'kelasAtasPrices' => $this->getKelasAtasPrices(),
            'faqs' => $this->getKelasAtasFaqs(),
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
