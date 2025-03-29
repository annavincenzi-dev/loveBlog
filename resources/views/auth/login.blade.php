<x-layout>

<h1>EFFETTUA IL LOGIN</h1>

<form action="{{route('login')}}" method="POST">

    @csrf

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"> 
        @error('email')
            <div class="error alert alert-danger">{{ $message }}</div>
        @enderror   
    </div>    

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
        @error('password')  
            <div class="error alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Accedi</button>
    
</form>



</x-layout>