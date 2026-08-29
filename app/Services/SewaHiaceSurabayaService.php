<?php

namespace App\Services;

use App\Models\Armada;
use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Collection;

class SewaHiaceSurabayaService
{
    /**
     * Get published armada vehicles filtered by Hiace title or car type.
     *
     * @return Collection<int, Armada>
     */
    public function getHiaceArmadas(): Collection
    {
        return Armada::query()
            ->where('is_published', true)
            ->where(function ($query) {
                $query->where('title', 'like', '%hiace%')
                    ->orWhere('car_type', 'like', '%hiace%')
                    ->orWhere('slug', 'like', '%hiace%');
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
     * Get Hiace variant pricing structure.
     *
     * @return array<int, array{name: string, badge: string, seat: string, price: int, price_label: string, desc: string, features: array<int, string>}>
     */
    public function getHiacePrices(): array
    {
        return [
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
    }

    /**
     * Get FAQs specific to Hiace rental in Surabaya.
     *
     * @return array<int, array{q: string, a: string}>
     */
    public function getFaqs(): array
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
     * Gather all page data payload for presentation.
     *
     * @return array{hiaceArmadas: Collection<int, Armada>, allArmadas: Collection<int, Armada>, pelanggans: Collection<int, Pelanggan>, hiacePrices: array<int, array{name: string, badge: string, seat: string, price: int, price_label: string, desc: string, features: array<int, string>}>, faqs: array<int, array{q: string, a: string}>}
     */
    public function getData(): array
    {
        return [
            'hiaceArmadas' => $this->getHiaceArmadas(),
            'allArmadas' => $this->getAllArmadas(),
            'pelanggans' => $this->getPelanggans(),
            'hiacePrices' => $this->getHiacePrices(),
            'faqs' => $this->getFaqs(),
        ];
    }
}
