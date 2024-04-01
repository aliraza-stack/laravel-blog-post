@extends('layouts.app')


@section('content')

    {{-- Show all posts --}}
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $post->title }}
                        </h5>
                        <p class="card-text">
                            {{ Str::limit($post->body, 100, '...') }}
                        </p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read more</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- End --}}
@endsection
