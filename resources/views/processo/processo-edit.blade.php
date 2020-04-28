@extends('layout')
@section('content')
    <form action="/processo" method="post">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{$processo->id}}">
        Número do processo: <input type="text" name="numeroProcesso" value="{{$processo->numeroProcesso}}">
        Autor: <input type="text" name="autor" value="{{$processo->autor}}">
        Vara: <input type="text" name="vara" value="{{$processo->vara}}">
        <input type="submit" value="Atualizar">
    </form>
@endsection
