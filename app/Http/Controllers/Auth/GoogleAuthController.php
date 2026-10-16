<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\GoogleProvider;
use Throwable;

class GoogleAuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirect(): RedirectResponse
    {
        logger()->info('Initiating Google OAuth redirect');

        /** @var GoogleProvider $driver */
        $driver = Socialite::driver('google');

        return $driver->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function callback(): RedirectResponse
    {
        logger()->info('Processing Google OAuth callback');

        try {
            /** @var \Laravel\Socialite\Two\User $googleUser */
            $googleUser = Socialite::driver('google')->user();
        } catch (Throwable $e) {
            logger()->error('Google OAuth callback failed', [
                'error' => $e->getMessage(),
            ]);

            return redirect()->route('login')->with('status', 'Gagal masuk dengan Google. Silakan coba kembali.');
        }

        $email = $googleUser->getEmail();
        if (blank($email)) {
            logger()->warning('Google OAuth returned no email');

            return redirect()->route('login')->with('status', 'Google tidak memberikan akses ke alamat email Anda.');
        }

        logger()->info('Google OAuth user retrieved', [
            'email' => $email,
            'google_id' => $googleUser->getId(),
        ]);

        $user = User::where('google_id', $googleUser->getId())
            ->orWhere('email', $email)
            ->first();

        if ($user) {
            $user->update([
                'google_id' => $user->google_id ?? $googleUser->getId(),
                'avatar' => $user->avatar ?? $googleUser->getAvatar(),
                'email_verified_at' => $user->email_verified_at ?? now(),
            ]);
        } else {
            $user = User::create([
                'name' => $googleUser->getName() ?: ($googleUser->getNickname() ?: 'Google User'),
                'email' => $email,
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
                'email_verified_at' => now(),
                'password' => null,
            ]);
        }

        Auth::login($user, remember: true);

        logger()->info('User logged in via Google OAuth', [
            'user_id' => $user->id,
            'email' => $user->email,
        ]);

        return redirect()->intended(route('dashboard'));
    }
}
