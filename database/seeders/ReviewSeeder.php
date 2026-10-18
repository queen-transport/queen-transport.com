<?php

namespace Database\Seeders;

use App\Models\Armada;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $armadas = Armada::all();

        $sampleUsers = [
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@example.com',
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti.nurhaliza@example.com',
            ],
            [
                'name' => 'Hendro Wijaya',
                'email' => 'hendro.wijaya@example.com',
            ],
            [
                'name' => 'Rina Kartika',
                'email' => 'rina.kartika@example.com',
            ],
            [
                'name' => 'Ahmad Fauzi',
                'email' => 'ahmad.fauzi@example.com',
            ],
        ];

        $reviewsData = [
            [
                'rating' => 5,
                'title' => 'Layanan Alphard Sangat Nyaman & Memuaskan',
                'comment' => 'Sewa Alphard untuk tamu VIP kantor dari Bandara Juanda ke hotel. Driver sangat tepat waktu, rapi, dan mengemudi dengan sangat halus. Mobil wangi dan bersih sekali. Sangat direkomendasikan!',
                'car_review' => 'Mobil Alphard sangat bersih, wangi, dan terawat. Interior mewah, AC dingin, dan kursi sangat nyaman.',
                'driver_review' => 'Driver sangat profesional, tepat waktu, berpenampilan rapi, dan ramah selama perjalanan.',
                'facilities_review' => 'Fasilitas lengkap, kondisi prima. Proses pemesanan mudah dan admin responsif.',
                'status' => Review::STATUS_APPROVED,
            ],
            [
                'rating' => 5,
                'title' => 'Hiace Premio Terbaik untuk Rombongan Keluarga',
                'comment' => 'Kami sewa Hiace Premio untuk liburan keluarga ke Malang dan Bromo. Kabin sangat lega, AC dingin merata, dan driver sangat ramah serta hafal jalan alternatif. Pasti pesan di Queen Transport lagi.',
                'car_review' => 'Kabin Hiace Premio sangat lega untuk rombongan 10 orang, AC merata ke seluruh penumpang.',
                'driver_review' => 'Driver hafal banyak rute alternatif, sabar, dan komunikatif sepanjang perjalanan.',
                'facilities_review' => 'Kualitas kendaraan sangat terjaga, fasilitas bersih dan nyaman selama perjalanan jauh.',
                'status' => Review::STATUS_APPROVED,
            ],
            [
                'rating' => 4,
                'title' => 'Innova Zenix Prima, Sangat Irit & Nyaman',
                'comment' => 'Unit Innova Zenix Hybrid sangat nyaman untuk perjalanan luar kota Surabaya - Solo. Suspensi empuk dan pelayanan admin sangat responsif saat pemesanan.',
                'car_review' => 'Innova Zenix Hybrid sangat irit dan suspensi empuk untuk perjalanan jarak jauh.',
                'driver_review' => 'Driver berpengalaman dan mengemudi dengan tenang, membuat penumpang nyaman.',
                'facilities_review' => 'Pelayanan admin sangat responsif saat pemesanan, proses booking mudah.',
                'status' => Review::STATUS_APPROVED,
            ],
            [
                'rating' => 5,
                'title' => 'Driver Profesional & Tepat Waktu',
                'comment' => 'Sangat terbantu untuk acara pernikahan saudara. Driver stand by lebih awal dari jadwal yang disepakati. Terima kasih banyak Queen Transport!',
                'car_review' => 'Mobil tampil elegan dan bersih, sangat sesuai untuk acara pernikahan.',
                'driver_review' => 'Driver stand by lebih awal dari jadwal, berpenampilan rapi dan sopan selama acara.',
                'facilities_review' => 'Semua fasilitas berfungsi dengan baik, tidak ada kendala selama hari acara berlangsung.',
                'status' => Review::STATUS_APPROVED,
            ],
            [
                'rating' => 5,
                'title' => 'Review Menunggu Moderasi',
                'comment' => 'Pengalaman menyewa mobil di Queen Transport sangat mudah dan transparan. Pelayanan memuaskan.',
                'car_review' => null,
                'driver_review' => null,
                'facilities_review' => null,
                'status' => Review::STATUS_PENDING,
            ],
        ];

        foreach ($sampleUsers as $idx => $userData) {
            $user = User::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => bcrypt('password123'),
                    'email_verified_at' => now(),
                ]
            );

            if (isset($reviewsData[$idx])) {
                $review = Review::create([
                    'user_id' => $user->id,
                    'rating' => $reviewsData[$idx]['rating'],
                    'title' => $reviewsData[$idx]['title'],
                    'comment' => $reviewsData[$idx]['comment'],
                    'car_review' => $reviewsData[$idx]['car_review'] ?? null,
                    'driver_review' => $reviewsData[$idx]['driver_review'] ?? null,
                    'facilities_review' => $reviewsData[$idx]['facilities_review'] ?? null,
                    'status' => $reviewsData[$idx]['status'],
                    'created_by_admin' => false,
                ]);

                if ($armadas->isNotEmpty()) {
                    // Attach to 1 or 2 armadas
                    $relatedArmada = $armadas->random(min(2, $armadas->count()));
                    $review->armadas()->sync($relatedArmada->pluck('id'));
                }
            }
        }
    }
}
