<?php

use App\Models\User;
use Laravel\Socialite\Contracts\Provider;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialiteUser;

test('it redirects to google oauth', function () {
    $provider = Mockery::mock(Provider::class);
    $provider->shouldReceive('redirect')
        ->once()
        ->andReturn(redirect('https://accounts.google.com/o/oauth2/auth'));

    Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

    $response = $this->get(route('auth.google'));

    $response->assertRedirect('https://accounts.google.com/o/oauth2/auth');
});

test('it logs in existing user and updates google details', function () {
    $user = User::factory()->create([
        'email' => 'pelanggan@example.com',
        'google_id' => null,
        'avatar' => null,
    ]);

    $googleUser = Mockery::mock(SocialiteUser::class);
    $googleUser->shouldReceive('getId')->andReturn('google-12345');
    $googleUser->shouldReceive('getEmail')->andReturn('pelanggan@example.com');
    $googleUser->shouldReceive('getName')->andReturn('Pelanggan Setia');
    $googleUser->shouldReceive('getAvatar')->andReturn('https://lh3.googleusercontent.com/avatar.jpg');

    $provider = Mockery::mock(Provider::class);
    $provider->shouldReceive('user')->once()->andReturn($googleUser);

    Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

    $response = $this->get(route('auth.google.callback'));

    $response->assertRedirect(route('dashboard'));
    $this->assertAuthenticatedAs($user);

    $user->refresh();
    expect($user->google_id)->toBe('google-12345');
    expect($user->avatar)->toBe('https://lh3.googleusercontent.com/avatar.jpg');
});

test('it registers and logs in a new user via google', function () {
    $googleUser = Mockery::mock(SocialiteUser::class);
    $googleUser->shouldReceive('getId')->andReturn('google-99999');
    $googleUser->shouldReceive('getEmail')->andReturn('newuser@example.com');
    $googleUser->shouldReceive('getName')->andReturn('Pengguna Baru');
    $googleUser->shouldReceive('getAvatar')->andReturn('https://lh3.googleusercontent.com/new.jpg');

    $provider = Mockery::mock(Provider::class);
    $provider->shouldReceive('user')->once()->andReturn($googleUser);

    Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

    $response = $this->get(route('auth.google.callback'));

    $response->assertRedirect(route('dashboard'));

    $user = User::where('email', 'newuser@example.com')->first();
    expect($user)->not->toBeNull();
    expect($user->name)->toBe('Pengguna Baru');
    expect($user->google_id)->toBe('google-99999');
    expect($user->avatar)->toBe('https://lh3.googleusercontent.com/new.jpg');
    expect($user->email_verified_at)->not->toBeNull();

    $this->assertAuthenticatedAs($user);
});

test('it handles google callback failure gracefully', function () {
    $provider = Mockery::mock(Provider::class);
    $provider->shouldReceive('user')->once()->andThrow(new Exception('OAuth token error'));

    Socialite::shouldReceive('driver')->with('google')->andReturn($provider);

    $response = $this->get(route('auth.google.callback'));

    $response->assertRedirect(route('login'));
    $response->assertSessionHas('status');
    $this->assertGuest();
});
