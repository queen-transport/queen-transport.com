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

test('allows duplicate slug for posts published at different times', function () {
    Post::factory()->create(['slug' => 'artikel-tanggal', 'published_at' => '2025-01-01']);

    Livewire::test(CreatePost::class)
        ->fillForm([
            'title' => 'Artikel Tanggal Lain',
            'slug' => 'artikel-tanggal',
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
