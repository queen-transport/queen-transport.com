<?php

namespace App\Console\Commands\MediaLibrary;

use App\Models\Armada;
use App\Models\Attachment;
use App\Models\Galeri;
use App\Models\Pelanggan;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

/**
 * One-time import of every file uploaded before the Media Library existed
 * (Armada/Galeri/Pelanggan/Post/Setting upload columns, including gallery
 * JSON arrays and inline RichEditor images) into an Attachment record, so
 * they show up in the Media Library and can be reused elsewhere.
 *
 * The original files/columns are left untouched — this only registers
 * copies inside the media library, it never moves or deletes anything.
 */
#[Signature('media:import-existing')]
#[Description('Import files uploaded before the Media Library existed so they are reusable in it')]
class ImportExistingMedia extends Command
{
    /** @var array<string, bool> */
    private array $imported = [];

    public function handle(): int
    {
        $this->imported = $this->alreadyImportedPaths();

        Armada::query()->each(function (Armada $armada): void {
            $this->importPath($armada->featured_image, "Armada: {$armada->title}");
            $this->importPath($armada->video, "Armada: {$armada->title} (video)");
            foreach ($armada->gallery as $path) {
                $this->importPath($path, "Armada: {$armada->title} (galeri)");
            }
        });

        Galeri::query()->each(function (Galeri $galeri): void {
            $this->importPath($galeri->featured_image, "Galeri: {$galeri->title}");
            $this->importPath($galeri->video, "Galeri: {$galeri->title} (video)");
            foreach (($galeri->gallery ?? []) as $path) {
                $this->importPath($path, "Galeri: {$galeri->title} (tambahan)");
            }
        });

        Pelanggan::query()->each(function (Pelanggan $pelanggan): void {
            $this->importPath($pelanggan->photo, "Pelanggan: {$pelanggan->name}");
        });

        Post::query()->each(function (Post $post): void {
            $this->importPath($post->featured_image, "Post: {$post->title}");
            $this->importPath($post->og_image, "Post: {$post->title} (OG image)");

            foreach ($this->extractStoragePaths((string) $post->content) as $path) {
                $this->importPath($path, "Post: {$post->title} (konten)");
            }
        });

        $setting = Setting::current();
        $this->importPath($setting->hero_video, 'Setting: Video Hero');
        $this->importPath($setting->perawatan_video, 'Setting: Video Perawatan Rutin');

        $this->info('Selesai. '.count($this->imported).' file terdaftar di Media Library.');

        return self::SUCCESS;
    }

    /**
     * @return array<string, bool>
     */
    private function alreadyImportedPaths(): array
    {
        return Attachment::query()
            ->whereNotNull('source_path')
            ->pluck('source_path')
            ->mapWithKeys(fn (string $path) => [$path => true])
            ->all();
    }

    private function importPath(?string $path, string $label): void
    {
        if (blank($path)) {
            return;
        }

        if (isset($this->imported[$path])) {
            return;
        }

        if (! Storage::disk('public')->exists($path)) {
            $this->warn("Lewati (file tidak ditemukan): {$path}");

            return;
        }

        $attachment = Attachment::create(['title' => $label, 'source_path' => $path]);
        $attachment->addMediaFromDisk($path, 'public')
            ->preservingOriginal()
            ->toMediaCollection('file');

        $this->imported[$path] = true;

        $this->line("Diimpor: {$path}");
    }

    /**
     * @return array<int, string>
     */
    private function extractStoragePaths(string $html): array
    {
        if (! preg_match_all('/\/storage\/([^"\'\s)]+)/', $html, $matches)) {
            return [];
        }

        return array_values(array_unique(array_map(
            fn (string $path) => urldecode($path),
            $matches[1],
        )));
    }
}
