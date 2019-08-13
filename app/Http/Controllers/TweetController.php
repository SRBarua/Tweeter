<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Profile;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tweets = \App\Tweet::orderby('created_at', 'desc')->paginate(5);
        // return view('tweets/index', compact('tweets'));
        $tweets = \App\Tweet::latest()->get();
        return $tweets;
    }
public function list()
{
    $tweets = \App\Tweet::latest()->get();
    return $tweets;
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tweets.create');
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

            'body' => 'required | min:10 | max:800',
        ]);
        //new empty Post object
        $tweet = new \App\Tweet;

        //set some properties from $request data
        $tweet->user_id = Auth::id();

        $tweet->body = $request->body;


        //save, then redirect to new post single/show view
        if($tweet->save()){
            return redirect('/tweets/' . $tweet->id);
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
        $tweet =\App\Tweet::find($id);
        return view('tweets.show', compact('tweet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tweet = \App\Tweet::find($id);
        return view('tweets.edit', compact('tweet'));
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
        $tweet = \App\Tweet::find($id);


        $tweet->body = $request->body;

        if($tweet->save()){
            return redirect('/tweets/' . $tweet->id);
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
        $tweet = \App\Tweet::find($id);

        if($tweet->delete()){
            return redirect('/tweets');
        } else{
            dd('Error');
        }
    }

    public function like($id)
    {
        //check for the existing like
        $existing = \App\Like::where('user_id', Auth::id())
                        ->where('tweet_id', $id)
                        ->count();

        if($existing){
            $delete = \App\like::where('user_id', Auth::id())
                                ->where('tweet_id', $id)
                                ->delete();

            if($delete)
                return back();
        }
            //otherwise - add a new like

        $like = new \App\Like;

        $like->user_id = Auth::id();
        $like->tweet_id = $id;

        if($like->save()){
            return back();
        }

        dd('error');
    }
}
