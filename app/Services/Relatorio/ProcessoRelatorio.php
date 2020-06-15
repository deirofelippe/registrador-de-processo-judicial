<?php

namespace App\Services\Relatorio;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\App;

class ProcessoRelatorio {

    private $dompdf;

    public function __construct(){
        $this->dompdf = App::make('dompdf.wrapper');
    }

    public function gerarRelatorioStream(Collection $processos){
        $pdf = $this->dompdf->loadView('relatorio.processos', compact('processos'));
        $data = date("d-m-Y");
        $nome = "{$data}-relatorio-de-processos.pdf";
        return $pdf->stream($nome);
    }

    public function gerarRelatorioPdf(Collection $processos){
        return $this->dompdf->loadView('relatorio.processos', compact('processos'));
    }
}
