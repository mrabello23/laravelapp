@extends('layouts.app')

@section('content')
    <h1>Posts</h1>

    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        @if(empty($post->cover_image))
                            <img src="/storage/cover_images/noimage.png" alt="" width="100%" />
                        @else
                            <img src="/storage/cover_images/{{ $post->cover_image }}" alt="" width="100%" />
                        @endif
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3> <a href="/posts/{{ $post->id }}">{{ $post->title }}</a> </h3>
                        <small>Written on {{ $post->created_at }} by {{ $post->user->name }}</small>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- Exemplo de Paginaçao --}}
        {{ $posts->links() }}
    @else
        <h3>No posts found.</h3>
    @endif
@endsection