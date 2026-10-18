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
                'car_review' => 'Mobil Alphard sangat bersih, wangi, dan terawat. Interior mewah, AC dingin, dan kursi sangat nyaman.',
                'driver_review' => 'Driver sangat profesional, tepat waktu, berpenampilan rapi, dan ramah selama perjalanan.',
                'facilities_review' => 'Fasilitas lengkap, kondisi prima. Proses pemesanan mudah dan admin responsif.',
                'status' => Review::STATUS_APPROVED,
            ],
            [
                'rating' => 5,
                'car_review' => 'Kabin Hiace Premio sangat lega untuk rombongan 10 orang, AC merata ke seluruh penumpang.',
                'driver_review' => 'Driver hafal banyak rute alternatif, sabar, dan komunikatif sepanjang perjalanan.',
                'facilities_review' => 'Kualitas kendaraan sangat terjaga, fasilitas bersih dan nyaman selama perjalanan jauh.',
                'status' => Review::STATUS_APPROVED,
            ],
            [
                'rating' => 4,
                'car_review' => 'Innova Zenix Hybrid sangat irit dan suspensi empuk untuk perjalanan jarak jauh.',
                'driver_review' => 'Driver berpengalaman dan mengemudi dengan tenang, membuat penumpang nyaman.',
                'facilities_review' => 'Pelayanan admin sangat responsif saat pemesanan, proses booking mudah.',
                'status' => Review::STATUS_APPROVED,
            ],
            [
                'rating' => 5,
                'car_review' => 'Mobil tampil elegan dan bersih, sangat sesuai untuk acara pernikahan.',
                'driver_review' => 'Driver stand by lebih awal dari jadwal, berpenampilan rapi dan sopan selama acara.',
                'facilities_review' => 'Semua fasilitas berfungsi dengan baik, tidak ada kendala selama hari acara berlangsung.',
                'status' => Review::STATUS_APPROVED,
            ],
            [
                'rating' => 5,
                'car_review' => 'Unit kendaraan terawat dengan baik, bersih, dan harum.',
                'driver_review' => 'Sopir sangat ramah, santun, dan tiba tepat waktu sesuai jadwal.',
                'facilities_review' => 'Kemudahan proses booking dan transparansi harga sangat memuaskan.',
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
                    'car_review' => $reviewsData[$idx]['car_review'],
                    'driver_review' => $reviewsData[$idx]['driver_review'],
                    'facilities_review' => $reviewsData[$idx]['facilities_review'],
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
