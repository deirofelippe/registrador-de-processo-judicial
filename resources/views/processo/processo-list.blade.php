@extends('layout')
@section('content')
    @isset($processoDeletado)
        <div class="deletado">
            <h3>Processo deletado!</h3>
            <p>Número do processo: {{$processoDeletado->numeroProcesso}}</p>
            <p>Autor: {{$processoDeletado->autor}}</p>
            <p>Vara: {{$processoDeletado->vara}}</p>
        </div>
    @endisset

    @foreach ($processos as $processo)
        <div>
            Autor do processo: <a href="/processo/{{$processo->id}}">{{$processo->autor}}</a>

            <form action="/processo/{{$processo->id}}" method="post">
                @method('DELETE')
                @csrf
                <input type="submit" value="Deletar">
            </form>
            <a href="/processo/{{$processo->id}}/edit">Editar</a>
        </div>
        <br>
    @endforeach
@endsection
