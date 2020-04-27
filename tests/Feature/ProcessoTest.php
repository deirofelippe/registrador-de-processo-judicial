<?php

namespace Tests\Feature;

use App\Models\Processo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProcessoTest extends TestCase
{
    use RefreshDatabase;

    public function testAdicionarProcesso(){
        $processo = factory(Processo::class)->make();
        $response = $this->post('/processo', $processo->toArray());

        $this->assertDatabaseHas('processos', $processo->toArray());
        $this->assertEquals(1, Processo::all()->count());
        $response->assertStatus(200);
    }

    public function testValidacaoRequired(){
        $data = [
            'numeroProcesso' => null,
            'autor' => null,
            'vara' => null
        ];
        $processo = factory(Processo::class)->make($data);

        $response = $this->post('/processo', $processo->toArray());
        $response->assertSessionHasErrors(['numeroProcesso','autor','vara']);
    }

    public function testValidacaoString(){
        $processo = factory(Processo::class)->make(['autor' => 0000000]);
        $response = $this->post('/processo', $processo->toArray());

        $response->assertSessionHasErrors('autor');
    }

    public function testUmProcesso(){
        $processo = factory(Processo::class)->create();
        $response = $this->get('/processo');

        $response
        ->assertSee($processo->numeroProcesso)
        ->assertSee($processo->autor)
        ->assertSee($processo->vara);
    }

    public function testListarProcesso(){
        $processos = factory(Processo::class, 10)->create();
        $this->get('/processos');

        $this->assertEquals(10, $processos->count());
    }

    public function testAtualizarProcesso(){}

    public function testDeletarProcesso(){}
}
