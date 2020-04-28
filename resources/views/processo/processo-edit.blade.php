@extends('layout')
@section('content')
<div class="container mt-1 d-flex justify-content-center">
    <div class="card w-50">
        <div class="card-body">
            <form action="/processo" method="post" class="d-flex flex-column">
                @method('PUT')
                @csrf

                <input type="hidden" name="id" value="{{$processo->id}}">

                <div class="form-group row">
                    <label for="numeroProcesso" class="col-4 col-form-label">Número do processo: </label>
                    <input class="form-control form-control-lg col-8" type="text" name="numeroProcesso" id="numeroProcesso" value="{{$processo->numeroProcesso}}">
                </div>

                <div class="form-group row">
                    <label for="autor" class="col-4 col-form-label">Autor: </label>
                    <input class="form-control form-control-lg col-8" type="text" name="autor" id="autor" value="{{$processo->autor}}">
                </div>

                <div class="form-group row">
                    <label for="vara" class="col-4 col-form-label">Vara: </label>
                    <input class="form-control form-control-lg col-8" type="text" name="vara" id="vara" value="{{$processo->vara}}">
                </div>

                <div class="form-group row">
                    <button type="submit" class="btn col btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
