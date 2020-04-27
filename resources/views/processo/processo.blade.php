@extends('layout')
@section('content')
    <div>
        <p>Número do processo: {{$processo->numeroProcesso}}</p>
        <p>Autor: {{$processo->autor}}</p>
        <p>Vara: {{$processo->vara}}</p>
    </div>
@endsection
