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
    public $category_id;
    public $tags_id;
    #[Validate('required|min:3')]
    public $title= '';
    #[Validate('required|min:8')]
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
        /* dd($this->category, $this->tags , $this->title, $this->text);  */   

        $story = Auth::user()->stories()->create([
            'title'=>$this->title,
            'text'=>$this->text,
            'category_id'=>$this->category_id,
        ]);

        if ($this->tags_id) {
            $story->tags()->attach($this->tags_id);  // Aggiungi i tag selezionati alla storia
        }


        return redirect()->route('homepage')->with('success', 'Nuova storia creata con successo!');
    }

    public function render()
    {
        return view('livewire.create');
    }
}
