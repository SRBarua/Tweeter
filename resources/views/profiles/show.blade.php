@extends('layouts.main')

@section('content')

    <div class="card" align="center">
            @include('profiles._profile')
            <div>Birthday: {{ $profile->birthday }}</div>
            <div>Location: {{ $profile->location }}</div>
            <div>Bio: {{ $profile->bio }}</div>
            @if(Auth::id() == $profile->user_id)
                <a href="/profiles/{{$profile->id }}/edit">Edit</a>
            @endif
    </div>





@endsection
