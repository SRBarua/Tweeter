@extends('layouts.main')
@section('content')
        <h2>Edit Comment</h2>
            <form action="/comments/{{ $comment->id }}" method="POST">
                {{ method_field('PUT') }}
                @csrf
                <textarea name="body" placeholder="">{{ $comment->body }}</textarea>
                <button type="submit">Post</button>
            </form>
@endsection
