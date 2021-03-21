<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostFactory extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_example()
    {
        $title = "This is a title";
        $description = "This is a beautiful description";
        $user_id = 5;

        $this->assertDatabaseHas('Posts', [
            'title' => $title,
            'description' => $description,
            'user_id' => $user_id,
        ]);
    }
}
