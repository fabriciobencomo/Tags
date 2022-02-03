<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Tag;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStore()
    {
        $response = $this->post('tags', ['name' => 'PHP']);

        $response->assertRedirect('/');

        $this->assertDatabaseHas('tags', ['name' => 'PHP']);
    }

    public function testDestroy()
    {
        $tag = Tag::factory()->create();

        $response = $this->delete("tags/$tag->id");

        $response->assertRedirect('/');

        $this->assertDatabaseMissing('tags', ['name' => $tag->name]);
    }
    public function testValidateNameFieldHasAValueWhenCreateANewTag()
    {
        $this->post('tags', ['name' => ''])->assertSessionHasErrors('name');
    }
}
