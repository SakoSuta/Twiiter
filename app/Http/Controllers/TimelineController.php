<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweets;
use App\Models\User;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $tweets = Tweets::orderBy('created_at', 'desc')->get();

        return view('timeline', compact('tweets', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function CreateTweet(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'text' => 'required|max:180',
        ]);

        $tweet = new Tweets();
        $tweet->text = $data['text'];
        $tweet->user_id = $user->id;

        $tweet->save();

        return redirect()->route('timeline')->with('success', 'Your Tweet is now publish in the World 🌍');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function ShowTweets($username)
    {
        $auth = Auth::user();

        $user = User::where('username', $username)->firstOrFail();
        $tweets = Tweets::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('ShowTweets', compact('user', 'tweets', 'auth'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function DeleteTweets($id)
    {
        $tweet = Tweets::where('id', $id)->firstOrFail();

        $tweet->delete();

        return back()->with('success', 'Your Tweet has been successfully deleted.');
    }
}
