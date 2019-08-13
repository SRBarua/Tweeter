@extends('layouts.main')
@section('content')
    <div class="createprofile-container">
        <h3> Create your profile</h3>
        <form action="/profiles" method="POST" >
            @csrf
            <h4> Bio</h4>
            <p><textarea name="bio" placeholder="About yourself"></textarea></p>
            <h4> Date of Birth</h4>
            <p><textarea name="birthday" placeholder="yyyy-mm-dd"></textarea></p>
            <h4>Location</h4>
            <p><textarea name="location" placeholder="City, State/Province"></textarea></p>
            <br />
            <button type="submit">Save</button>
        </form>
    </div>
@endsection
