<x-layout>

    <div class="container-fluid w-75 mx-auto mt-5 p-4 storyWrap">
        <div class="row text-center">

            <h1 class="tlt tltFont">{{ $story->title }}</h1>

        </div>

        <div class="row align-items-center justify-content-end my-3">

            <div class="col-5 text-center">

                <h2 class="txt txtFont fs-4"> <strong>Scritta da: </strong>{{ $story->author->name }}</h2>

            </div>

            <div class="col-2">

                @if ($story->author->profile_photo)
            
            <img src="{{ Storage::url($story->author->profile_photo) }}" alt="Foto autore" class="rounded-circle storyPic">
    
        @else
    
            <img src="/media/avatar.png" alt="Foto default" class="rounded-circle" width="50">
    
        @endif

            </div>

            
    
        

        </div>

        <div class="row justify-content-center">

            <div class="col-10 text-center">

                <p class="txt txtFont">{{ $story->text }}</p>

            </div>
           
            

        </div>
        
        
    
        


    </div>

   

</x-layout>
