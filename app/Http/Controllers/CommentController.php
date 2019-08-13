<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Tweet;
use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = \App\Comment::orderby('created_at', 'desc')->paginate(3);
        return view('comments/index', compact('comments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $tweet_id)
    {
        return view('comments.create', compact('tweet_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'body' => 'required|max:200'
        ]);

        $comment = new \App\Comment;

        //set some properties from $request data

        $comment->user_id = Auth::id();
        $comment->tweet_id = intval($request->tweet_id);
        $comment->body = $request->body;



        //save, then redirect to new post single/show view
        if($comment->save()){
            return redirect('/tweets/' . $comment->tweet_id);
        } else{
            dd('Error');
        }
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment =\App\Comment::find($id);
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = \App\Comment::find($id);
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $comment = \App\Comment::find($id);

        $comment->body = $request->body;

        if($comment->save()){
            return redirect('/tweets/' . $comment->tweet_id);
        } else{
            dd('Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = \App\Comment::destroy($id); //shorthand

        if($comment){
            return redirect('tweets/');
        }
        return back();
    }

    public function replyStore(Request $request)
    {
        //new empty Post object
        $reply = new \App\Comment;

        //set some properties from $request data
        $reply->body = $request->body;
        $reply->parent_id = $request->$comment_id;
        $reply->user_id = Auth::id();



        //save, then redirect to new post single/show view
        if($reply->save()){
            return redirect('/comments/' . $comment->id);
        } else{
            dd('Error');
        }

    }
}
