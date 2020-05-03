<?php

namespace App\Arquivo;

use Illuminate\Support\Facades\Storage;

class Arquivo {
    public function salvar($arquivo) {
        $nome = $arquivo;
        Storage::disk('public')->put('processo/relatorio-processos.pdf', $arquivo);
        Storage::download('relatorio/processo-relatorio.pdf', 'relatorio.pdf');
        // response()->download($pathToFile, $name, $headers);
        $url = Storage::url('relatorio/processo-relatorio.pdf');
        // Storage::disk('local')->put('file.txt', 'Contents');
        $url = asset("storage/{$nome}.pdf");
        return $url;
    }
}
