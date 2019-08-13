<li class="list-group-item">
    <div class="card-body">
        <strong>{{ $comment->user->name }}</strong>
        {{ $comment->created_at->diffForhumans() }}: &nbsp;
        {{ $comment->body }}
        @if(Auth::id() == $tweet->user_id)
        <a href="/comments/{{$comment->id }}/edit">Edit</a> |
        <form action="/comments/{{ $comment->id }}" method="POST" class="d-inline">
            @csrf
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>
        @endif
    </div>
 </li>
