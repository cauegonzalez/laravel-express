@extends('app')

@section('content')
    <h1>Create new Post</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['route'=>'admin.posts.store', 'method'=>'post']) !!}

    @include('admin.posts._form')

    <div class="form-group">
        {!! Form::label('tags', 'Tags', ['class'=>'control-label']) !!}
        {!! Form::text('tags', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        @include('admin.posts.btnCancel')
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection