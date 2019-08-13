@extends('layouts.main')
@section('content')
    <div class="profile-container" align="center">
            @foreach ($profiles as $profile)
                @include('profiles._profile')
            @endforeach
    </div>
@endsection
