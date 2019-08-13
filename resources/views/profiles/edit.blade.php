@extends('layouts.main')
@section('content')
        <h2>Edit Profile</h2>
            <form action="/profiles/{{ $profile->id }}" method="POST">
                {{ method_field('PUT') }}
                @csrf
                <h4> Bio</h4>
                <p><textarea name="bio" placeholder="About yourself">{{ $profile->bio }}</textarea></p>
                <h4> Date of Birth</h4>
                <p><textarea name="birthday" placeholder="yyyy-mm-dd">{{ $profile->birthday }}</textarea></p>
                <h4>Location</h4>
                <p><textarea name="location" placeholder="City, State/Province">{{ $profile->location }}</textarea></p>
                <br />
                <button type="submit">Save</button>
            </form>
@endsection
