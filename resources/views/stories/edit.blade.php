<x-layout>

    <div class="container-fluid mt-5">
          
      <div class="row justify-content-center text-center">
  
          <h1 class="tlt tltFont">Modifica la storia</h1>
  
      </div>
  
  
      <div class="row justify-content-center">
  
        <div class="col-6">
  
          <form action="{{route('update', compact('story'))}}" method="POST">

            @method('PUT')
  
              @csrf
  
              <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                  <label for="written_by" class="form-label w-25 text-center my-2">Autore della storia</label>
                  <input type="text" class="form-control" id="written_by" name="written_by" readonly value="{{auth()->user()->name}}" placeholder="{{auth()->user()->name}}">
              
              </div>
  
                <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                  <label for="title" class="form-label w-25 text-center my-2">Titolo</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$story->title}}">
                </div>
  
                <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                  <label for="text" class="form-label w-25 text-center my-2">Testo</label>
                  <textarea name="text" id="text" cols="30" rows="10" class="form-control @error('text') is-invalid @enderror" >{{$story->text}}</textarea>
                </div>
  
                <button type="submit" class="homeLink"">Salva le modifiche</button>
                <a href="{{route('showStory', compact('story'))}}" class="homeLink">Annulla</a>
  
  
          </form>
  
          </div>
  
      </div>
  
  
  </x-layout>