@extends('layouts.main')
@section('content')
    <div class="createcomment-container">
        <h3> Create a New Comment {{ $comment->user->name }}</h3>
        <form action="/comments" method="POST">
            @csrf

            <p><textarea name="body" placeholder="Leave your comment here?"></textarea></p>
            <button type="submit">Post</button>
        </form>
    </div>
@endsection
