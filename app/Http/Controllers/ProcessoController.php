<?php

namespace App\Http\Controllers;

use App\Models\Processo;
use App\Services\ProcessoService;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProcessoController extends Controller
{
    private $service;

    public function __construct(ProcessoService $service){
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $processos = $this->service->listarComPaginacao($request);
        return view('processo.processo-list', ['processos' => $processos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('processo.processo-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'numeroProcesso' => 'required',
            'autor' => 'required|string',
            'vara' => 'required'
        ]);

        $processo = $this->service->store($request);

        return redirect('/processos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function show($idProcesso)
    {
        $processo = $this->service->buscarProcesso($idProcesso);
        return view('processo.processo')->with('processo', $processo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function edit($idProcesso)
    {
        $processo = $this->service->buscarProcesso($idProcesso);
        return view('processo.processo-edit')->with('processo', $processo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->service->atualizar($request);
        return redirect('/processos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $idProcesso)
    {
        $processoDeletado = $this->service->deletar($idProcesso);
        $processos = $this->service->listarComPaginacao($request);

        return view('processo.processo-list')
        ->with('processoDeletado', $processoDeletado)
        ->with('processos', $processos);
    }

    public function gerarRelatorio(){
        $response = $this->service->gerarRelatorio();
        return $response;
    }

    public function enviarRelatorioPorEmail(Request $request){
        $email = 'seergiio.felippe@gmail.com';
        $this->service->enviarRelatorioPorEmail($email);
        return redirect('/processos');
    }
}
