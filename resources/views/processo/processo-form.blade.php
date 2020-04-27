@extends('layout')
@section('content')
    <form action="/processo" method="post">
        @csrf
        Número do processo: <input type="text" name="numeroProcesso">
        Autor: <input type="text" name="autor">
        Vara: <input type="text" name="vara">
        <input type="submit" value="Incluir">
    </form>
@endsection
