<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;

use App\Models\Story;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreStoryRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class StoryController extends Controller implements HasMiddleware
{

    /* Implementazione del middleware */
    public static function middleware() {
        return [
            new Middleware('auth', except: ['allStories', 'showStory'])
        ];
    
    }

    /* Funzione per inserire una nuova storia */
    public function writeStory() {

        $categories = Category::all();
        $tags = Tag::all();

        /* dd($tags); */

        /* dd($categories); */

        return view('stories.writeStory', compact('categories', 'tags'));

    }

    /* Funzione per salvare una nuova storia */
    
    

    /* funzione per mostrare tutte le storie */
    public function allStories() {
        
        /* creazione della collezione di storie dal modello Story */
        $stories = Story::all();
        

        return view('stories.allStories', compact('stories'));
    }

    /* funzione per mostrare ogni singola storia con una rotta parametrica */
    public function showStory(Story $story) {
        
        $tags = Tag::all();
        return view('stories.story', compact('story', 'tags'));
        
    }


    /* funzione per modificare una storia */
    public function edit(Story $story) {
        
        return view('stories.edit', compact('story'));

    }

    /* funzione per aggiornare una storia */
    public function update(Request $request, Story $story) {
        
        /* controllo che permette solo all'utente autore di modificare la storia (se il suo ID corrisponde allo user_id della storia) */
        if (auth()->user()->id == $story->user_id) {

            /* aggiorno il database con le modifiche */
            $story->update([
                'title' => $request->title,
                'text' => $request->text,
            ]);

            return redirect()->route('homepage')->with('success', 'Storia aggiornata con successo!');
        }
            /* se l'utente non corrisponde: */
        return redirect()->route('homepage')->with('error', 'Non hai il permesso per modificare questa storia!');
    }

    /* funzione per eliminare una storia */
    public function destroy(Story $story) {
        
        /* verifico che utente loggato e user_id della storia corrispondano */
        if (auth()->user()->id == $story->user_id) {
            $story->tags()->detach();
            $story->delete();
            return redirect()->route('allStories')->with('success', 'Storia eliminata con successo!');
        }
        
        return redirect()->route('homepage')->with('error', 'Non hai il permesso per eliminare questa storia!');
    }

    /* funzione per mostrare le storie di un utente */
    public function myStories(User $user) {


        return view('stories.myStories', compact('user'));
        
    }

    /* funzione per mostrare le storie di una categoria */
    public function storiesByCategory(Category $category) {

        // Ottiengo le storie della categoria e le salvo in $stories
        $stories = Story::where('category_id', $category->id)->get();
    
        // Passa sia la categoria che le storie alla vista
        return view('stories.storiesByCategory', compact('category', 'stories'));
        
        
    }

    public function storiesByTag(Tag $tag) {

        $stories = Story::whereHas('tags', function($query) use ($tag) {
            $query->where('tag_id', $tag->id);
        })->get();
        return view('stories.storiesByTag', compact('tag', 'stories'));

    }
    
}
