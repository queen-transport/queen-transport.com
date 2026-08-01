<?php

use App\Models\Armada;
use App\Models\Galeri;
use App\Models\Pelanggan;
use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
});

test('deleting a post removes its featured image and og image from storage', function () {
    $featuredImage = UploadedFile::fake()->image('featured.jpg')->store('blog', 'public');
    $ogImage = UploadedFile::fake()->image('og.jpg')->store('blog/og', 'public');

    $post = Post::factory()->create([
        'featured_image' => $featuredImage,
        'og_image' => $ogImage,
    ]);

    $post->delete();

    Storage::disk('public')->assertMissing($featuredImage);
    Storage::disk('public')->assertMissing($ogImage);
});

test('deleting an armada removes its featured image, video, and gallery files from storage', function () {
    $featuredImage = UploadedFile::fake()->image('featured.jpg')->store('armada', 'public');
    $video = UploadedFile::fake()->create('video.mp4')->store('armada/video', 'public');
    $galleryImage = UploadedFile::fake()->image('gallery.jpg')->store('armada/gallery', 'public');

    $armada = Armada::factory()->create([
        'featured_image' => $featuredImage,
        'video' => $video,
        'gallery' => [$galleryImage],
    ]);

    $armada->delete();

    Storage::disk('public')->assertMissing($featuredImage);
    Storage::disk('public')->assertMissing($video);
    Storage::disk('public')->assertMissing($galleryImage);
});

test('deleting a galeri removes its featured image, video, and gallery files from storage', function () {
    $featuredImage = UploadedFile::fake()->image('featured.jpg')->store('galeri', 'public');
    $video = UploadedFile::fake()->create('video.mp4')->store('galeri/video', 'public');
    $galleryImage = UploadedFile::fake()->image('gallery.jpg')->store('galeri/extra', 'public');

    $galeri = Galeri::factory()->create([
        'featured_image' => $featuredImage,
        'video' => $video,
        'gallery' => [$galleryImage],
    ]);

    $galeri->delete();

    Storage::disk('public')->assertMissing($featuredImage);
    Storage::disk('public')->assertMissing($video);
    Storage::disk('public')->assertMissing($galleryImage);
});

test('deleting a pelanggan removes its photo from storage', function () {
    $photo = UploadedFile::fake()->image('photo.jpg')->store('pelanggan', 'public');

    $pelanggan = Pelanggan::factory()->create([
        'photo' => $photo,
    ]);

    $pelanggan->delete();

    Storage::disk('public')->assertMissing($photo);
});
