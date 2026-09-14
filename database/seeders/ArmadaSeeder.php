<?php

namespace Database\Seeders;

use App\Models\Armada;
use Illuminate\Database\Seeder;

class ArmadaSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $armadas = [
            [
                'title' => 'All New Alphard HEV (Gen 4)',
                'slug' => 'all-new-alphard-hev',
                'car_type' => '6 VIP Seat',
                'car_badge' => 'Flagship VVIP',
                'car_icon' => '👑',
                'price' => 3800000,
                'features' => ['Executive Lounge Seats + Heater/Cooler', 'JBL Premium Sound & Wireless Charger', 'Performa Hybrid Senyap & Ramah Lingkungan', 'Driver Standar Protokol VVIP', 'Free Premium Amenities & Beverages'],
                'description' => 'Puncak kemewahan MPV flagship Toyota paling gres. Teknologi Hybrid super senyap, Executive Lounge Seats, dan fitur kenyamanan VVIP kelas atas.',
                'cta_text' => 'Tanya Harga via WhatsApp',
                'sort' => 1,
                'is_published' => true,
            ],
            [
                'title' => 'Alphard Transformer (Gen 3)',
                'slug' => 'alphard-transformer',
                'car_type' => '6 VIP Seat',
                'car_badge' => 'Paling Populer',
                'car_icon' => '👑',
                'price' => 2800000,
                'features' => ['6 First-Class Captain Seats', 'Dual Sunroof & Ambience Light', 'Smart TV / Entertainment System', 'Driver Professional Uniform', 'Free Snack, Buah & Air Mineral'],
                'description' => 'Desain grille Transformer yang ikonik dan gagah, interior super mewah dilengkapi Dual Sunroof, Rear Entertainment, dan suspensi sangat empuk.',
                'cta_text' => 'Tanya Harga via WhatsApp',
                'sort' => 2,
                'is_published' => true,
            ],
            [
                'title' => 'Hiace Premio Luxury',
                'slug' => 'hiace-premio-luxury',
                'car_type' => '9 VIP Seat',
                'car_badge' => 'VIP & Executive',
                'car_icon' => '🚐',
                'price' => 2850000,
                'features' => ['9 VIP Captain Seats', 'Kulit Premium & Legrest', 'Smart TV & Sound System', 'Ambience Light & Meja', 'Free Snack, Buah & Drink'],
                'description' => 'Kemewahan kelas atas dengan Captain Seat jok kulit, entertainment TV, meja lipat, dan suasana kabin privat super VIP.',
                'cta_text' => 'Tanya Harga via WhatsApp',
                'sort' => 3,
                'is_published' => true,
            ],
            [
                'title' => 'Fortuner New Legend',
                'slug' => 'fortuner-new-legend',
                'car_type' => '7 Seat',
                'car_badge' => 'SUV Premium',
                'car_icon' => '🚙',
                'price' => 2550000,
                'features' => ['Ground Clearance Tinggi', 'Interior Kulit Exclusive', 'Audio JBL & Dual AC', 'Driver Berpengalaman', 'Free Air Mineral'],
                'description' => 'SUV gagah dan tangguh untuk rute pegunungan, kunjungan proyek, serta perjalanan dinas eksekutif.',
                'cta_text' => 'Tanya Harga via WhatsApp',
                'sort' => 4,
                'is_published' => true,
            ],
            [
                'title' => 'Fortuner Type GR',
                'slug' => 'fortuner-type-gr',
                'car_type' => '7 Seat',
                'car_badge' => 'Sporty SUV',
                'car_icon' => '🚙',
                'price' => 2300000,
                'features' => ['Desain GR Sporty', 'Kabin Senyap & Nyaman', 'Performa Tangguh', 'Driver Berpengalaman', 'Free Air Mineral'],
                'description' => 'SUV gaya sporty berkelas dengan kenyamanan maksimal untuk segala medan jalan.',
                'cta_text' => 'Tanya Harga via WhatsApp',
                'sort' => 5,
                'is_published' => true,
            ],
            [
                'title' => 'Zenix Type Q Hybrid',
                'slug' => 'zenix-type-q-hybrid',
                'car_type' => '7 Seat',
                'car_badge' => 'Modern Hybrid',
                'car_icon' => '🚘',
                'price' => 2250000,
                'features' => ['Captain Seat + Ottoman Legrest', 'Mesin Hybrid Senyap & Nyaman', 'Panoramic Sunroof & Dual Screen', 'Driver Ramah & Profesional', 'Free Air Mineral'],
                'description' => 'MPV generasi terbaru mesin Hybrid ramah lingkungan dengan Panoramic Sunroof dan Captain Seat Ottoman.',
                'cta_text' => 'Tanya Harga via WhatsApp',
                'sort' => 6,
                'is_published' => true,
            ],
            [
                'title' => 'Alphard Gen 2 / Facelift',
                'slug' => 'alphard-gen-2-facelift',
                'car_type' => '6-7 Seat VIP',
                'car_badge' => 'Pilihan Ekonomis VIP',
                'car_icon' => '👑',
                'price' => 2200000,
                'features' => ['6 VIP Captain Seats', 'Full AC Climate Control', 'Jok Kulit Soft Touch', 'Driver Berpengalaman', 'Free Snack & Air Mineral'],
                'description' => 'Tampilan tetap berkelas dengan kenyamanan kabin mewah, ideal untuk operasional dinas instansi atau tamu VIP.',
                'cta_text' => 'Tanya Harga via WhatsApp',
                'sort' => 7,
                'is_published' => true,
            ],
            [
                'title' => 'Hiace Premio Standard',
                'slug' => 'hiace-premio-standard',
                'car_type' => '14 Seat',
                'car_badge' => 'Kenyamanan Ekstra',
                'car_icon' => '🚐',
                'price' => 1850000,
                'features' => ['14 Reclining Seats Premium', 'Kabin Lebih Senyap', 'Full AC Double Blower', 'Driver Berpengalaman', 'Free Snack & Air Mineral'],
                'description' => 'Desain modern semi-bonnet dengan tingkat peredaman kabin yang lebih tinggi dan suspensi ekstra empuk.',
                'cta_text' => 'Tanya Harga via WhatsApp',
                'sort' => 8,
                'is_published' => true,
            ],
            [
                'title' => 'Zenix Type G Hybrid',
                'slug' => 'zenix-type-g-hybrid',
                'car_type' => '7 Seat',
                'car_badge' => 'Hybrid MPV',
                'car_icon' => '🚘',
                'price' => 1850000,
                'features' => ['Mesin Hybrid Senyap & Hemat', 'Kabin Luas & Leger', 'AC Triple Zone', 'Driver Profesional', 'Free Air Mineral'],
                'description' => 'Innova Zenix mesin Hybrid generasi terbaru, sangat nyaman dan senyap untuk keluarga maupun bisnis.',
                'cta_text' => 'Tanya Harga via WhatsApp',
                'sort' => 9,
                'is_published' => true,
            ],
            [
                'title' => 'Hiace Commuter',
                'slug' => 'hiace-commuter',
                'car_type' => '14 Seat',
                'car_badge' => 'Paling Populer',
                'car_icon' => '🚐',
                'price' => 1700000,
                'features' => ['14 Reclining Seats', 'Full AC Per-Head', 'Audio & USB Charger', 'Driver Profesional', 'Free Snack & Air Mineral'],
                'description' => 'Pilihan ideal untuk rombongan wisata, kunjungan dinas, atau acara keluarga dengan kapasitas lega dan hemat biaya.',
                'cta_text' => 'Tanya Harga via WhatsApp',
                'sort' => 10,
                'is_published' => true,
            ],
            [
                'title' => 'Innova Reborn',
                'slug' => 'innova-reborn',
                'car_type' => '7 Seat',
                'car_badge' => 'Favorit Keluarga',
                'car_icon' => '🚗',
                'price' => 1450000,
                'features' => ['7 Reclining Seats', 'Full AC Double Blower', 'Suspensi Empuk & Leger', 'Driver Ramah & Sopan', 'Free Air Mineral'],
                'description' => 'MPV legendaris yang sangat nyaman, handal, dan bertenaga untuk perjalanan dalam dan luar kota.',
                'cta_text' => 'Tanya Harga via WhatsApp',
                'sort' => 11,
                'is_published' => true,
            ],
        ];

        foreach ($armadas as $data) {
            Armada::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
