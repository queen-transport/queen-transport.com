<?php

namespace App\Services;

use App\Models\Armada;
use App\Models\Galeri;
use App\Models\Pelanggan;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Response;

class BaseService
{
    /**
     * Get data payload for the main landing page.
     *
     * @return array<string, mixed>
     */
    public function getDataForLandingPage(): array
    {
        $setting = Setting::current();

        $armadas = Armada::query()
            ->where('is_published', true)
            ->orderBy('sort')
            ->orderBy('title')
            ->get();

        $galleries = Galeri::query()
            ->where('is_published', true)
            ->orderBy('sort')
            ->limit(7)
            ->get();

        $pelanggans = Pelanggan::query()
            ->where('is_published', true)
            ->orderBy('sort')
            ->get();

        $posts = Post::query()
            ->published()
            ->with('category')
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();

        $dbArmadasWithPrice = Armada::query()
            ->where('is_published', true)
            ->whereNotNull('price')
            ->orderBy('sort')
            ->orderBy('title')
            ->get();

        if ($dbArmadasWithPrice->isNotEmpty()) {
            logger()->info('Data armada ditemukan sehingga menggunakan data dari armada');
            $priceList = $dbArmadasWithPrice->map(function (Armada $armada) {
                return [
                    'name' => $armada->title,
                    'seat' => $armada->car_type ?: '6-7 Seat',
                    'price' => $armada->price,
                ];
            })->toArray();
        } else {
            logger()->info('Data armada tidak ditemukan sehingga menggunakan data secara hardcore');
            $priceList = [
                ['name' => 'Alphard Type HV', 'seat' => '6 Seat', 'price' => 3950000],
                ['name' => 'Alphard Type FL (Facelift)', 'seat' => '6 Seat', 'price' => 2950000],
                ['name' => 'Hiace Premio Luxury', 'seat' => '9 Seat', 'price' => 2850000],
                ['name' => 'Fortuner New Legend', 'seat' => '7 Seat', 'price' => 2550000],
                ['name' => 'Fortuner Type GR', 'seat' => '7 Seat', 'price' => 2300000],
                ['name' => 'Zenix Type Q Hybrid', 'seat' => '7 Seat', 'price' => 2250000],
                ['name' => 'Hiace Premio Standard', 'seat' => '14 Seat', 'price' => 1850000],
                ['name' => 'Zenix Type G Hybrid', 'seat' => '7 Seat', 'price' => 1850000],
                ['name' => 'Hiace Commuter', 'seat' => '14 Seat', 'price' => 1700000],
                ['name' => 'Innova Reborn', 'seat' => '7 Seat', 'price' => 1450000],
            ];
        }

        $faqs = [
            ['q' => 'Berapa tarif sewa mobil per hari?', 'a' => 'Tarif sewa bervariasi tergantung jenis armada dan durasi perjalanan. Silakan hubungi kami via WhatsApp untuk mendapatkan penawaran harga terbaik yang sesuai kebutuhan Anda.'],
            ['q' => 'Apakah sewa sudah termasuk driver?', 'a' => 'Ya, semua paket sewa sudah termasuk driver profesional berpengalaman. Driver kami ramah, tepat waktu, dan akrab dengan rute di Jawa Timur.'],
            ['q' => 'Kota mana saja yang dilayani?', 'a' => 'Kami melayani perjalanan ke seluruh wilayah Jawa Timur, termasuk Surabaya, Malang, Batu, Lumajang, Banyuwangi, Jember, Madiun, dan kota-kota lainnya.'],
            ['q' => 'Apakah bisa pesan mobil mendadak atau di luar jam kerja?', 'a' => 'Tentu bisa. Kami beroperasi sepanjang hari, 7 hari seminggu termasuk hari libur. Anda bisa menghubungi kami kapan saja melalui WhatsApp.'],
            ['q' => 'Apa bonus yang didapat di hari pertama sewa?', 'a' => 'Di hari pertama sewa, kami menyediakan buah-buahan segar, aneka camilan, dan air mineral gratis di dalam kendaraan sebagai bentuk apresiasi kepercayaan Anda.'],
            ['q' => 'Bagaimana cara melakukan pemesanan?', 'a' => 'Pemesanan dilakukan melalui WhatsApp. Cukup klik tombol "Pesan Sekarang" atau "Chat WhatsApp", lalu sampaikan kebutuhan perjalanan Anda dan tim kami akan segera merespons.'],
        ];

        return compact('setting', 'armadas', 'galleries', 'pelanggans', 'posts', 'priceList', 'faqs');
    }

    public function getSitemap(): Response
    {
        $armadas = Armada::query()
            ->where('is_published', true)
            ->get();

        $posts = Post::published()->get();

        $xml = view('sitemap', [
            'armadas' => $armadas,
            'posts' => $posts,
        ])->render();

        return response($xml, 200)->header('Content-Type', 'text/xml');
    }
}

