<?php

namespace App\Services;

use App\DAOs\ProcessoDAO;
use App\Mail\RelatorioDeProcessosMail;
use App\Models\Processo;
use App\Services\Relatorio\ProcessoRelatorio;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProcessoService {
    private $dao;
    private $relatorio;

    public function __construct(ProcessoDAO $dao, ProcessoRelatorio $relatorio){
        $this->dao = $dao;
        $this->relatorio = $relatorio;
    }

    public function store(Request $request): Processo {
        return $this->dao->incluir($request->all());
    }

    public function listarSemPaginacao(): Collection {
        return $this->dao->listarSemPaginacao();
    }

    public function listarComPaginacao(Request $request) {
        $itensPorPagina = $request->itensPorPagina ?? 20;
        $processos = $this->dao->listarComPaginacao($itensPorPagina);
        return $processos;
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

    public function deletar($idProcesso): Processo {
        return $this->dao->deletar($idProcesso);
    }

    public function gerarRelatorio() {
        $processos = $this->dao->listarSemPaginacao();
        return $this->relatorio->gerarRelatorioStream($processos);
    }

    public function enviarRelatorioPorEmail($email) {
        $processos = $this->dao->listarSemPaginacao();
        $pdf = $this->relatorio->gerarRelatorioPdf($processos);
        return Mail::to($email)->send(new RelatorioDeProcessosMail($pdf));
    }
}
