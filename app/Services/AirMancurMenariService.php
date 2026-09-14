<?php

namespace App\Services;

class AirMancurMenariService
{
    public function __construct(
        protected ArmadaService $armadaService
    ) {}

    /**
     * Get FAQs specific to Air Mancur Menari Surabaya & Perjalanan Mewah.
     *
     * @return array<int, array{q: string, a: string}>
     */
    public function getFaqs(): array
    {
        return [
            [
                'q' => 'Kapan jadwal pertunjukan Air Mancur Menari Jembatan Suroboyo berlangsung?',
                'a' => 'Pertunjukan Air Mancur Menari di Jembatan Suroboyo (Kenjeran) umumnya berlangsung setiap malam akhir pekan (Sabtu & Minggu) mulai pukul 18.30 WIB hingga 21.00 WIB dengan beberapa sesi pertunjukan warna-warni yang diiringi musik khas Surabaya.',
            ],
            [
                'q' => 'Mengapa disarankan menggunakan layanan rental mobil mewah VIP ke Jembatan Suroboyo?',
                'a' => 'Area Kenjeran dan Jembatan Suroboyo ramai dipadati pengunjung pada malam pertunjukan. Layanan VIP Queen Transport memastikan Anda tiba dengan nyaman tanpa pusing mencari tempat parkir, dijemput door-to-door dengan armada steril seperti Toyota Alphard atau Hiace Premio Luxury, dan didampingi driver yang siap menunggu.',
            ],
            [
                'q' => 'Pilihan armada apa saja yang paling direkomendasikan untuk paket Surabaya Night Tour ini?',
                'a' => 'Untuk pasangan atau tamu eksekutif (2-4 orang), Toyota Alphard Transformer atau All New Alphard Hybrid adalah pilihan utama. Untuk rombongan keluarga atau kolega bisnis (6-12 orang), Hiace Premio Luxury / Captain Seat memberikan kelapangan dan kenyamanan maksimal.',
            ],
            [
                'q' => 'Apakah paket perjalanan ini bisa disesuaikan (custom itinerary) dengan tempat kuliner malam di Surabaya?',
                'a' => 'Sangat bisa! Anda dapat mengombinasikan kunjungan ke Air Mancur Menari Jembatan Suroboyo dengan makan malam fine dining di Surabaya Pusat/Barat, menyusuri Kya-Kya Wisata Pecinan, hingga santai malam di Surabaya North Quay (SNQ).',
            ],
            [
                'q' => 'Apakah sewa armada di Queen Transport sudah termasuk fasilitas driver dan BBM?',
                'a' => 'Ya, kami menyediakan paket all-in (armada, pengemudi profesional, BBM, dan tol/parkir) sehingga Anda tinggal duduk manis menikmati pesona keindahan malam Kota Surabaya.',
            ],
            [
                'q' => 'Bagaimana cara reservasi paket perjalanan mewah Air Mancur Menari Surabaya?',
                'a' => 'Anda cukup mengklik tombol reservasi WhatsApp di situs ini, pilih armada favorit dan tanggal kunjungan. Customer service kami beroperasi sepanjang hari dan siap mengatur penjemputan dari lokasi manapun di Surabaya/Sidoarjo.',
            ],
        ];
    }

    /**
     * Gather full data payload for Air Mancur Menari Surabaya Folio page.
     *
     * @return array<string, mixed>
     */
    public function getAirMancurPageData(): array
    {
        return [
            'allArmadas' => $this->armadaService->getPublished(),
            'pelanggans' => $this->armadaService->getPelanggans(),
            'faqs' => $this->getFaqs(),
        ];
    }
}
