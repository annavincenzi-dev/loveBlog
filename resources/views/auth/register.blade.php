<x-layout>

    <h1>ISCRIVITI</h1>
    
    <form method="POST" action="{{ route('registerSubmit') }}" enctype="multipart/form-data">
        @csrf
    
        <div class="form-group">
            <label for="name">Username</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="error alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="profile_photo">Foto Profilo</label>
            <input type="file" name="profile_photo" id="profile_photo" class="form-control @error ('profile_photo') is-invalid @enderror">
            @error('profile_photo')
                <div class="error alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" >
            @error('email')
                <div class="error alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div class="error alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="password_confirmation">Conferma Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror"> 

            @error('password_confirmation')
                <div class="error alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    
        
    
        <button type="submit" class="btn btn-primary">Registrati</button>
    </form>

    <form action="{{ route('logout') }}" method="POST" id="logout">
        @csrf
    
    </form>
    

    </x-layout>