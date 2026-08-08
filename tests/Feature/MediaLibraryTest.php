<?php

use App\Console\Commands\MediaLibrary\ImportExistingMedia;
use App\Filament\Resources\Armadas\Pages\CreateArmada;
use App\Filament\Resources\Attachments\Pages\CreateAttachment;
use App\Filament\Resources\Attachments\Pages\EditAttachment;
use App\Models\Armada;
use App\Models\Attachment;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

beforeEach(function () {
    Storage::fake('public');
});

test('admin can upload a file into the media library', function () {
    $admin = User::factory()->create(['email' => 'admin@queen-transport.com']);

    Livewire::actingAs($admin)
        ->test(CreateAttachment::class)
        ->fillForm([
            'upload' => [UploadedFile::fake()->image('foto-armada.jpg')],
            'title' => 'Foto Armada',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $attachment = Attachment::where('title', 'Foto Armada')->first();

    expect($attachment)->not->toBeNull();
    expect($attachment->getFirstMedia('file'))->not->toBeNull();
    Storage::disk('public')->assertExists($attachment->path);
});

test('admin can update media alt text without duplicating the file', function () {
    $admin = User::factory()->create(['email' => 'admin@queen-transport.com']);

    $attachment = Attachment::create(['title' => 'Foto Lama']);
    $attachment->addMedia(UploadedFile::fake()->image('lama.jpg'))->toMediaCollection('file');
    $originalMediaId = $attachment->getFirstMedia('file')->id;

    Livewire::actingAs($admin)
        ->test(EditAttachment::class, ['record' => $attachment->id])
        ->fillForm(['alt_text' => 'Deskripsi baru'])
        ->call('save')
        ->assertHasNoFormErrors();

    $attachment->refresh();

    expect($attachment->alt_text)->toBe('Deskripsi baru');
    expect($attachment->getFirstMedia('file')->id)->toBe($originalMediaId);
});

test('import command registers existing armada files as attachments without touching originals', function () {
    $path = Storage::disk('public')->putFileAs('armada', UploadedFile::fake()->image('existing.jpg'), 'existing.jpg');

    $armada = Armada::factory()->create(['title' => 'Alphard Lama', 'featured_image' => $path]);

    $this->artisan(ImportExistingMedia::class)->assertSuccessful();

    $attachment = Attachment::where('source_path', $path)->first();

    expect($attachment)->not->toBeNull();
    expect($attachment->getFirstMedia('file'))->not->toBeNull();

    Storage::disk('public')->assertExists($path);
    expect($armada->fresh()->featured_image)->toBe($path);
});

test('admin can reuse an existing media library file on a single-file field', function () {
    $admin = User::factory()->create(['email' => 'admin@queen-transport.com']);

    $attachment = Attachment::create(['title' => 'Foto Reuse']);
    $attachment->addMedia(UploadedFile::fake()->image('reuse.jpg'))->toMediaCollection('file');

    Livewire::actingAs($admin)
        ->test(CreateArmada::class)
        ->fillForm(['title' => 'Reuse Test', 'slug' => 'reuse-test'])
        ->mountFormComponentAction('featured_image', 'pickFromMediaLibrary_featured_image')
        ->setFormComponentActionData(['attachment_id' => $attachment->id])
        ->callMountedFormComponentAction()
        ->assertHasNoFormComponentActionErrors()
        ->call('create')
        ->assertHasNoFormErrors();

    $armada = Armada::where('slug', 'reuse-test')->first();

    expect($armada->featured_image)->not->toBeNull();
    expect($armada->featured_image)->not->toBe($attachment->path);
    Storage::disk('public')->assertExists($armada->featured_image);
    Storage::disk('public')->assertExists($attachment->path);
});

test('admin can add existing media library files into a gallery repeater', function () {
    $admin = User::factory()->create(['email' => 'admin@queen-transport.com']);

    $attachment = Attachment::create(['title' => 'Foto Galeri']);
    $attachment->addMedia(UploadedFile::fake()->image('galeri.jpg'))->toMediaCollection('file');

    Livewire::actingAs($admin)
        ->test(CreateArmada::class)
        ->fillForm(['title' => 'Reuse Gallery Test', 'slug' => 'reuse-gallery-test'])
        ->mountFormComponentAction('gallery', 'pickFromMediaLibraryRepeater_gallery')
        ->setFormComponentActionData(['attachment_ids' => [$attachment->id]])
        ->callMountedFormComponentAction()
        ->assertHasNoFormComponentActionErrors()
        ->call('create')
        ->assertHasNoFormErrors();

    $armada = Armada::where('slug', 'reuse-gallery-test')->first();

    expect($armada->gallery)->toHaveCount(1);
    Storage::disk('public')->assertExists($armada->gallery[0]);
});

test('import command does not import the same file twice', function () {
    $path = Storage::disk('public')->putFileAs('armada', UploadedFile::fake()->image('existing.jpg'), 'existing.jpg');
    Armada::factory()->create(['featured_image' => $path]);

    $this->artisan(ImportExistingMedia::class)->assertSuccessful();
    $this->artisan(ImportExistingMedia::class)->assertSuccessful();

    expect(Attachment::where('source_path', $path)->count())->toBe(1);
});
