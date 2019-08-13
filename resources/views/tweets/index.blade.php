@extends('layouts.main')

@section('content')
    <div class="tweet-container" align="center">
        <a href="/tweets/create"><button class="btn btn-primary"> New post </button></a>
        <br />
        <br />

        @foreach ($tweets as $tweet)
            @include('tweets._tweet')
        @endforeach
    </div>
@endsection
