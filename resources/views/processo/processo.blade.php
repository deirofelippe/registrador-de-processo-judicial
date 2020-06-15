@extends('layout')
@section('content')
    <div class="container mt-1 w-25">
        <ul class="list-group">
            <li class="list-group-item">
                <div class="text-center">Número do processo: {{$processo->numeroProcesso}}</div>
            </li>
            <li class="list-group-item">
                <div class="text-center">Autor: {{$processo->autor}}</div>
            </li>
            <li class="list-group-item">
                <div class="text-center">Vara: {{$processo->vara}}</div>
            </li>
        </ul>
    </div>
@endsection
