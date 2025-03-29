<x-layout>

    <h1>ISCRIVITI</h1>
    
    <form method="POST" action="{{ route('registerSubmit') }}" enctype="multipart/form-data">
        @csrf
    
        <div class="form-group">
            <label for="name">Username</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="profile_photo">Foto Profilo</label>
            <input type="file" name="profile_photo" id="profile_photo" class="form-control">
        </div>
    
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
    
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
    
        <div class="form-group">
            <label for="password_confirmation">Conferma Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>
    
        
    
        <button type="submit" class="btn btn-primary">Registrati</button>
    </form>

    <form action="{{ route('logout') }}" method="POST" id="logout">
        @csrf
    
    </form>
    

    </x-layout>