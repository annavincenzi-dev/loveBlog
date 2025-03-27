<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function writeStory() {

        
        return view('stories/writeStory');
    }

    public function storeStory(Request $request) {

        $story = new Story();
        $story->title = $request->title;
        $story->author = $request->author;  
        $story->text = $request->text;

        $story->save();
        return redirect()->route('homepage')->with('success', 'Nuova storia creata con successo!');


    }
    
}
