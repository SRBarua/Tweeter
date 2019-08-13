<div class="card mb-4" style="width:700px" padding-Left="10px">
    <div class="card-body">
        <img src="/img/user-310807_960_720.png" width="30px" height="30px">
        <h2><a href="/tweets/{{ $tweet->id }}">{{ $tweet->user->name }}</a></h2>
        <p class="card-text">{{ $tweet->body }}</p>
            @if(Auth::id() == $tweet->user_id)
                <a href="/tweets/{{$tweet->id}}/edit" class="btn btn-link d-inline">Edit</a>
                <form action="/tweets/{{$tweet->id}}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-link d-inline"> Delete </button>
                </form>
             @endif
        <hr />
            <img src="/img/like.png" height="20px">
            <a href="/tweets/{{$tweet->id}}/like" class="btn btn-link p-0"> Like</a>
            ({{ $tweet->likes()->count() }})
            <img src="/img/comment.png" height="20px">
            <a href="/tweets/{{$tweet->id}}/comment"> Comment</a>
            ({{ $tweet->comments()->count() }})
            <img src="/img/160-512.png" height="20px">
            <a href="/tweets/{{$tweet->id}}/share"> Share</a>
        <hr />
        <div class="comment-container">
            <ul class="list-group">
                @foreach($tweet->comments as $comment)
                    @include('comments._comment')
                @endforeach
            </ul>
        </div>
        <br />
        <form action="/comments/{{$tweet->id}}" method="POST">
            @csrf
            <div class="form-group">
               <input type="text" name="body" class="form-control" />
               <input type="hidden" name="tweet_id" value="{{ $tweet->id }}" />
            </div>
           <div class="form-group">
               <input type="submit" class="btn btn-warning d-inline" value="Post" />
           </div>
        </form>
    </div>
</div>
