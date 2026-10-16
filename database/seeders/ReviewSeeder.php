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
                'status' => Review::STATUS_APPROVED,
            ],
            [
                'rating' => 5,
                'title' => 'Hiace Premio Terbaik untuk Rombongan Keluarga',
                'comment' => 'Kami sewa Hiace Premio untuk liburan keluarga ke Malang dan Bromo. Kabin sangat lega, AC dingin merata, dan driver sangat ramah serta hafal jalan alternatif. Pasti pesan di Queen Transport lagi.',
                'status' => Review::STATUS_APPROVED,
            ],
            [
                'rating' => 4,
                'title' => 'Innova Zenix Prima, Sangat Irit & Nyaman',
                'comment' => 'Unit Innova Zenix Hybrid sangat nyaman untuk perjalanan luar kota Surabaya - Solo. Suspensi empuk dan pelayanan admin sangat responsif saat pemesanan.',
                'status' => Review::STATUS_APPROVED,
            ],
            [
                'rating' => 5,
                'title' => 'Driver Profesional & Tepat Waktu',
                'comment' => 'Sangat terbantu untuk acara pernikahan saudara. Driver stand by lebih awal dari jadwal yang disepakati. Terima kasih banyak Queen Transport!',
                'status' => Review::STATUS_APPROVED,
            ],
            [
                'rating' => 5,
                'title' => 'Review Menunggu Moderasi',
                'comment' => 'Pengalaman menyewa mobil di Queen Transport sangat mudah dan transparan. Pelayanan memuaskan.',
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
