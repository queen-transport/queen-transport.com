<?php

test('kontak page returns successful response and displays contact information', function () {
    $response = $this->get(route('kontak'));

    $response->assertOk();
    $response->assertSee(config('site.brand'));
    $response->assertSee(config('site.whatsapp_number'));
    $response->assertSee('Pak Fauzan');
    $response->assertSee('6282231037255');
    $response->assertSee(config('site.address'));
    $response->assertSee('Customer Service');
    $response->assertSee('Pilih Kebutuhan Perjalanan');
});

test('navbar links to kontak page', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee(route('kontak'));
});

test('floating whatsapp button links to kontak on landing page', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('href="'.route('kontak').'"', false);
});

test('sitemap contains kontak page', function () {
    $response = $this->get(route('sitemap'));

    $response->assertOk();
    $response->assertSee('<loc>'.route('kontak').'</loc>', false);
});
