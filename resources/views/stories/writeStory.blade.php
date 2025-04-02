<x-layout>

  <div class="container-fluid mt-5">
        
    <div class="row justify-content-center text-center">

        <h1 class="tlt tltFont">Scrivici la tua storia</h1>

    </div>


    <div class="row justify-content-center">

      <div class="col-6">

        <form action="{{route('storeStory')}}" method="POST">

            @csrf

            {{-- INPUT FILLER CON CUI L'UTENTE NON PUO' INTERAGIRE E CHE NON INVIA DATI AL DB --}}
            <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                <label for="filler" class="form-label w-25 text-center my-2">Autore della storia</label>
                <input type="text" class="form-control" id="filler" name="filler" readonly value="{{auth()->user()->name}}" placeholder="{{auth()->user()->name}}">
            </div>

            {{-- INPUT TITLE --}}
              <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                <label for="title" class="form-label w-25 text-center my-2">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
              </div>
            
            {{-- INPUT TEXT --}}
              <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                <label for="text" class="form-label w-25 text-center my-2">Testo</label>
                <textarea name="text" id="text" cols="30" rows="10" class="form-control @error('text') is-invalid @enderror"></textarea>
              </div>

              {{-- Select Categoria --}}
              <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
              <label for="category_id" class="form-label w-25 text-center my-2">Categoria</label>
              <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option value="" disabled selected>Seleziona una categoria</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
</div>

              <button type="submit" class="homeLink">Invia</button>
              <a href="{{route('homepage')}}" class="homeLink">Annulla</a>


        </form>

        </div>

    </div>


</x-layout>