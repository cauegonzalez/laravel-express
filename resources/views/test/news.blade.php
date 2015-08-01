@extends('template')

@section('title')
    Minhas notícias
@endsection

@section('content')
    <ul>
        @foreach ($arrayNoticias as $noticia)
            <li>{!! $noticia !!}</li>
        @endforeach
    </ul>
@stop
