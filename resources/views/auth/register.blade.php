<!DOCTYPE html>
<html>

@include('includes.head')
<body class="gray-bg h-100 d-flex justify-content-center align-items-center">
 
    <div class="middle-box text-center loginscreen animated fadeInDown card p-4 shadow">
        <h3>App School</h3>
        <p>Manage your school with App School.</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="form-group">                    
                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">                    
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation" required autocomplete="new-password">
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Login
            </button>

            <p class="text-muted text-center mt-2"><small>Have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="/login">Login</a>
        </form>
    </div>

</body>

</html>


