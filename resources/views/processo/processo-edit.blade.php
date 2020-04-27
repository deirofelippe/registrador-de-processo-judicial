@extends('layout')
@section('content')
    <form action="/processo" method="post">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{$processo->id}}">
        Número do processo: <input type="text" name="numeroProcesso">
        Autor: <input type="text" name="autor">
        Vara: <input type="text" name="vara">
        <input type="submit" value="Atualizar">
    </form>
@endsection
