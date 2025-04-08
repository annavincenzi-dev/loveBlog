<x-layout>

    <div class="container-fluid w-75 mx-auto mt-5 p-4 storyWrap">
        
        <div class="row text-center">

            <h1 class="tlt tltFont">{{ $story->title }}</h1>

        </div>

        <div class="row align-items-center justify-content-end my-3">

            <div class="col-5 text-center">

                <a href="{{route('myStories', ['user' => $story->user])}}" class="txt txtFont fs-4 text-decoration-none">

                    <h2 class="txt txtFont fs-4"><strong>Scritta da:</strong> {{ $story->user->name }}</h2>

                </a>

            </div>

            

            <div class="col-2">
                
                <a href="{{route('myStories', ['user' => $story->user])}}" class="txt txtFont fs-4 text-decoration-none">
                    
                    @if ($story->user->profile_photo)
            
                        <img src="{{ Storage::url($story->user->profile_photo) }}" alt="Foto autore" class="rounded-circle storyPic">
    
                    @else
    
                        <img src="/media/avatar.png" alt="Foto default" class="rounded-circle" width="50">
    
                    @endif

                </a>

            </div>

            
    
        </div>

        
        <div class="row justify-content-center">

            <div class="col-10 text-center">

                <p class="txt txtFont">{{ $story->text }}</p>

            </div>
           
        </div>

        <div class="row justify-content-evenly">

            <div class="col-10 text-center d-flex justify-content-evenly">

                @foreach ($story->tags as $tag)

                <a href="{{route('storiesByTag', ['tag' => $tag])}}" class="text-decoration-none"><p class="tlt txtFont fs-6 ">#{{ $tag->name }}</p></a> 

                @endforeach

            </div>
           
        </div>

        
        <div class="row">
            
            <div class="col-6">
                
                <a href="{{route('allStories')}}" class="homeLink">Torna alle storie</a>
            
            </div>
           
            @auth

                @if (Auth::user()->id == $story->user_id)    

                    <div class="col-6">
                
                        <div class="d-flex justify-content-center align-items-center flex-column">
                    
                            <a href="{{route('edit', compact('story'))}}" class="homeLink">Modifica la storia</a>

                            <a href="{{route('delete', compact('story'))}}" class="homeLink" onclick="event.preventDefault(); document.querySelector('#delete-form').submit();">Elimina la storia</a>

                        </div>
                    
                    </div>
                
                @endif

            @endauth

        </div>
        
    </div>


    {{-- FORM DI CANCELLAZIONE STORIA --}}
    <form action="{{route('delete', compact('story'))}}" method="POST" id="delete-form">@method('DELETE')@csrf</form>

    

   

</x-layout>
