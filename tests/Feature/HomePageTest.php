<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_home_page_renders_with_catalog_stats(): void
    {
        $this->skipUnlessDatabaseReachable();

        $response = $this->get('/');

        $response->assertOk();
        $response->assertViewIs('home');
        $response->assertViewHas('productCount');
        $response->assertViewHas('categoryCount');
    }
}
