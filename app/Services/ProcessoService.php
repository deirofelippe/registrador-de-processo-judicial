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
        return $this->dao->store($request->all());
    }
}
