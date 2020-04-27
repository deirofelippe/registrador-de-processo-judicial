<?php

namespace App\DAOs;

use App\Models\Processo;
use Illuminate\Support\Facades\DB;

class ProcessoDAO
{
    public function store(array $data){
        $processo = Processo::create([
            'numeroProcesso' => $data['numeroProcesso'],
            'autor' => $data['autor'],
            'vara' => $data['vara']
        ]);

        return $processo;
    }
}
