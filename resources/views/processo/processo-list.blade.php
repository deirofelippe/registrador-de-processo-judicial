@extends('layout')
@section('content')
    @isset($processoDeletado)
        <div class="container d-flex mt-2 w-50 justify-content-center">
            <table class="table table-bordered table-sm">
                <tbody>
                    <tr>
                        <td class="alert-danger">Processo deletado!</td>
                    </tr>
                    <tr>
                        <td class="alert-danger">
                            Número do processo: {{$processoDeletado->numeroProcesso}}
                        </td>
                    </tr>
                    <tr>
                        <td class="alert-danger">Autor: {{$processoDeletado->autor}}</td>
                    </tr>
                    <tr>
                        <td class="alert-danger">Vara: {{$processoDeletado->vara}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endisset

    <div class="container mt-2 d-flex w-50 justify-content-center">
        <table class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Autor</th>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($processos as $processo)
                    <tr>
                        <th scope="row" class="text-center">{{$loop->iteration}}</th>
                        <td class="text-center">
                            <a href="/processo/{{$processo->id}}">{{$processo->autor}}</a>
                        </td>
                        <td class="text-center">
                            <a href="/processo/{{$processo->id}}/edit" class="btn btn-primary">Editar</a>
                        </td>
                        <td class="text-center">
                            <form action="/processo/{{$processo->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
