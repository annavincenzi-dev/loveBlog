<x-layout>

    <div class="container-fluid mt-5">
        
        <div class="row justify-content-center text-center">

            <h1 class="tlt tltFont">Iscriviti</h1>

        </div>

        <div class="row justify-content-center">

            <div class="col-6">
            
                <form method="POST" action="{{ route('registerSubmit') }}" enctype="multipart/form-data">
                    
                    @csrf
    
                    <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                        <label for="name" class="form-label w-25 text-center my-2">Username</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="error alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                        <label for="profile_photo" class="form-label w-25 text-center my-2">Foto Profilo</label>
                        <input type="file" name="profile_photo" id="profile_photo" class="form-control @error ('profile_photo') is-invalid @enderror">
                        @error('profile_photo')
                            <div class="error alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                        <label for="email" class="form-label w-25 text-center my-2">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" >
                        @error('email')
                            <div class="error alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                        <label for="password" class="form-label w-25 text-center my-2">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="error alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="mb-3 d-flex justify-content-center align-items-center flex-column">
                        <label for="password_confirmation" class="form-label w-25 text-center my-2">Conferma Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror"> 

                        @error('password_confirmation')
                            <div class="error alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                

                    <div class="mb-3 d-flex justify-content-around align-items-center flex-column">
                        <button type="submit" class="homeLink">Registrati</button>
                    
                        <label for="login2" class="form-label mt-5">Hai già un account?</label>
                        
                    <a href="{{ route('login') }}" class="homeLink" id="login2">Effettua il Login</a>
                    </div>
                    
                
                    
    </form>

    <form action="{{ route('logout') }}" method="POST" id="logout">
        
        @csrf
    
    </form>
    

    </x-layout>