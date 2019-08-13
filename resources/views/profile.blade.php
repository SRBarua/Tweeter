@extends('layouts.app')

@section('content')
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <img src="/img/{{ $user->avatar }}" style="width:90px; height:90px; border-radius:50%" >
                            <h2> {{ $user->name }}'s Profile </h2>
                            <form enctype="multipart/form-data" action="/profiles" method="POST">
                                <p><label>Update Profile Image</label></p>
                                <p><input type="file" name="avatar"></p>
                                <p><input type="hidden" name="_token" value="{{ csrf_token() }}"></p>
                                <input type="submit" class="btn btn-sm btn-primary">
                            </form>
                        </div>
                            <a href=" /profiles "><button class="btn btn-primary"> Who to follow? </button></a>
                    </div>
                </div>
@endsection
