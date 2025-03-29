<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller implements hasMiddleware
{
    public static function middleware() {
        return [
            new Middleware('auth', except: ['allStories', 'showStory'])
        ];
    
    }

    public function writeStory() {

        
        return view('stories/writeStory');
    }

    public function storeStory(Request $request) {
        
    $user = auth()->user();  

    $story = new Story();
    $story->title = $request->title;
    $story->written_by = $user->name;  
    $story->text = $request->text;
    $story->user_id = $user->id;  

    $story->save();

    return redirect()->route('homepage')->with('success', 'Nuova storia creata con successo!');

    }

    public function allStories() {
        
        $stories = Story::with('author')->get();
        
        return view('stories/allStories', compact('stories'));
    }

    public function showStory($id) {
        
        $story = Story::with('author')->find($id);
        /* dd($id); */
        /* dd($story->author); */
        /* dd($story->author->profile_photo); */
        return view('stories.story', compact('story'));
        
    }

    
    
}
