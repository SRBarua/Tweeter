@extends('layouts.main')
@section('content')
    <div class="edittweet-container" align="center">
        <h2>Edit Tweet</h2>
            <form action="/tweets/{{ $tweet->id }}" method="POST">
                {{ method_field('PUT') }}
                @csrf

                <textarea name="body" placeholder="what's on your tweet?">{{$tweet->body}}</textarea>
                <button type="submit">Post</button>
            </form>
    </div>
@endsection
