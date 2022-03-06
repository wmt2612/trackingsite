<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClonedWebsiteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_api_tracking_site()
    {
        $response = $this->postJson('/api/v1/tracking-cloned-site', [
            'site_name' => 'hacking.com'
        ]);
        $response->assertStatus(201);
    }
}
