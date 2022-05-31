<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMainPage()
    {
        $response = $this->get(route("admin.dashboard"));

        $response->assertStatus(200);
    }

    public function testNewsPage()
    {
        $response = $this->get(route("admin.news.index"));

        $response->assertStatus(200);
    }

    public function testCategoriesPage()
    {
        $response = $this->get(route("admin.categories.index"));

        $response->assertStatus(200);
    }
}
