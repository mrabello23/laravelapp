@extends('layouts.app')

@section('content')
    <div class="row">
        <a href="/posts" class="btn btn-default btn-sm">Go Back</a>

        <h1>{{ $post->title }}</h1>

        @if(empty($post->cover_image))
            <img src="/storage/cover_images/noimage.png" alt="" width="100%" />
        @else
            <img src="/storage/cover_images/{{ $post->cover_image }}" alt="" width="100%" />
        @endif
        <br /><br />

        <div>
            {{-- sintax used to parse HTML --}}
            {!! $post->body !!}
        </div>

        <small>Written on {{ $post->created_at }} by {{ $post->user->name }}</small>
        <hr/>

        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <a href="/posts/{{ $post->id }}/edit" class="btn btn-default btn-sm">Edit</a>

                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                {!! Form::close() !!}
            @endif
        @endif
    </div>
@endsection