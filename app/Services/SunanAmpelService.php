<?php

namespace App\Services;

use App\Contracts\ArmadaServiceInterface;

class SunanAmpelService
{
    public function __construct(
        protected ArmadaServiceInterface $armadaService
    ) {}

    /**
     * Get FAQs specific to Makam Sunan Ampel & Keistimewaan.
     *
     * @return array<int, array{q: string, a: string}>
     */
    public function getSunanAmpelFaqs(): array
    {
        return [
            [
                'q' => 'Apa keistimewaan utama Makam Sunan Ampel dibanding makam penyebar Islam lainnya?',
                'a' => 'Makam Sunan Ampel memiliki keistimewaan sebagai kompleks pemakaman tokoh utama pembina para Wali Songo. Makam Raden Rahmat terlindung oleh pagar ukir bersejarah dan dikelilingi makam tokoh-tokoh fenomenal seperti Mbah Sholeh (yang terkenal dengan 9 nisan makamnya) dan Mbah Bolong (ahli kiblat), serta sumur peninggalan berkah abad ke-15 yang airnya jernih mirip air Zam-Zam.',
            ],
            [
                'q' => 'Dimana lokasi persis posisi Makam Sunan Ampel di dalam kompleks?',
                'a' => 'Makam Sunan Ampel (Raden Rahmat) terletak di sebelah barat Masjid Agung Ampel, Kota Surabaya. Posisi makam beliau berada di pelataran halaman barat masjid, berdampingan langsung dengan makam istri beliau, Dewi Candrawati (Nyai Ageng Manila).',
            ],
            [
                'q' => 'Mengapa di kompleks Makam Sunan Ampel terdapat 9 nisan makam Mbah Sholeh?',
                'a' => 'Mbah Sholeh adalah murid Sunan Ampel yang bertugas merawat kebersihan Masjid Ampel. Dikisahkan setiap kali Mbah Sholeh wafat, Sunan Ampel berangan-angan memiliki pembersih masjid seperti Mbah Sholeh. Atas izin Allah, Mbah Sholeh hidup kembali hingga 9 kali wafat berturut-turut, sehingga tercipta 9 deretan nisan makam Mbah Sholeh di kompleks makam tersebut.',
            ],
            [
                'q' => 'Apakah kawasan Makam Sunan Ampel buka sepanjang hari untuk peziarah?',
                'a' => 'Ya, Kompleks Makam Sunan Ampel terbuka sepanjang hari nonstop setiap hari. Peziarah dapat melakukan ibadah shalat, membaca Yasin, Tahlil, serta iktikaf kapan saja.',
            ],
            [
                'q' => 'Bagaimana akses parkir kendaraan dan rombongan sewa Hiace / Bus ke Makam Sunan Ampel?',
                'a' => 'Untuk kendaraan jenis MPV, SUV, dan Van Toyota Hiace tersedia kantong parkir Pegirian & Nyamplungan yang sangat dekat dengan pintu masuk makam. Untuk bus besar rombongan disediakan Terminal Bus Pegirian. Driver Queen Transport akan mengantarkan rombongan hingga titik drop-off terdekat.',
            ],
            [
                'q' => 'Apakah Queen Transport menyediakan armada rental khusus untuk Ziarah Sunan Ampel?',
                'a' => 'Ya, Queen Transport menyediakan armada sewa Avanza, Innova Reborn/Zenix, Toyota Hiace Commuter/Premio, hingga Bus Pariwisata include driver yang sangat berpengalaman memandu rute dan parkir kawasan Ziarah Ampel & Wali Songo Jatim.',
            ],
        ];
    }

    /**
     * Gather full data payload for Sunan Ampel Keistimewaan page.
     *
     * @return array<string, mixed>
     */
    public function getSunanAmpelPageData(): array
    {
        return [
            'allArmadas' => $this->armadaService->getPublished(),
            'pelanggans' => $this->armadaService->getPelanggans(),
            'faqs' => $this->getSunanAmpelFaqs(),
        ];
    }
}
