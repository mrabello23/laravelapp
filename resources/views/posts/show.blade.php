@extends('layouts.app')

@section('content')
    <div class="row">
        <a href="/posts" class="btn btn-default btn-sm">Go Back</a>

        <h1>{{ $post->title }}</h1>
        <div>
            {{-- sintax used to parse HTML --}}
            {!! $post->body !!}
        </div>

        <small>Written on {{ $post->created_at }}</small>
        <hr/>

        <a href="/posts/{{ $post->id }}/edit" class="btn btn-default btn-sm">Edit</a>

        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
        {!! Form::close() !!}
    </div>
@endsection