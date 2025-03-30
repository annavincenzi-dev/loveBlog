<x-layout>

    <div class="container-fluid mt-5">
        
        <div class="row justify-content-center text-center">

            <h1 class="tlt tltFont">Effettua il Login</h1>

        </div>

        <div class="row justify-content-center">

            <div class="col-6">

                <form action="{{route('login')}}" method="POST">

                    @csrf
                
                    <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                        <label for="email" class="form-label w-25 text-center my-2">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"> 
                        @error('email')
                            <div class="error alert alert-danger">{{ $message }}</div>
                        @enderror   
                    </div>    
                
                    <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                        <label for="password" class="form-label w-25 text-center my-2">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')  
                            <div class="error alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                        <button type="submit" class="homeLink ">Accedi</button>
                    </div>
                
                    
                    
                </form>


            </div>



        </div>


    </div>







</x-layout>