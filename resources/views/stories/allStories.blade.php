<x-layout>

    <h1>Tutte le nostre storie</h1>

    @foreach ($stories as $story)
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{$story->title}}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{$story->text}}</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">{{$story->author}}</small>
            </div>

            <a href="{{route('showStory', $story->id)}}" class="btn btn-primary"></a>
        </div>
    @endforeach                            





</x-layout>