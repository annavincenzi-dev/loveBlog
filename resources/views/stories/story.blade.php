<x-layout>

    <h1>{{ $story->title }}</h1>
    <h2>{{ $story->author->name }}</h2>

    @if ($story->author->profile_photo)
        
        <!-- Foto profilo dell'autore -->
        <img src="{{ Storage::url($story->author->profile_photo) }}" alt="Foto autore" class="rounded-circle" width="50">
    @else

        <img src="/media/avatar.png" alt="Foto default" class="rounded-circle" width="50">
    @endif

    <p>{{ $story->text }}</p>

</x-layout>
