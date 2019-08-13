
<div class="card mb-4" style="width:700px" align="center">
        <div class="card-body">
            <img src="/img/default.png" height="90px">
        </div>
        <div class="card-title" >
            <h1><a href="/profiles/{{ $profile->id }}"> {{ $profile->user->name }} </a><h1>
            <follow-button user-id="{{ $profile->user_id }}" follows="{{ $profile->user->follows }}" class="d-inline"> Follow </folow-button>
        </div>
        <div class="card-text" padding-bottom="5px" align="center">
            <p class="pr-5"><strong>15</strong><span>Tweets</span> | <strong>69</strong><span>Followers</span> | <strong>100</strong><span>Following</span></p>

        </div>
</div>
