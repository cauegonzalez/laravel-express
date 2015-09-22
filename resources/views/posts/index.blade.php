@extends('template')

@section('content')
    <h1>Blog</h1>

    @foreach($posts as $post)
        <h2>{{ $post->title }}</h2>
        <p><i>{{ $post->created_at }}</i></p>
        <p><b>TAGs: </b>
        @foreach ($post->tags as $tag)
            <i>{{ $tag->name }}</i>
        @endforeach

        <p>{{ $post->content }}</p>
        <p>{{ $post->source }}</p>
        <hr />
        <h3>Comments</h3>
        @foreach($post->comments as $comment)
            <b>Name:</b> {{ $comment->name }} - <i>{{ $comment->created_at }}</i><br />
            <b>Comment:</b> {{ $comment->comment }}<br /><br />
        @endforeach
        <hr />
    @endforeach
@endsection