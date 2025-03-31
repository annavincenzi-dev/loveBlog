<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

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

    public function edit(Story $story) {
        
        return view('stories.edit', compact('story'));
    }

    public function update(Request $request, Story $story) {
        
        if (auth()->user()->id == $story->user_id) {

            $story->update([
                'title' => $request->title,
                'text' => $request->text,
            ]);

            return redirect()->route('homepage')->with('success', 'Storia aggiornata con successo!');
        }
        
        return redirect()->route('homepage')->with('error', 'Non hai il permesso per modificare questa storia!');
    }

    public function destroy(Story $story) {
        
        if (auth()->user()->id == $story->user_id) {
            $story->delete();
            return redirect()->route('homepage')->with('success', 'Storia eliminata con successo!');
        }
        
        return redirect()->route('homepage')->with('error', 'Non hai il permesso per eliminare questa storia!');
    }

    
    
}
