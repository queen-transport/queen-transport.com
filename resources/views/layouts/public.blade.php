<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('site.brand') }}</title>
    <meta name="description" content="{{ $description ?? config('site.tagline') }}">
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:title" content="{{ $title ?? config('site.brand') }}">
    <meta property="og:description" content="{{ $description ?? config('site.tagline') }}">
    <meta property="og:url" content="{{ $canonical ?? url()->current() }}">
    <meta property="og:site_name" content="{{ config('site.brand') }}">
    @php
        $ogImageUrl = asset('og-image.png');
        $ogImageDimensions = [1200, 630];
        $ogImageType = 'image/png';

        if (!empty($image)) {
            if (str_starts_with($image, 'http://') || str_starts_with($image, 'https://')) {
                $ogImageUrl = $image;
                $ogImageDimensions = @getimagesize($image) ?: [1200, 630];
            } elseif (file_exists(public_path(ltrim($image, '/')))) {
                $ogImageUrl = asset(ltrim($image, '/'));
                $ogImageDimensions = @getimagesize(public_path(ltrim($image, '/'))) ?: [1200, 630];
            } elseif (Storage::disk('public')->exists($image)) {
                $ogImageUrl = Storage::disk('public')->url($image);
                $ogImageDimensions = @getimagesize(Storage::disk('public')->path($image)) ?: [1200, 630];
            }
        }

        if (!empty($ogImageDimensions['mime'])) {
            $ogImageType = $ogImageDimensions['mime'];
        } elseif (str_ends_with(strtolower($ogImageUrl), '.jpg') || str_ends_with(strtolower($ogImageUrl), '.jpeg')) {
            $ogImageType = 'image/jpeg';
        } elseif (str_ends_with(strtolower($ogImageUrl), '.webp')) {
            $ogImageType = 'image/webp';
        }
    @endphp
    <meta property="og:image" content="{{ $ogImageUrl }}">
    <meta property="og:image:secure_url" content="{{ $ogImageUrl }}">
    <meta property="og:image:type" content="{{ $ogImageType }}">
    @if ($ogImageDimensions)
        <meta property="og:image:width" content="{{ $ogImageDimensions[0] }}">
        <meta property="og:image:height" content="{{ $ogImageDimensions[1] }}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? config('site.brand') }}">
    <meta name="twitter:description" content="{{ $description ?? config('site.tagline') }}">
    <meta name="twitter:image" content="{{ $ogImageUrl }}">
    @vite(['resources/css/public.css', 'resources/js/public.js'])
</head>
<body class="min-h-screen flex flex-col">

<a href="{{ \App\Support\WhatsApp::link() }}"
   class="wa-float fixed bottom-7 right-7 z-[9999] w-[60px] h-[60px] rounded-full bg-gradient-to-br from-[#25d366] to-[#128c7e] flex items-center justify-center text-[1.8rem] text-white shadow-[0_4px_20px_rgba(37,211,102,0.45)] transition-all no-underline hover:scale-[1.1] hover:-translate-y-[3px]"
   target="_blank" rel="noopener noreferrer" aria-label="Hubungi via WhatsApp">
    💬
</a>

<x-navbar />

<main class="flex-1">
    {{ $slot }}
</main>

<x-footer />

</body>
</html>
