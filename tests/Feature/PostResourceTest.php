<?php

use App\Filament\Resources\Posts\Pages\CreatePost;
use App\Filament\Resources\Posts\Pages\EditPost;
use App\Models\Post;
use App\Models\User;
use Filament\Actions\Testing\TestAction;
use Livewire\Livewire;

beforeEach(function () {
    $this->actingAs(User::factory()->create(['email' => 'admin@queen-transport.com']));
});

test('plain permalink slug must be unique', function () {
    Post::factory()->plainPermalink()->create(['slug' => 'artikel-unik']);

    Livewire::test(CreatePost::class)
        ->fillForm([
            'title' => 'Artikel Baru',
            'slug' => 'artikel-unik',
            'permalink_type' => 'plain',
            'status' => 'draft',
        ])
        ->call('create')
        ->assertHasFormErrors(['slug' => 'unique']);
});

test('date permalink allows duplicate slug', function () {
    Post::factory()->create(['slug' => 'artikel-tanggal', 'published_at' => '2025-01-01']);

    Livewire::test(CreatePost::class)
        ->fillForm([
            'title' => 'Artikel Tanggal Lain',
            'slug' => 'artikel-tanggal',
            'permalink_type' => 'date',
            'status' => 'draft',
        ])
        ->call('create')
        ->assertHasNoFormErrors();
});

test('slug is locked by default when editing a post and unlocks via the edit slug action', function () {
    $post = Post::factory()->create(['slug' => 'artikel-terkunci']);

    Livewire::test(EditPost::class, ['record' => $post->getRouteKey()])
        ->assertFormFieldDisabled('slug')
        ->assertActionVisible(TestAction::make('unlockSlug')->schemaComponent('slug'))
        ->callAction(TestAction::make('unlockSlug')->schemaComponent('slug'))
        ->assertFormFieldEnabled('slug')
        ->assertActionHidden(TestAction::make('unlockSlug')->schemaComponent('slug'));
});

test('slug is editable on the create page', function () {
    Livewire::test(CreatePost::class)
        ->assertFormFieldEnabled('slug');
});

test('editing a plain permalink post ignores its own slug in the unique check', function () {
    $post = Post::factory()->plainPermalink()->create(['slug' => 'artikel-edit']);

    Livewire::test(EditPost::class, ['record' => $post->getRouteKey()])
        ->fillForm([
            'slug' => 'artikel-edit',
            'permalink_type' => 'plain',
        ])
        ->call('save')
        ->assertHasNoFormErrors();
});
