<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Validate;

class Edit extends Component
{
    #[Validate('required')]
    public $category_id;
    #[Validate('required')]
    public $tags_id;
    #[Validate('required|min:3')]
    public $title= '';
    #[Validate('required|min:8')]
    public $text= '';
    public $story;
    public $categories;
    public $tags;

    public function mount() {
        $categories = Category::all();
        $tags = Tag::all();
        $this->categories = $categories;
        $this->tags = $tags;
        $this->title = $this->story->title;
        $this->text = $this->story->text;
        $this->category_id = $this->story->category_id;
        $this->tags_id = $this->story->tags()->pluck('tags.id')->toArray();
    }

    public function editStory() {

        if (auth()->user()->id != $this->story->user_id) {
            return redirect()->route('homepage')->with('error', 'Non hai il permesso per modificare questa storia!');
        } else {
            
        $this->validate();

        $this->story->update([
            'title' => $this->title,
            'text' => $this->text,
            'category_id' => $this->category_id

        ]);

        $this->story->tags()->sync($this->tags_id);

        return redirect()->route('homepage')->with('success', 'Storia aggiornata con successo!');

        }

    }

    public function deleteStory() {

        if (auth()->user()->id != $this->story->user_id) {
            return redirect()->route('homepage')->with('error', 'Non hai il permesso per eliminare questa storia!');
        } else{

        $this->story->tags()->detach();
        $this->story->delete();

        return redirect()->route('homepage')->with('success', 'Storia eliminata con successo!');
        }
    }
    
    
    public function render()
    {
        return view('livewire.edit');
    }
}
