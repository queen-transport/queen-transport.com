<?php

use App\Models\Armada;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

test('ReviewPolicy allows owner to update and delete within 24 hours', function () {
    $owner = User::factory()->create();
    $review = Review::factory()->create([
        'user_id' => $owner->id,
        'created_at' => now()->subHours(2),
    ]);

    expect(Gate::forUser($owner)->allows('update', $review))->toBeTrue();
    expect(Gate::forUser($owner)->allows('delete', $review))->toBeTrue();
});

test('ReviewPolicy denies owner update and delete after 24 hours', function () {
    $owner = User::factory()->create();
    $review = Review::factory()->create([
        'user_id' => $owner->id,
        'created_at' => now()->subHours(25),
    ]);

    expect(Gate::forUser($owner)->denies('update', $review))->toBeTrue();
    expect(Gate::forUser($owner)->denies('delete', $review))->toBeTrue();
});

test('ReviewPolicy denies non-owner from updating or deleting review', function () {
    $owner = User::factory()->create();
    $stranger = User::factory()->create();
    $review = Review::factory()->create([
        'user_id' => $owner->id,
        'created_at' => now()->subHours(2),
    ]);

    expect(Gate::forUser($stranger)->denies('update', $review))->toBeTrue();
    expect(Gate::forUser($stranger)->denies('delete', $review))->toBeTrue();
});

test('ReviewPolicy allows admin to update and delete review anytime', function () {
    $admin = User::factory()->create(['email' => 'admin@queen-transport.com']);
    $user = User::factory()->create();
    $oldReview = Review::factory()->create([
        'user_id' => $user->id,
        'created_at' => now()->subDays(10),
    ]);

    expect(Gate::forUser($admin)->allows('update', $oldReview))->toBeTrue();
    expect(Gate::forUser($admin)->allows('delete', $oldReview))->toBeTrue();
    expect(Gate::forUser($admin)->allows('approve', $oldReview))->toBeTrue();
    expect(Gate::forUser($admin)->allows('reject', $oldReview))->toBeTrue();
    expect(Gate::forUser($admin)->allows('adminCreate', Review::class))->toBeTrue();
});

test('ReviewPolicy denies non-admin from approving, rejecting, or adminCreating reviews', function () {
    $user = User::factory()->create();
    $review = Review::factory()->pending()->create();

    expect(Gate::forUser($user)->denies('approve', $review))->toBeTrue();
    expect(Gate::forUser($user)->denies('reject', $review))->toBeTrue();
    expect(Gate::forUser($user)->denies('adminCreate', Review::class))->toBeTrue();
});

test('ArmadaPolicy allows public to view and restricts mutations to admin', function () {
    $admin = User::factory()->create(['email' => 'admin@queen-transport.com']);
    $user = User::factory()->create();
    $armada = Armada::factory()->create();

    expect(Gate::forUser($user)->allows('viewAny', Armada::class))->toBeTrue();
    expect(Gate::forUser($user)->allows('view', $armada))->toBeTrue();

    expect(Gate::forUser($user)->denies('create', Armada::class))->toBeTrue();
    expect(Gate::forUser($user)->denies('update', $armada))->toBeTrue();
    expect(Gate::forUser($user)->denies('delete', $armada))->toBeTrue();

    expect(Gate::forUser($admin)->allows('create', Armada::class))->toBeTrue();
    expect(Gate::forUser($admin)->allows('update', $armada))->toBeTrue();
    expect(Gate::forUser($admin)->allows('delete', $armada))->toBeTrue();
});

test('UserPolicy restricts user management to appropriate owners and admin', function () {
    $admin = User::factory()->create(['email' => 'admin@queen-transport.com']);
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();

    expect(Gate::forUser($admin)->allows('viewAny', User::class))->toBeTrue();
    expect(Gate::forUser($user1)->denies('viewAny', User::class))->toBeTrue();

    expect(Gate::forUser($user1)->allows('view', $user1))->toBeTrue();
    expect(Gate::forUser($user1)->allows('update', $user1))->toBeTrue();
    expect(Gate::forUser($user1)->denies('view', $user2))->toBeTrue();
    expect(Gate::forUser($user1)->denies('update', $user2))->toBeTrue();

    expect(Gate::forUser($admin)->allows('delete', $user1))->toBeTrue();
    expect(Gate::forUser($admin)->denies('delete', $admin))->toBeTrue();
});
