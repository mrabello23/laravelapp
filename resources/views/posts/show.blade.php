@extends('layouts.app')

@section('content')
    <div class="row">
        <a href="/posts" class="btn btn-default btn-sm">Go Back</a>

        <h1>{{ $post->title }}</h1>
        <div>
            {{ $post->body }}
        </div>
        <hr/>

        <small>Written on {{ $post->created_at }}</small>
    </div>
@endsection