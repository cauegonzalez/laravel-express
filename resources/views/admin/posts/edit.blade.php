@extends('app')

@section('content')
    <h1>Edit Post: <i>{{ $post->title }}</i></h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($post, ['route'=>['admin.posts.update', $post->id], 'method'=>'put']) !!}

    @include('admin.posts._form')

    <div class="form-group">
        {!! Form::label('tags', 'Tags', ['class'=>'control-label']) !!}
        {!! Form::text('tags', $post->tagList, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        @include('admin.posts.btnCancel')
        {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection