<x-layout>


<h1>Scrivici la tua storia</h1>

<form action="{{route('storeStory')}}" method="POST">

    @csrf

    <div class="mb-3">
        <label for="author" class="form-label">Autore della storia</label>
        <input type="text" class="form-control" id="author" name="author">
    
    </div>

      <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>

      <div class="mb-3">
        <label for="text" class="form-label">Testo</label>
        <textarea name="text" id="text" cols="30" rows="10" class="form-control"></textarea>
      </div>

      <button type="submit" class="btn btn-danger">INVIA</button>


</form>



</x-layout>