<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweets;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tweets = Tweets::orderBy('created_at', 'desc')->get();

        return view('timeline', compact('tweets'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
