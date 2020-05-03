<?php

namespace Tests\Feature;

use App\Models\Processo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProcessoTest extends TestCase
{
    use RefreshDatabase;

    public function test_adicionar_processo(){
        $processo = factory(Processo::class)->make();
        $this->post('/processo', $processo->toArray());

        $this->assertDatabaseHas('processos', $processo->toArray());
        $this->assertEquals(1, Processo::all()->count());
    }

    public function test_validacao_required(){
        $data = [
            'numeroProcesso' => null,
            'autor' => null,
            'vara' => null
        ];
        $processo = factory(Processo::class)->make($data);

        $response = $this->post('/processo', $processo->toArray());
        $response->assertSessionHasErrors(['numeroProcesso','autor','vara']);
    }

    public function test_validacao_string(){
        $processo = factory(Processo::class)->make(['autor' => 0000000]);
        $response = $this->post('/processo', $processo->toArray());

        $response->assertSessionHasErrors('autor');
    }

    public function test_buscar_um_processo(){
        $processo = factory(Processo::class)->create();
        $response = $this->get('/processo');

        $response
        ->assertSee($processo->numeroProcesso)
        ->assertSee($processo->autor)
        ->assertSee($processo->vara);
    }

    public function test_listar_processos(){
        $processos = factory(Processo::class, 10)->create();
        $this->get('/processos');

        $this->assertEquals(10, $processos->count());
    }

    public function test_atualizar_processo(){
        $processo = factory(Processo::class)->create();

        $data = [
            'id' => $processo->id,
            'numeroProcesso' => $processo->numeroProcesso,
            'autor' => $processo->autor,
            'vara' => 'atualizado',
        ];

        $response = $this->put('/processo', $data);

        $response->assertRedirect('/processos');
        $this->assertDatabaseHas('processos', $data);
    }

    public function test_abrir_formulario_para_atualizar_processo(){
        $processo = factory(Processo::class)->create();
        $id = $processo->id;
        $response = $this->get("/processo/{$id}/edit");

        $response
        ->assertSee($processo->numeroProcesso)
        ->assertSee($processo->autor)
        ->assertSee($processo->vara);
    }

    public function test_deletar_processo(){
        $processo = factory(Processo::class)->create();
        $id = $processo->id;
        $response = $this->delete("/processo/{$id}");

        $this->assertDatabaseMissing('processos', $processo->toArray());
        $response
        ->assertSee($processo->numeroProcesso)
        ->assertSee($processo->autor)
        ->assertSee($processo->vara);
    }

    public function test_gerar_relatorio(){
        $response = $this->get('/relatorio/processos');
        $response->assertHeader('content-type', 'application/pdf');
    }
}
