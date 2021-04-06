<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ComentariTest extends TestCase
{

    public function testIndex()
    {
        $response = $this->get('/api/post/1/comentari');

        $response->assertStatus(200)->assertJson([]);
    }

    public function testStore()
    {
        $response = $this->post('/api/post/1/comentari', [
            'text' => 'Comentari de prova'
        ]);

        $response->assertStatus(200)->assertJson([]);
    }

    public function testShow()
    {
        $response = $this->get('/api/post/1/comentari/1');

        $response->assertStatus(200)->assertJsonStructure([
            'id',
            'text',
            'created_at',
            'updated_at',
            'idPost',
            'idUsuari',
            'deleted_at'
        ]);
    }

    public function testUpdate()
    {
        $response = $this->put('api/post/1/comentari/4', [
            'text' => 'Comentari de prova (modificat)'
        ]);

        $response->assertStatus(200)->assertJsonStructure([
            'id',
            'text',
            'created_at',
            'updated_at',
            'idPost',
            'idUsuari',
            'deleted_at'
        ]);
    }

    public function testDestroy()
    {
        $response = $this->delete('api/post/1/comentari/4');

        $response->assertStatus(200)->assertJsonStructure([
            'id',
            'text',
            'created_at',
            'updated_at',
            'idPost',
            'idUsuari',
            'deleted_at'
        ]);
    }

}
