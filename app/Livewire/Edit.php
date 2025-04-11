<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Component;
use App\Models\Category;

class Edit extends Component
{
    public $category_id;
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
        
    }

    public function editStory() {

        $this->story->update([
            'title' => $this->title,
            'text' => $this->text,
        ]);

        $this->story->tags()->sync($this->tags_id);

        return redirect()->route('homepage')->with('success', 'Storia aggiornata con successo!');
    }
    
    public function render()
    {
        return view('livewire.edit');
    }
}
