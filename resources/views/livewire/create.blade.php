<div>
    
    <form wire:submit='createStory'>

        

        {{-- INPUT FILLER CON CUI L'UTENTE NON PUO' INTERAGIRE E CHE NON INVIA DATI AL DB --}}
        <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
            <label for="filler" class="form-label w-25 text-center my-2">Autore della storia</label>
            <input type="text" class="form-control" id="filler" name="filler" readonly value="{{auth()->user()->name}}" placeholder="{{auth()->user()->name}}">
        </div>

        {{-- INPUT TITLE --}}
          <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
            <label for="title" class="form-label w-25 text-center my-2">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" wire:model='title'>
          </div>
        
        {{-- INPUT TEXT --}}
          <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
            <label for="text" class="form-label w-25 text-center my-2">Testo</label>
            <textarea name="text" id="text" cols="30" rows="10" class="form-control @error('text') is-invalid @enderror" wire:model='text'></textarea>
          </div>

          {{-- Select Categoria --}}
          <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
          <label for="categories" class="form-label w-25 text-center my-2">Categoria</label>
          <select name="category" id="categories" class="form-control @error('category') is-invalid @enderror"  wire:model='category_id'>
            <option value="" disabled selected>Seleziona una categoria</option>
            @foreach ($this->categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
          </div>

          {{-- Select Tag --}}
          <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
            <label for="tags" class="form-label w-25 text-center my-2">Tags</label>
            <h3 class="txtFont tlt text-center">Tieni premuto il tasto ctrl e seleziona i tag pertinenti alla tua storia</h3>
            
                <select wire:model="tags_id" name="tags[]" id="tags" class="form-control @error('tags') is-invalid @enderror" multiple size="5">
                    @foreach ($this->tags as $tag)
                        <option value="{{ $tag->id }}" class="tag">#{{ $tag->name }}</option>
                    @endforeach
                </select>
                


            <div class="w-100 d-flex justify-content-evenly mt-3">
            <button type="submit" class="homeLink">Invia</button>
            <a href="{{route('homepage')}}" class="homeLink">Annulla</a>
            </div>



          


    </form>
</div>
