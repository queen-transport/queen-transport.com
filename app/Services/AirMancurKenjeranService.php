<?php

namespace App\Services;

use App\Contracts\ArmadaServiceInterface;

class AirMancurKenjeranService
{
    public function __construct(
        protected ArmadaServiceInterface $armadaService
    ) {}

    /**
     * Get FAQs specific to Air Mancur Kenjeran & Surabaya East Coast Tour.
     *
     * @return array<int, array{q: string, a: string}>
     */
    public function getFaqs(): array
    {
        return [
            [
                'q' => 'Kapan jadwal pertunjukan Air Mancur Kenjeran (Air Mancur Menari Jembatan Suroboyo)?',
                'a' => 'Pertunjukan Air Mancur Menari di Jembatan Suroboyo Kenjeran secara umum berlangsung setiap akhir pekan (Sabtu & Minggu malam) mulai pukul 18.30 WIB hingga 21.00 WIB. Terdapat beberapa sesi atraksi menari dengan sorotan lampu sorot LED warna-warni yang diiringi musik khas Surabaya.',
            ],
            [
                'q' => 'Berapa harga tiket masuk untuk melihat Air Mancur Kenjeran?',
                'a' => 'Sore hingga malam hari di Jembatan Suroboyo Kenjeran tidak dikenakan biaya tiket masuk alias gratis untuk seluruh pengunjung. Pengunjung hanya perlu membayar biaya retribusi parkir jika membawa kendaraan pribadi.',
            ],
            [
                'q' => 'Mengapa disarankan menggunakan layanan rental mobil include driver dari Queen Transport?',
                'a' => 'Kawasan Kenjeran dan Jembatan Suroboyo sangat ramai pada malam akhir pekan. Dengan layanan rental mobil VIP Queen Transport, Anda tidak perlu pusing mencari lokasi parkir atau terjebak kemacetan. Driver kami akan mengantarkan Anda door-to-door hingga titik drop-off paling strategis.',
            ],
            [
                'q' => 'Destinasi wisata apa saja yang bisa dikunjungi di sekitar Air Mancur Kenjeran?',
                'a' => 'Anda bisa mengombinasikan kunjungan ke Air Mancur Kenjeran dengan Klenteng Sanggar Agung (Patung Guan Yin laut), Taman Suroboyo (Patung Ikan Suro & Boyo raksasa), Pantai Ria Kenjeran, hingga Sentra Ikan Bulak untuk wisata kuliner seafood.',
            ],
            [
                'q' => 'Pilihan mobil apa yang paling direkomendasikan untuk rombongan ke Kenjeran?',
                'a' => 'Untuk rombongan keluarga atau kantor (8–12 orang), Toyota Hiace Premio Luxury atau Captain Seat adalah pilihan terbaik. Sementara untuk tamu VIP (2–4 orang), Toyota Alphard Transformer atau All New Zenix Hybrid menawarkan kenyamanan kelas atas.',
            ],
            [
                'q' => 'Apakah sewa mobil di Queen Transport sudah termasuk BBM dan Sopir?',
                'a' => 'Ya, kami menyediakan paket sewa lengkap include armada steril, driver profesional yang ramah dan paham rute Surabaya, serta fasilitas buah segar, snack, dan air mineral gratis pada hari pertama sewa.',
            ],
        ];
    }

    /**
     * Gather full data payload for Air Mancur Kenjeran page.
     *
     * @return array<string, mixed>
     */
    public function getAirMancurKenjeranPageData(): array
    {
        return [
            'allArmadas' => $this->armadaService->getPublished(),
            'pelanggans' => $this->armadaService->getPelanggans(),
            'faqs' => $this->getFaqs(),
        ];
    }
}
