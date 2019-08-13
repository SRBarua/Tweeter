
@extends('layouts.main')
@section('content')
    <div class="createtweet-container">
        <h3> Create a New Tweet </h3>
        <form action="/tweets" method="POST">
            @csrf
            <p><textarea name="body" placeholder="What's on your mind?"class="form-control"></textarea></p>
            <p><button type="submit">Post</button></p>
        </form>
    </div>




@endsection
