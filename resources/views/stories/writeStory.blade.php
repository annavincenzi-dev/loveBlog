<x-layout>

  <div class="container-fluid mt-5">
        
    <div class="row justify-content-center text-center">

        <h1 class="tlt tltFont">Scrivici la tua storia</h1>

    </div>


    <div class="row justify-content-center">

      <div class="col-6">

        <form action="{{route('storeStory')}}" method="POST">

            @csrf

            <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                <label for="written_by" class="form-label w-25 text-center my-2">Autore della storia</label>
                <input type="text" class="form-control" id="written_by" name="written_by" readonly value="{{auth()->user()->name}}" placeholder="{{auth()->user()->name}}">
            
            </div>

              <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                <label for="title" class="form-label w-25 text-center my-2">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
              </div>

              <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                <label for="text" class="form-label w-25 text-center my-2">Testo</label>
                <textarea name="text" id="text" cols="30" rows="10" class="form-control @error('text') is-invalid @enderror"></textarea>
              </div>

              <button type="submit" class="homeLink"">Invia</button>
              <a href="{{route('homepage')}}" class="homeLink">Annulla</a>


        </form>

        </div>

    </div>


</x-layout>