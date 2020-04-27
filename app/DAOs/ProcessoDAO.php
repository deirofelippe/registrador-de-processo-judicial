<?php

namespace App\DAOs;

use App\Models\Processo;
use Illuminate\Support\Facades\DB;

class ProcessoDAO
{
    public function incluir(array $data){
        $processo = Processo::create([
            'numeroProcesso' => $data['numeroProcesso'],
            'autor' => $data['autor'],
            'vara' => $data['vara']
        ]);

        return $processo;
    }

    public function listar(){
        return Processo::all();
    }

    public function buscarProcesso($idProcesso){
        return Processo::find($idProcesso);
    }
}
