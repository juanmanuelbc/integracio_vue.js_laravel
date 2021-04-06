<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{

    public function testIndex()
    {
        $response = $this->get('/api/post');

        $response->assertStatus(200)->assertJson([]);
    }

    public function testStore()
    {
        $response = $this->post('/api/post', [
            'titol' => 'Post de prova',
            'imatge' => 'https://www.google.es/images/branding/googlelogo/2x/googlelogo_color_160x56dp.png',
            'descripcio' => 'Post de prova del curs',
            'contingut' => 'Això és el primer post del curs Vue.js + Laravel'
        ]);

        $response->assertStatus(200)->assertJson([]);
    }

    public function testShow()
    {
        $response = $this->get('api/post/1');
        
        $response->assertStatus(200)->assertJsonStructure([
            'id',
            'titol',
            'imatge',
            'descripcio',
            'contingut',
            'created_at',
            'updated_at',
            'idUsuari',
            'deleted_at'
        ]);
    }

    public function testUpdate()
    {
        $response = $this->put('api/post/1', [
            'titol' => 'Post de prova (modificat)',
            'imatge' => 'https://www.google.es/images/branding/googlelogo/2x/googlelogo_color_160x56dp.png',
            'descripcio' => 'Post de prova del curs (modificat)',
            'contingut' => 'Això és el primer post del curs Vue.js + Laravel (modificat)'
        ]);

        $response->assertStatus(200)->assertJsonStructure([
            'id',
            'titol',
            'imatge',
            'descripcio',
            'contingut',
            'created_at',
            'updated_at',
            'idUsuari',
            'deleted_at'
        ]);
    }

    public function testDestroy()
    {
        $response = $this->delete('api/post/1');

        $response->assertStatus(200)->assertJsonStructure([
            'id',
            'titol',
            'imatge',
            'descripcio',
            'contingut',
            'created_at',
            'updated_at',
            'idUsuari',
            'deleted_at'
        ]);
    }

}
