<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Profile;
use App\User;



class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $profiles = \App\Profile::orderby('created_at', 'desc')->paginate(18);
        return view('profiles/index', compact('profiles'));

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        return view('profiles.index', compact('user', 'follows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create');
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

            'bio' => 'required',
            'birthday' => 'required',
            'location' => 'required ',
        ]);
        //new empty Post object
        $profile = new \App\Profile;

        //set some properties from $request data
        $profile->user_id = Auth::id();

        $profile->bio = $request->bio;
        $profile->birthday = $request->birthday;
        $profile->location = $request->location;

        if ($profile->save()){
            return redirect('/profiles/' . $profile->id);
        } else {
            dd('error');
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
        $profile =\App\Profile::find($id);
        return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = \App\Profile::find($id);
        return view('profiles.edit', compact('profile'));
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
        $profile = \App\Profile::find($id);

        $profile->bio = $request->bio;
        $profile->birthday = $request->birthday;
        $profile->location = $request->location;

        if($profile->save()){
            return redirect('/profiles/' . $profile->id);
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
        //
    }
}
