<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DiaryTest extends TestCase
{

    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testList()
    {
      $response = $this->get('admin/diary/list');
      $response->assertStatus(302);
    }
    
}
