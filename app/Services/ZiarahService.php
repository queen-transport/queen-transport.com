<?php

namespace App\Services;

class ZiarahService
{
    public function __construct(
        protected ArmadaService $armadaService
    ) {}

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
     * @return array<string, mixed>
     */
    public function getZiarahPageData(): array
    {
        return [
            'allArmadas' => $this->armadaService->getPublished(),
            'pelanggans' => $this->armadaService->getPelanggans(),
            'faqs' => $this->getZiarahFaqs(),
        ];
    }
}
