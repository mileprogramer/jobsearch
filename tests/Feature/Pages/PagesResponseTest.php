<?php

namespace Tests\Feature;

test('returns a successful response for home page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
