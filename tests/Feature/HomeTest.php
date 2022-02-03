<?php

namespace Tests\Feature;

use App\Models\Tag;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{

    use RefreshDatabase;

    public function testEmpty()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response->assertSee("No Tags Yet");
    }

    public function testWithData()
    {
        $tag = Tag::factory()->create();

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee($tag->name);
        $response->assertDontSee("No Tags Yet");
    }
}
