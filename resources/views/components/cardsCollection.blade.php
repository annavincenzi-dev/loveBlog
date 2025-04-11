<div class="row justify-content-evenly align-items-center">
           
@foreach ($stories as $story)
 
<div class="card col-3 m-3">

    <div class="card-header">

        <h5 class="card-title tlt tltFont fs-5">{{$story->title}}</h5>
    
    </div>

    <div class="card-body">

        <p class="card-text text-truncate txt txtFont fs-6">"{{$story->text}}"</p>

    </div>

    <div class="card-footer">

        <small class="text-muted txt txtFont">{{$story->user->name}}</small>

    </div>

    <a href="{{route('showStory', $story->id)}}" class="homeLink fw-light mb-2 txt txtFont fs-6">Leggi la storia completa</a>

</div>

@endforeach
</div>