<x-layout>

    <x-sessionAlert/>

    

        <div class="row align-items-center mt-5 p-0 justify-content-center w-100">

            <div class="col-2 d-flex align-items-center justify-content-center m-0 p-0">

                <img src="/media/logo.png" class="logo" alt="">

            </div>


            <div class="col-8 text-center m-0 p-0">
                
                <h1 class="tlt tltFont">Benvenuti su loveBlog!</h1>

            </div>

            <div class="col-2 d-flex align-items-center justify-content-center m-0 p-0">

                <img src="/media/logo.png" class="logo" alt="">

            </div>

        </div>

        <div class="row align-items-center m-0 p-0 justify-content-center">
            
            <div class="col-8 bg3 p-2">

                <h2 class="tlt subtltFont text-center">Cuori infranti, amori folli e consigli spassionati.</h2>


            </div>

        </div>

        <div class="row w-100 justify-content-evenly align-items-center my-5">
            <div class="col-7 bg2 p-2  card1">

                <h3 class="txt txtFont">Hai una storia d'amore da raccontare? Un colpo di fulmine, un cuore spezzato o un finale inaspettato? Scrivilo! Il tuo racconto potrebbe emozionare, far riflettere o aiutare qualcun altro a capire il proprio cuore.</h3>

            </div>

            <div class="col-2 d-flex align-items-center justify-content-center">
                
                @auth
                <a href="{{route('writeStory')}}" class="homeLink">Scrivici la tua storia</a>
                @endauth

                @guest
                <a href="{{route('register')}}" class="homeLink">Scrivici la tua storia</a>
                @endguest



            </div>


        </div>

        <div class="row w-100 justify-content-evenly align-items-center my-5">
            <div class="col-7 bg2 p-2  card1">

                <h3 class="txt txtFont">Leggi le storie più pazze, romantiche e heartbreak di chi, come te, vive l'amore al massimo! Che sia un colpo di fulmine, un ex da dimenticare o un finale da favola… qui trovi tutto il drama che vuoi!</h3>


            </div>

            <div class="col-2 d-flex align-items-center justify-content-center">
                
                
                <a href="{{route('allStories')}}" class="homeLink">Leggi le nostre storie</a>
            


            </div>


        </div>















</x-layout>