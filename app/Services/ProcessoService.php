<?php

namespace App\Services;

use App\DAOs\ProcessoDAO;
use Illuminate\Http\Request;

class ProcessoService
{
    private $dao;

    public function __construct(ProcessoDAO $dao){
        $this->dao = $dao;
    }

    public function store(Request $request){
        return $this->dao->incluir($request->all());
    }

    public function listar(){
        return $this->dao->listar();
    }

    public function buscarProcesso($idProcesso){
        return $this->dao->buscarProcesso($idProcesso);
    }
}
