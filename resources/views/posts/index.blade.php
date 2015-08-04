@extends('template');

@section('content')
    <h1>Blog</h1>

    @foreach($posts as $post)
        <h2>{{ $post->title }}</h2>
        <p><i>{{ $post->date }}</i></p>

        <p>{{ $post->content }}</p>
        <p>{{ $post->source }}</p>
        <hr />
    @endforeach
@endsection