@extends('template')

@section('content')
    <h1>listado</h1>
    @foreach ($posts as $post)
        <p>
            <strong>{{ $post->id }}</strong>
            <a href="{{ route('blog-detail', $post->slug) }}">{{ $post['title'] }}</a>
        </p>
    @endforeach

    {{ $posts->links() }}
@endsection
