@extends('layout')
@section('content')
    @isset($processoDeletado)
        <ul class="list-group">
            <li class="list-group-item list-group-item-danger">
                <h5>Processo deletado!</h5>
            </li>
            <li class="list-group-item list-group-item-danger">
                Número do processo: {{$processoDeletado->numeroProcesso}}
            </li>
            <li class="list-group-item list-group-item-danger">
                Autor: {{$processoDeletado->autor}}
            </li>
            <li class="list-group-item list-group-item-danger">
                Vara: {{$processoDeletado->vara}}
            </li>
        </ul>
    @endisset

    <div class="container mt-2">
        <table class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Autor</th>
                    <th scope="col">#</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($processos as $processo)
                    <tr>
                        <th scope="row" class="text-center">{{$loop->iteration}}</th>
                        <td>
                            <a href="/processo/{{$processo->id}}">{{$processo->autor}}</a>
                        </td>
                        <td class="text-center">
                            <form action="/processo/{{$processo->id}}/edit" method="get">
                                @csrf
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </form>
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
