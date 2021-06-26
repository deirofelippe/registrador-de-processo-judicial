<?php

namespace App\DAOs;

use App\Models\Processo;
use Illuminate\Database\Eloquent\Collection;

class ProcessoDAO
{
    public function incluir(array $data): Processo {
        return Processo::create([
            'numeroProcesso' => $data['numeroProcesso'],
            'autor' => $data['autor'],
            'vara' => $data['vara']
        ]);
    }

    public function listarSemPaginacao(): Collection {
        return Processo::all();
    }

    public function listarComPaginacao(int $itensPorPagina){
        return Processo::orderBy('id', 'desc')->paginate();
    }

    public function buscarProcesso($idProcesso): Processo {
        return Processo::find($idProcesso);
    }

    public function atualizar($id, array $data): Processo {
        Processo::where('id', $id)->update($data);
        return Processo::find($id);
    }

    public function deletar($idProcesso): Processo {
        $processo = Processo::find($idProcesso);
        Processo::destroy($idProcesso);
        return $processo;
    }
}
