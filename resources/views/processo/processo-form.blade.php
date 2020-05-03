@extends('layout')
@section('content')
    <div class="container mt-1 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header text-center">
                FORMULÁRIO DE PROCESSO
            </div>
            <div class="card-body">
                <form action="/processo" method="post" class="d-flex flex-column">
                    @csrf

                    <div class="form-group row">
                        <label for="numeroProcesso" class="col-4 col-form-label">Número do processo: </label>
                        <input type="text" name="numeroProcesso" id="numeroProcesso" class="form-control col-8">
                    </div>

                    <div class="form-group row">
                        <label for="autor" class="col-4 col-form-label">Autor: </label>
                        <input type="text" name="autor" id="autor" class="form-control col-8">
                    </div>

                    <div class="form-group row">
                        <label for="vara" class="col-4 col-form-label">Vara: </label>
                        <input type="text" name="vara" id="vara" class="form-control col-8">
                    </div>

                    <div class="row">
                        <button type="submit" class="btn col btn-primary">Incluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
