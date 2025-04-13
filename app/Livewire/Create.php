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
    #[Validate('required')]
    public $category_id;
    #[Validate('required')]
    public $tags_id = [];
    public $categories;
    public $tags = [];
    
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
        $this->validate();

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

    public function messages() {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'text.required' => 'Il testo è obbligatorio',
            'text.min' => 'Il testo deve avere almeno 8 caratteri',
            'title.min' => 'Il titolo deve avere almeno 3 caratteri',
            'category_id.required' => 'La categoria è obbligatoria',
            'tags_id.required' => 'Inserisci almeno un tag',
        ];
    }

    public function render()
    {
        return view('livewire.create');
    }
}
