@extends('layout')
@section('content')
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
