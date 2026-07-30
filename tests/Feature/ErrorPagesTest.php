<?php

test('404 renders the custom error page', function () {
    config(['app.debug' => false]);

    $response = $this->get('/this-route-does-not-exist');

    $response->assertStatus(404);
    $response->assertSee('Halaman Tidak Ditemukan');
});
