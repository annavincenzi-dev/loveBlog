<?php

namespace App\Livewire;

use App\Models\Tag;
use App\Models\Story;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $category;
    public $tags;
    #[Validate('required'|'min3')]
    public $title= '';
    #[Validate('required'|'min8')]
    public $text= '';

    public function mount()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $this->categories = $categories;
        $this->tags = $tags;
    }

    public function createStory()
    {
        

        $story = new Story();
        $story->title = $this->title;
        $story->text = $this->text;
        $story->category()->associate($this->category);
        $story->user_id = Auth::id();
        $story->save();

        $story->tags()->attach($this->tags);
        return redirect()->route('homepage')->with('success', 'Nuova storia creata con successo!');
    }

    public function render()
    {
        return view('livewire.create');
    }
}
