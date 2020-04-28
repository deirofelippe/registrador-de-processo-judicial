<?php

namespace App\Services;

use App\DAOs\ProcessoDAO;
use App\Models\Processo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProcessoService
{
    private $dao;

    public function __construct(ProcessoDAO $dao){
        $this->dao = $dao;
    }

    public function store(Request $request): Processo {
        return $this->dao->incluir($request->all());
    }

    public function listar(): Collection {
        return $this->dao->listar();
    }

    public function buscarProcesso($idProcesso): Processo {
        return $this->dao->buscarProcesso($idProcesso);
    }

    public function atualizar(Request $request): Processo {
        $data = [
            'numeroProcesso' => $request->numeroProcesso,
            'autor' => $request->autor,
            'vara' => $request->vara,
        ];

        $id = $request->id;

        return $this->dao->atualizar($id, $data);
    }
}
